<?php

namespace App\Http\Controllers;

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
    public function obtenerPedidos()
    {
        return datatables()->of(Pedido::reporteAdministrador())->toJson();
    }

    public function cambiarEstadoProducto($idProductoPedido, $estado)
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
            $totalpedi = $ped->totalPago;
        }

        switch ($estado) {
            case 0:
                $estadopro = 1;
                $totalmontopedido = abs($totalpedi + $totalProducto);
                Pedido::cambiarMontoPedido($idpedido, $totalmontopedido);
                Pedido::actualizarEmilinacion($idpedido, null, null, 2);
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
                    Pedido::actualizarEmilinacion($idpedido, 'Se elimino por no tener productos para entregar '.util::fecha(), 1, 0);
                }
                break;
        }

    }

    public function cambiarEstadoPedido($idpedido)
    {
        try {
            $pedido = Pedido::obtenerPedido($idpedido);
            foreach ($pedido as $pe) {
                $estado = $pe->estadoPedido;
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
                return 'success';
            } else {
                return 'error';
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function eliminarPedido($idpedido,$razon)
    {
        try {
            $productospedido = ProductoPedido::consultarProductosPedido($idpedido);
            foreach ($productospedido as $pro) {
                $this->cambiarEstadoProducto($pro->idprod,2);
            }
            Pedido::actualizarEmilinacion($idpedido, $razon.' '.util::fecha(), 1, 0);
            return 'success';
        } catch (Exception $e) {
            return 'error';
        }

    }

    public function verRazonEliminacion($idpedido){
        try {
            $pedido= Pedido::obtenerPedido($idpedido);
            foreach ($pedido as $ped) {
                $razon=$ped->razonEliminar;
            }
            return response()->json(array('error' => 1,'razon'=>$razon));
        } catch (Exception $e) {
            return 'error';
        }
    }

    public function enviarCorreo(){
        $correo=new EnvioDeCorreos();
        $correo->enviarCorreo();
    }
}
