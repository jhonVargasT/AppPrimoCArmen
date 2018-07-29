<?php

namespace App\Http\Controllers;

use App\DireccionTienda;
use App\Pedido;
use App\Persona;
use App\Producto;
use App\ProductoPedido;
use App\util;
use Exception;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class NuevoPedidoController extends Controller
{
    public function index()
    {
        return view('pagina/vendedor/nuevo_pedido');
    }

    public function autoCompletarDni($dni)
    {
        try {
            $nombres = null;
            $tienda = null;
            $idtienda = null;
            $idpersona = null;
            $persona = Persona::obtenerDatosDni($dni);
            //    echo $persona;
            foreach ($persona as $p) {
                $nombres = $p->apellidos . ', ' . $p->nombres;
                $tienda = $p->tienda;
                $idtienda = $p->idTienda;
                $idpersona = $p->idPersona;

            }
            if ($nombres != null)
                return response()->json(array('error' => 0, 'nombre' => $nombres, 'tienda' => $tienda, 'idtienda' => $idtienda, 'idpersona' => $idpersona), 200);
            else
                return response()->json(array('error' => 1));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function autocompletarNombresApellidos($nombresApellidos)
    {
        try {
            $arreglo = array();
            $nombresApellido = Persona::obtenerDatosNombresApellidos($nombresApellidos);
            foreach ($nombresApellido as $na) {
                array_push($arreglo, array('nombresapellidos' => $na->apellidos . ', ' . $na->nombres, 'dni' => $na->dni));
            }
            return json_encode($arreglo);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function autoCompletarNombreTiendaTienda($nombreTienda)
    {
        try {
            $arreglo = array();
            $nombreTienda = Persona::obtenerDatosNombreTienda($nombreTienda);
            foreach ($nombreTienda as $nt) {
                array_push($arreglo, array('nombretienda' => $nt->tienda, 'dni' => $nt->dni));
            }

            return json_encode($arreglo);

        } catch (Exception $e) {
            return $e;
        }
    }

    public function obtenerDirecciones($idtienda)
    {
        try {
            $arreglo = array();
            $direcciontienda = DireccionTienda::obtenerDirecciones($idtienda);
            foreach ($direcciontienda as $d) {
                array_push($arreglo, array('value' => $d->distrito . '-' . $d->provincia . '-' . $d->nombreCalle, 'key' => $d->idDireccionTienda));
            }

            return json_encode($arreglo);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function autocompletarproducto($idproducto)
    {
        $nombre = null;
        try {
            $producto = Producto::consultarProducto($idproducto);
            foreach ($producto as $p) {
                $idProducto = $p->idProducto;
                $nombre = $p->nombre;
                $tipoProducto = $p->tipoProducto;
                $tipoPaquete = $p->tipoPaquete;
                $cantidadPaquete = $p->cantidadPaquete;
                $precioVenta = $p->precioVenta;
                $cantidadStockUnidad = $p->cantidadStockUnidad;
                $precioVentaUnidad = $p->precioVentaUnidad;
                $cantidadunidadpaquete = $p->cantidadProductosPaquete;
            }
            if ($nombre != null)
                return response()->json(array('error' => 1, 'idproducto' => $idProducto, 'nombre' => $nombre, 'tipoproducto' => $tipoProducto
                , 'tipopaquete' => $tipoPaquete, 'cantidadpaq' => $cantidadPaquete, 'precioventapaq' => $precioVenta, 'cantidaduni' => $cantidadStockUnidad,
                    'precioventauni' => $precioVentaUnidad, 'cantpaquuni' => $cantidadunidadpaquete
                ));
            else
                return response()->json(array('error' => 0));

        } catch (Exception $e) {
            return $e;
        }
    }

    public function enviarPedidos($array)
    {
        try {
            $data = json_decode($array);
            $persona = $data->persona;


            $pedido = new Pedido;
            $pedido->fechaEntrega = date('Y-m-d H:i:s', strtotime($persona->fechaentrega));
            $pedido->fechaPedido = util::fecha();
            $pedido->estadoPedido = 1;
            $pedido->idPersona = $persona->persona;
            $pedido->usuarioEliminacion = null;
            $pedido->razonEliminar = null;
            $pedido->costoBruto = $persona->total;
            $pedido->descuento = 0;
            $pedido->totalPago = $persona->total;
            $pedido->idUsuario = 1;//falta el usuario
            $pedido->fechaCreacion = util::fecha();
            $pedido->id_Boleta = null;
            $pedido->id_DireccionTienda = $persona->tienda;
            $productos = $data->productos;

            DB::transaction(function () use ($pedido, $productos) {
                $pedido->save();
                foreach ($productos as $pr) {
                    $stockproducto = Producto::consultarProducto($pr->id);
                    $productopedido = new ProductoPedido;
                    $unidades = $pr->unidades;
                    $paquetes = $pr->paquete;
                    $productopedido->cantidadUnidades = $unidades;
                    $productopedido->cantidadPaquetes = $paquetes;
                    $productopedido->idUsuario = 1;
                    $productopedido->fechaCreacion = util::fecha();
                    $productopedido->id_Producto = $pr->id;
                    $productopedido->id_Pedido = $pedido->idPedido;
                    $productopedido->save();
                    foreach ($stockproducto as $stock) {
                        $stockunidad = $stock->cantidadStockUnidad;
                        $stockpaquete = $stock->cantidadPaquete;
                    }
                    $totalunidades = ($stockunidad - $unidades);
                    $totalpaquetes = ($stockpaquete - $paquetes);
                    Producto::disminuirStock($pr->id, $totalpaquetes, $totalunidades);
                }
            });
            return response()->json(array('error' => 1,'url'=>'reportevendedor'));
        } catch (Exception $e) {
            return response()->json(array('error' => $e));
        }

    }
}
