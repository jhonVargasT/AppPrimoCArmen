<?php

namespace App\Http\Controllers;

use App\boleta;
use App\Pedido;
use App\Persona;
use App\Producto;

use App\Promocion;
use http\Exception;
use Illuminate\Http\Request;
use App\ProductoPedido;
use App\util;
use App\Mail\EnvioDeCorreos;
use Illuminate\Support\Facades\DB;


class PedidoAdministrador extends Controller
{
    public function obtenerPedidos($val,$fechaini,$fechafin)
    {

            return datatables()->of(Pedido::reporteAdministradorPar($val,$fechaini,$fechafin))->toJson();
    }

    public
    function cambiarEstadoProducto($idProductoPedido, $estado)
    {



        $productoPedido = ProductoPedido::consultarProductosPedidos($idProductoPedido);
        foreach ($productoPedido as $pro) {
            $cantpaqueprodupedi = $pro->cantidadPaquetes;
            $montopaque = $pro->montoPaquetes;
            $descpaque = $pro->DescuentoPaquetes;
            $cantunidadeprodupedi = $pro->cantidadUnidades;
            $montouni = $pro->montoUnidades;
            $desuni = $pro->DescuentoUnidades;
            $idproducto = $pro->id_Producto;
            $idpedido = $pro->id_Pedido;
            $idPromocion = $pro->id_Promocion;
        }
        $producto = Producto::consultarProducto($idproducto);
        foreach ($producto as $pr) {
            $ventpaque = $pr->precioVenta;
            $ventuni = $pr->precioVentaUnidad;
            $cantPaqueProd = $pr->cantidadPaquete;
            $cantUnidProd = $pr->cantidadStockUnidad;
        }
        $pedido = Pedido::obtenerPedido($idpedido);
        foreach ($pedido as $pedi) {
            $idPersona = $pedi->idPersona;
            $pedidototapago = $pedi->totalPago;
            $pedidesc = $pedi->descuento;
        }

        switch ($estado) {
            case 0:
                //poner estado en espera
                $estadopro = 1;
                Pedido::actualizarEmilinacion($idpedido, null, Session('idusuario'), 2);
                ProductoPedido::actualizarEstadoProductoPedido($idProductoPedido, $estadopro);
                $total = abs($pedidototapago - ($montopaque + $montouni));
                $descuentototal = abs($pedidesc - ($descpaque + $desuni));
                $impuesto = round(($total * 0.18), 2);
                $costoBruto = round(abs(($total * 0.18) - $total), 2);
                $totalPago = round($total, 2);
                Pedido::cambiarMontoPedidoDescuento($idpedido, $totalPago, $descuentototal, $impuesto, $costoBruto);
                Producto::disminuirStock($idproducto, abs($cantPaqueProd - $cantpaqueprodupedi), abs($cantUnidProd - $cantunidadeprodupedi));
                break;
            case 1:
                $estadopro = 2;
                //enproceso entregado y
                ProductoPedido::actualizarEstadoProductoPedido($idProductoPedido, $estadopro);
                Pedido::cambiarEstado($idpedido, 2);
                break;
            case 2:
                $estadopro = 0;
                ProductoPedido::actualizarEstadoProductoPedido($idProductoPedido, $estadopro);

                //se recalcula los montos del pedido y se aumenta el stock del producto
                $total = abs($pedidototapago - ($montopaque + $montouni));
                $descuentototal = abs($pedidesc - ($descpaque + $desuni));
                $impuesto = round(($total * 0.18), 2);
                $costoBruto = round(abs(($total * 0.18) - $total), 2);
                $totalPago = round($total, 2);
                Pedido::cambiarMontoPedidoDescuento($idpedido, $totalPago, $descuentototal, $impuesto, $costoBruto);
                Producto::disminuirStock($idproducto, abs($cantPaqueProd + $cantpaqueprodupedi), abs($cantUnidProd + $cantunidadeprodupedi));
                //cuenta los productos pedido que estan activos
                $contador = ProductoPedido::consultarProductosPedido($idpedido);
                $contEstados = count($contador);
                $c = 0;
                foreach ($contador as $cont) {
                    if ($cont->estado === 0) {
                        $c++;
                    }
                }
                //si no hya productopedido activos elimina el pedido
                if ($c === $contEstados) {
                    Pedido::actualizarEmilinacion($idpedido, 'Se elimino por no tener productos para entregar ' . util::fecha(), Session('idusuario'), 0);
                }
                break;
        }

    }

    public
    function cambiarEstadoPedido($idpedido)
    {
        try {
            $pedido = Pedido::obtenerPedido($idpedido);
            foreach ($pedido as $pe) {
                $estado = $pe->estadoPedido;
                $idPersona = $pe->idPersona;
                $montoletra = $pe->totalPago;
            }
            $contador = ProductoPedido::consultarProductosPedido($idpedido);
            $contEstados = count($contador);
            $c = 0;
            foreach ($contador as $cont) {
                if ($cont->estado === 2) {
                    $c++;
                }
            }
            if ($c >= 1) {
                if ($c === $contEstados) {

                    Pedido::cambiarEstado($idpedido, 3);
                    foreach ($contador as $cont) {
                        ProductoPedido::actualizarEstadoProductoPedido($cont->idprod, 4);
                    }

                } else {
                    foreach ($contador as $cont) {
                        if ($cont->estado === 2) {
                            ProductoPedido::actualizarEstadoProductoPedido($cont->idprod, 4);
                        } elseif ($cont->estado === 1) {
                            ProductoPedido::actualizarEstadoProductoPedido($cont->idprod, 3);
                        } else {
                            ProductoPedido::actualizarEstadoProductoPedido($cont->idprod, 5);
                        }
                    }
                    Pedido::cambiarEstado($idpedido, 4);
                }
                return response()->json(array('error' => 1, 'id' => $idpedido));
            } else {
                return response()->json(array('error' => 0, 'id' => $idpedido));
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function agregarBoleta($idPedido)
    {
        try {
            $boleta = new Boleta();
            DB::transaction(function () use ($idPedido, $boleta) {


            });
        } catch (Exception $e) {
            return $e;
        }
    }

    public
    function eliminarPedido($idpedido, $razon)
    {
        try {
            $productospedido = ProductoPedido::consultarProductosPedido($idpedido);
            foreach ($productospedido as $pro) {
                $this->cambiarEstadoProducto($pro->idprod, 2);
            }
            Pedido::actualizarEmilinacion($idpedido, $razon . ' ' . util::fecha(), Session('idusuario'), 0);
            return 'success';
        } catch (Exception $e) {
            return 'error';
        }

    }

    public
    function verRazonEliminacion($idpedido)
    {
        try {
            $pedido = Pedido::obtenerPedido($idpedido);
            foreach ($pedido as $ped) {
                $razon = $ped->razonEliminar;
            }
            return response()->json(array('error' => 1, 'razon' => $razon));
        } catch (Exception $e) {
            return 'error';
        }
    }

    public
    function cambiarCantProducto($idproductopedido, $cantpaquete, $cantunidades)
    {
        try {
            $cantunidades = (int)$cantunidades;
            $cantpaquete = (int)$cantpaquete;
            $productopedido = ProductoPedido::consultarProductosPedidos($idproductopedido);

            foreach ($productopedido as $produc) {
                $cantpaqueprodupedi = $produc->cantidadPaquetes;
                $montopaque = $produc->montoPaquetes;
                $descpaque = $produc->DescuentoPaquetes;
                $cantunidadeprodupedi = $produc->cantidadUnidades;
                $montouni = $produc->montoUnidades;
                $desuni = $produc->DescuentoUnidades;
                $idproducto = $produc->id_Producto;
                $idpedido = $produc->id_Pedido;
                $idPromocion = $produc->id_Promocion;
            }
            $producto = Producto::consultarProducto($idproducto);
            foreach ($producto as $product) {
                $cantidaduniproducto = $product->cantidadStockUnidad;
                $cantidadpaqueteproducto = $product->cantidadPaquete;
                $nombreproducto = $product->nombre;
            }

            $resultuni = abs($cantunidadeprodupedi + $cantidaduniproducto);
            $resulpaque = abs($cantpaqueprodupedi + $cantidadpaqueteproducto);

            if ($cantunidades <= $resultuni && $cantpaquete <= $resulpaque) {

                Producto::disminuirStock($idproducto, abs($resulpaque - $cantpaquete), abs($resultuni - $cantunidades));
                $pedido = Pedido::obtenerPedido($idpedido);
                foreach ($pedido as $pedi) {
                    $idPersona = $pedi->idPersona;
                    $pedidototapago = $pedi->totalPago;
                    $pedidesc = $pedi->descuento;
                }
                $pedidototapago = abs($pedidototapago - ($montopaque + $montouni));
                $pedidesc = abs($pedidesc - ($descpaque + $desuni));
                Pedido::cambiarMontoDesc($idpedido, $pedidototapago, $pedidesc);
                $productopedido = ProductoPedido::consultarProductosPedidos($idproductopedido);
                foreach ($productopedido as $produc) {
                    $cantpaqueprodupedi = $produc->cantidadPaquetes;
                    $montopaque = $produc->montoPaquetes;
                    $descpaque = $produc->DescuentoPaquetes;
                    $cantunidadeprodupedi = $produc->cantidadUnidades;
                    $montouni = $produc->montoUnidades;
                    $desuni = $produc->DescuentoUnidades;
                    $idproducto = $produc->id_Producto;
                    $idpedido = $produc->id_Pedido;
                    $idPromocion = $produc->id_Promocion;
                }
                if ($cantunidadeprodupedi === '0') {
                    $cantunidadeprodupedi = 1;
                }


                if ($cantpaqueprodupedi === '0')
                    $cantpaqueprodupedi = 1;
                $respreciouni = abs($cantunidades * abs($montouni / $cantunidadeprodupedi));
                $resdescuni = abs($cantunidades * abs($desuni / $cantunidadeprodupedi));
                $respreciopaque = abs($cantpaquete * abs($montopaque / $cantpaqueprodupedi));
                $resdescpaque = abs($cantpaquete * abs($descpaque / $cantpaqueprodupedi));
                $person = Persona::obtenerDatosPersonaId($idPersona);
                foreach ($person as $per) {
                    $tippersona = $per->tipoCliente;
                }
                $producto = Producto::consultarProducto($idproducto);
                foreach ($producto as $product) {
                    $cantidaduniproducto = $product->cantidadStockUnidad;
                    $cantidadpaqueteproducto = $product->cantidadPaquete;
                    if ($tippersona === 1)
                        $precioventa = $product->precioVentaMino;
                    elseif ($tippersona === 2)
                        $precioventa = $product->precioVentaMayo;
                    $precioventaunidad = $product->precioVentaUnidad;
                    $nombreproducto = $product->nombre;
                }
                if ($respreciopaque == 0) {
                    $respreciopaque = $cantpaquete * $precioventa;
                }
                if ($respreciouni == 0) {
                    $respreciouni = $precioventaunidad * $cantunidades;
                }


                ProductoPedido::CambiarCantidadPaquetesUnidades($idproductopedido, $cantpaquete, $respreciopaque, $resdescpaque, $cantunidades, $respreciouni, $resdescuni);
                $pedido = Pedido::obtenerPedido($idpedido);
                foreach ($pedido as $pedi) {
                    $pedidototapago = $pedi->totalPago;
                    $pedidesc = $pedi->descuento;
                }
                $total = $respreciouni + $respreciopaque + $pedidototapago;
                $descuentototal = $resdescuni + $resdescpaque + $pedidesc;
                $impuesto = round(($total * 0.18), 2);
                $costoBruto = round(abs(($total * 0.18) - $total), 2);
                $totalPago = round($total, 2);
                Pedido::cambiarMontoPedidoDescuento($idpedido, $totalPago, $descuentototal, $impuesto, $costoBruto);
                return response()->json(array('error' => 1));

            } else {
                return response()->json(array('error' => 0, 'cantpaque' => $cantidadpaqueteproducto, 'cantuni' => $cantidaduniproducto, 'nombre' => $nombreproducto));
            }

        } catch (Exception $e) {
            return $e;
        }
    }

    public
    function enviarCorreo()
    {
        $correo = new EnvioDeCorreos();
        $correo->enviarCorreo();
    }
}
