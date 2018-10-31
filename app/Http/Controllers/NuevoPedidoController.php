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
use JasperPHP\JasperPHP as JasperPHP;

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

            $mitad = explode(", ", $nombresApellidos);
            $apenbusc = $mitad[0];
            $nombrebusc = $mitad[1];

            $dni = null;
            $nombres = null;
            $tienda = null;
            $idtienda = null;
            $idpersona = null;
            $result = Persona::obtenerDatosNombresApellidos($apenbusc, $nombrebusc);

            foreach ($result as $p) {
                $nombres = $p->apellidos . ', ' . $p->nombres;
                $tienda = $p->tienda;
                $dni = $p->dni;
                $idtienda = $p->idTienda;
                $idpersona = $p->idPersona;

            }
            if ($nombres != null)
                return response()->json(array('error' => 0, 'nombre' => $nombres, 'tienda' => $tienda, 'idtienda' => $idtienda, 'idpersona' => $idpersona, 'dni' => $dni), 200);
            else
                return response()->json(array('error' => 1));
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function autoCompletarNombreTiendaTienda($nombreTienda)
    {
        try {   return view('pagina/vendedor/nuevo_pedido');

            $dni = null;
            $nombres = null;
            $tienda = null;
            $idtienda = null;
            $idpersona = null;
            $result = Persona::obtenerDatosNombreTienda($nombreTienda);

            foreach ($result as $p) {
                $nombres = $p->apellidos . ', ' . $p->nombres;
                $tienda = $p->tienda;
                $dni = $p->dni;
                $idtienda = $p->idTienda;
                $idpersona = $p->idPersona;

            }
            if ($nombres != null)
                return response()->json(array('error' => 0, 'nombre' => $nombres, 'tienda' => $tienda, 'idtienda' => $idtienda, 'idpersona' => $idpersona, 'dni' => $dni), 200);
            else
                return response()->json(array('error' => 1));
        } catch (Exception $e) {
            echo $e;
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
            $producto = Producto::consultarProductoNombre($idproducto);
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
        // return response()->json(array('error' => 0,'url'=>0,'id'=>1));
        try {
            $idpedidoreporte=null;
            $data = json_decode($array);
            $persona = $data->persona;


            $pedido = new Pedido;
            $pedido->fechaEntrega = null;
            $pedido->fechaPedido = date('Y-m-d H:i:s', strtotime($persona->fechaentrega));;
            $pedido->estadoPedido = 1;
            $pedido->idPersona = $persona->persona;
            $pedido->usuarioEliminacion = null;
            $pedido->razonEliminar = null;
            $pedido->costoBruto = $persona->total;
            $pedido->impuesto=($persona->total*0.18);
            $pedido->descuento = 0;
            $pedido->totalPago = ($persona->total*0.18)+$persona->total;
            $pedido->idUsuario = Session('idusuario');
            $pedido->fechaCreacion = util::fecha();
            $pedido->id_DireccionTienda = $persona->tienda;
            $productos = $data->productos;

            DB::transaction(function () use ($pedido, $productos) {
                $pedido->save();

                foreach ($productos as $pr) {
                    $stockproducto = Producto::consultarProducto($pr->id);
                    $productopedido = new ProductoPedido();
                    $unidades = $pr->unidades;
                    $paquetes = $pr->paquete;
                    $productopedido->cantidadUnidades = $unidades;
                    $productopedido->cantidadPaquetes = $paquetes;
                    $productopedido->idUsuario = Session('idusuario');;
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
            $tipousu = Session('tipoUsuario');
            $idpedidoreporte=$pedido->idPedido;

            if ($tipousu === '0') {
                return response()->json(array('error' => 0,'url'=>1,'id'=>$idpedidoreporte));
            } elseif ($tipousu === '1') {
                return response()->json(array('error' => 0,'url'=>0,'id'=>$idpedidoreporte));
            }

        } catch (Exception $e) {
            return response()->json(array('error' => $e));
        }
    }


    public function compilarReporte()
    {
        return  $tipousu = Session('tipoUsuario');

    }



}
