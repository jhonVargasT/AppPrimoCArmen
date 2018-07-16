<?php

namespace App\Http\Controllers;

use App\DireccionTienda;
use App\Persona;
use App\Producto;
use App\Tienda;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use Exception;

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
        $nombre=null;
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
                $cantidadunidadpaquete=$p->cantidadProductosPaquete;
            }
            if ($nombre != null)
                return response()->json(array('error' => 1,'idproducto'=>$idProducto,'nombre'=>$nombre,'tipoproducto'=>$tipoProducto
                ,'tipopaquete'=>$tipoPaquete,'cantidadpaq'=>$cantidadPaquete,'precioventapaq'=>$precioVenta,'cantidaduni'=>$cantidadStockUnidad,
                        'precioventauni'=>$precioVentaUnidad,'cantpaquuni'=>$cantidadunidadpaquete
                ));
            else
                return response()->json(array('error' => 0));

        } catch (Exception $e) {
            return $e;
        }
    }

}
