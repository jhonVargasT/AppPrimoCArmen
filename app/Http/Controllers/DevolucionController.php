<?php

namespace App\Http\Controllers;


use App\Devolucion;
use App\Producto;
use App\util;
use http\Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\DB;

class DevolucionController extends Controller
{
    public function index()
    {
        return view('/pagina/devolucion/devolver_productos');
    }

    public function listarDevoluciones()
    {
        return datatables()->of(Devolucion::obtenerDevolucion())->toJson();
    }

    public function guardarDevolucion($nombreProducto, $cant, $motivo)
    {
        try {
            $id_devolucion = null;
            $devolucion = new Devolucion();
            $producto = Producto::consultarProductoNombre($nombreProducto);
            foreach ($producto as $p) {
                $devolucion->id_Producto = $p->idProducto;
            }
            $devolucion->cantidadUnidades = $cant;
            $devolucion->motivo = $motivo;
            $devolucion->fechaCreacion = util::fecha();
            DB::transaction(function () use ($devolucion) {
                $devolucion->save();
                $id_devolucion = $devolucion->iddevolucion;
            });
            return 'success';
        } catch (Exception $e) {
            return 'error';
        }
    }

    public function eliminarDevolucion($idDevolucion)
    {
        try {
            $devolucion = Devolucion::obtenerDevolucionId($idDevolucion);
            foreach ($devolucion as $dev) {
                $estado = $dev->estado;
                $devuelto = $dev->devuelto;
                $idproducto = $dev->id_Producto;
                $cantidadUnidades = $dev->cantidadUnidades;
            }
            $producto = Producto::consultarProducto($idproducto);
            foreach ($producto as $prod) {
                $cantuni = $prod->cantidadStockUnidad;
                $cantPaque = $prod->cantidadPaquete;
            }

            if ($estado == 1) {
                $estado = 0;
                if ($devuelto == 1) {
                    $sum = abs($cantuni + $cantidadUnidades);
                    Producto::disminuirStock($idproducto, $cantPaque, $sum);
                }
                Devolucion::cambiarEstado($idDevolucion, $estado);
                return 'success';

            } else {
                if ($cantuni >= $cantidadUnidades) {
                    $estado = 1;
                    if ($devuelto == 1) {
                        $res = abs($cantuni - $cantidadUnidades);
                        Producto::disminuirStock($idproducto, $cantPaque, $res);
                    }
                    Devolucion::cambiarEstado($idDevolucion, $estado);
                    return 'success';
                } else {
                    return 'error';
                }
            }


        } catch (Exception $e) {
            return 'error';
        }
    }

    public function entregarDevolucion($idDevolucion)
    {
        try {
            $devolucion = Devolucion::obtenerDevolucionId($idDevolucion);
            foreach ($devolucion as $dev) {
                $estado = $dev->estado;
                $devuelto = $dev->devuelto;
                $idproducto = $dev->id_Producto;
                $cantidadUnidades = $dev->cantidadUnidades;
            }


            $producto = Producto::consultarProducto($idproducto);
            foreach ($producto as $prod) {
                $cantuni = $prod->cantidadStockUnidad;
                $cantPaque = $prod->cantidadPaquete;
            }

            if ($estado == 1) {
                if ($devuelto == 1) {
                    $devuelto = 0;
                    $sum = abs($cantuni + $cantidadUnidades);
                    Producto::disminuirStock($idproducto, $cantPaque, $sum);
                    Devolucion::entregar($idDevolucion, $devuelto);
                    return 'success';
                } else {
                    if ($cantuni >= $cantidadUnidades) {
                        $devuelto = 1;
                        $res = abs($cantuni - $cantidadUnidades);
                        Producto::disminuirStock($idproducto, $cantPaque, $res);
                        Devolucion::entregar($idDevolucion, $devuelto);
                        return 'success';
                    } else {
                        return 'error';
                    }
                }

            } else {
                return 'error';
            }


        } catch (Exception $e) {
            return 'error';
        }
    }

}
