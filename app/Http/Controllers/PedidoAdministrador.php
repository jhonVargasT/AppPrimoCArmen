<?php

namespace App\Http\Controllers;

use App\boleta;
use App\Pedido;
use App\Producto;

use http\Exception;
use Illuminate\Http\Request;
use App\ProductoPedido;
use App\util;
use App\Mail\EnvioDeCorreos;
use Illuminate\Support\Facades\DB;


class PedidoAdministrador extends Controller
{
    public function obtenerPedidos($val)
    {
        if ($val != 5) {
            return datatables()->of(Pedido::reporteAdministradorPar($val))->toJson();
        } else {
            return datatables()->of(Pedido::reporteAdministrador())->toJson();
        }

    }

    public
    function cambiarEstadoProducto($idProductoPedido, $estado)
    {
        $productoPedido = ProductoPedido::consultarProductosPedidos($idProductoPedido);
        foreach ($productoPedido as $pro) {
            $cantunipedi = $pro->cantidadUnidades;
            $cantpaqpedi = $pro->cantidadPaquetes;
            $idproducto = $pro->id_Producto;
            $idpedido = $pro->id_Pedido;
        }
        $producto = Producto::consultarProducto($idproducto);
        foreach ($producto as $pr) {
            $ventpaque = $pr->precioVenta;
            $ventuni = $pr->precioVentaUnidad;
            $cantPaqueProd = $pr->cantidadPaquete;
            $cantUnidProd = $pr->cantidadStockUnidad;
        }
        $cantuni = $cantunipedi * $ventuni;
        $cantpaq = $cantpaqpedi * $ventpaque;
        $totalProducto = $cantuni + $cantpaq;
        $pedidores = Pedido::obtenerPedido($idpedido);
        foreach ($pedidores as $ped) {
            $totalpedi = $ped->costoBruto;
        }

        switch ($estado) {
            case 0:
                $estadopro = 1;
                $totalmontopedido = abs($totalpedi + $totalProducto);
                Pedido::cambiarMontoPedido($idpedido, $totalmontopedido);
                Pedido::actualizarEmilinacion($idpedido, null, Session('idusuario'), 2);
                ProductoPedido::actualizarEstadoProductoPedido($idProductoPedido, $estadopro);
                Pedido::cambiarEstado($idpedido, 2);
                $rescantpaq = abs($cantPaqueProd + $cantpaqpedi);
                $rescantuni = abs($cantUnidProd + $cantunipedi);
                Producto::disminuirStock($idproducto, $rescantpaq, $rescantuni);
                //enproceso
                break;
            case 1:
                $estadopro = 2;
                //enproceso entregado y
                ProductoPedido::actualizarEstadoProductoPedido($idProductoPedido, $estadopro);
                Pedido::cambiarEstado($idpedido, 2);
                break;
            case 2:
                $estadopro = 0;
                $totalmontopedido = abs($totalpedi - $totalProducto);
                Pedido::cambiarMontoPedido($idpedido, $totalmontopedido);
                ProductoPedido::actualizarEstadoProductoPedido($idProductoPedido, $estadopro);
                $contador = ProductoPedido::consultarProductosPedido($idpedido);
                $contEstados = count($contador);
                $c = 0;
                $rescantpaq = abs($cantPaqueProd - $cantpaqpedi);
                $rescantuni = abs($cantUnidProd - $cantunipedi);
                Producto::disminuirStock($idproducto, $rescantpaq, $rescantuni);
                foreach ($contador as $cont) {
                    if ($cont->estado === 0) {
                        $c++;
                    }
                }
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
                $idPersona= $pe->idPersona;
                $montoletra=$pe->totalPago;
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
                    $boleta=new Boleta();
                    $boleta->id_Pedido=$idpedido;
                    $boleta->estado=1;
                    $boleta->entregado=0;
                    $boleta->fechaCreacion=util::fecha();
                    $boleta->nroimpresiones=0;
                    $boleta->tipocomprobante=null;
                    $boleta->montoletras=util::convertirSeisCifras($montoletra);
                    $boleta->nroboleta=null;
                    $boleta->idcliente=$idPersona;
                    $boleta->idUsuario=Session('idusuario');
                    $boleta->save();
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
                return response()->json(array('error' => 1,'id'=>$idpedido));
            } else {
                return response()->json(array('error' => 0,'id'=>$idpedido));
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function agregarBoleta($idPedido)
    {
        try{
            $boleta=new Boleta();
            DB::transaction(function () use ($idPedido,$boleta) {



            });
        }catch (Exception $e){
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
            $productopedido = ProductoPedido::consultarProductosPedidos($idproductopedido);

            foreach ($productopedido as $produc) {
                $cantpaqueprodupedi = $produc->cantidadPaquetes;
                $cantunidadeprodupedi = $produc->cantidadUnidades;
                $idproducto = $produc->id_Producto;
                $idpedido = $produc->id_Pedido;
            }


            $producto = Producto::consultarProducto($idproducto);
            foreach ($producto as $product) {
                $cantidaduniproducto = $product->cantidadStockUnidad;
                $cantidadpaqueteproducto = $product->cantidadPaquete;
                $preciounidadproducto = $product->precioVentaUnidad;
                $preciopaqueteproducto = $product->precioVenta;
                $nombreproducto = $product->nombre;
            }



            $resultuni = $cantunidades - $cantunidadeprodupedi;
            $resulpaque = $cantpaquete - $cantpaqueprodupedi;

            if ($resultuni <= $cantidaduniproducto && $resulpaque <= $cantidadpaqueteproducto) {
                Producto::disminuirStock($idproducto, (abs($cantidadpaqueteproducto + $cantpaqueprodupedi)), abs($cantidaduniproducto + $cantunidadeprodupedi));
                $producto = Producto::consultarProducto($idproducto);
                foreach ($producto as $product) {
                    $cantidaduniproducto = $product->cantidadStockUnidad;
                    $cantidadpaqueteproducto = $product->cantidadPaquete;
                    $preciounidadproducto = $product->precioVentaUnidad;
                    $preciopaqueteproducto = $product->precioVenta;

                }
                Producto::disminuirStock($idproducto, (abs($cantidadpaqueteproducto - $cantpaquete)), abs($cantidaduniproducto - $cantunidades));
                ProductoPedido::actualizarCantidadProductoPedido($idproductopedido, $cantpaquete, $cantunidades);
                //obtener el precio del pedido anterior
                $precioAnterior=($preciounidadproducto*$cantunidadeprodupedi)+($cantpaqueprodupedi*$preciopaqueteproducto);
                $pedidoAnte=Pedido::obtenerPedido($idpedido);
                foreach ($pedidoAnte as $pedia)
                {
                    $costobruto=$pedia->costoBruto;
                }
                $rescotobruto=ABS($costobruto-$precioAnterior);
                Pedido::cambiarMontoPedido($idpedido, (($preciounidadproducto * $cantunidades) + ($preciopaqueteproducto * $cantpaquete))+$rescotobruto);

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
