<?php

namespace App\Http\Controllers;

use App\Producto;
use App\util;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pagina.producto.reportar_producto');
    }

    public function listado()
    {
        return datatables()->of(Producto::all())->toJson();
    }

    public function actualizarStockModal(Request $request)
    {
        $data = array();
        $producto = Producto::where('idProducto', $request->id)->firstOrFail();

        $data[0] = $producto->nombre;
        $data[1] = (($producto->cantidadPaquete * $producto->cantidadProductosPaquete) + $producto->cantidadStockUnidad);
        $data[2] = $request->id;

        return $data;
    }

    public function actualizarStock(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Producto::actualizarStock($request->id, (int)$request->paquete, (int)$request->unidad);
            });
            return 'success';

        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.producto.agregar_producto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        try {
            $producto = new Producto();
            $producto->nombre = strtoupper($request->nombre);
            $producto->tipoProducto = $request->get('tipoProducto');
            $producto->tipoPaquete = $request->tipoPaquete;
            $producto->cantidadPaquete = $request->cantidadPaquete;
            $producto->cantidadProductosPaquete = $request->cantidadProductosPaquete;
            $producto->precioCompra = $request->precioCompra;
            $producto->precioVentaMayo = $request->precioVentaMay;
            $producto->precioVentaMino = $request->precioVentaMino;
            $producto->comisionPaquete = $request->comisionVenta;
            $producto->cantidadStockUnidad = $request->cantidadStockUnidad;
            $producto->precioCompraUnidad = $request->precioCompraUnidad;
            $producto->precioVentaUnidad = $request->precioVentaUnidad;
            $producto->idUsuario = Session('idusuario');
            $producto->descuento = 0;
            $producto->fechaCreacion = util::fecha();

            DB::transaction(function () use ($producto) {
                $producto->save();
            });
            return 'success';

        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function edit($id)
    {
        $producto = Producto::where('idProducto', $id)->firstOrFail();
        return view('pagina.producto.editar_producto')->with('producto', $producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return string
     */
    public function update(Request $request, $id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->nombre = strtoupper($request->nombre);
            $producto->tipoProducto = $request->tipoProducto;
            $producto->tipoPaquete = $request->tipoPaquete;
            $producto->cantidadPaquete = $request->cantidadPaquete;
            $producto->cantidadProductosPaquete = $request->cantidadProductosPaquete;
            $producto->precioCompra = $request->precioCompra;
            $producto->precioVentaMayo = $request->precioVentaMay;
            $producto->precioVentaMino = $request->precioVentaMino;
            $producto->comisionPaquete = $request->comisionVenta;
            $producto->cantidadStockUnidad = $request->cantidadStockUnidad;
            $producto->precioCompraUnidad = $request->precioCompraUnidad;
            $producto->precioVentaUnidad = $request->precioVentaUnidad;
            $producto->descuento = 0;
            $producto->fechaCreacion = util::fecha();

            DB::transaction(function () use ($producto) {
                $producto->save();
            });
            return 'success';

        } catch (Exception $e) {
            return $e;
        }
    }

    public function actualizarProducto(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Producto::actualizarProducto($request->id, $request->estado);
            });
            return 'success';

        } catch (Exception $e) {
            return $e;
        }
    }

    public function partirPaquete($idproducto)
    {
        try {
            $produto = Producto::consultarProducto($idproducto);
            foreach ($produto as $pro) {
                $paquetes = $pro->cantidadPaquete;
                $cantProPaque = $pro->cantidadProductosPaquete;
                $unidades = $pro->cantidadStockUnidad;
            }
            if ($paquetes > 0) {
                $paquetes = $paquetes - 1;
                $unidades = $unidades + ($cantProPaque);
                Producto::disminuirStock($idproducto, $paquetes, $unidades);
                return response()->json(array('error' => 0));
            } else {
                return response()->json(array('error' => 1));
            }

        } catch (Exception $e) {
            return $e;
        }
    }
    public function unirAPaquete($idproducto)
    {
        try {
            $produto = Producto::consultarProducto($idproducto);
            foreach ($produto as $pro) {
                $paquetes = $pro->cantidadPaquete;
                $cantProPaque = $pro->cantidadProductosPaquete;
                $unidades = $pro->cantidadStockUnidad;
            }
            if ($unidades >= $cantProPaque) {
                $paquetesres = $paquetes +1 ;
                $unidadesres = ($unidades - $cantProPaque);
                Producto::disminuirStock($idproducto, $paquetesres, $unidadesres);
                return response()->json(array('error' => 0));
            } else {
                return response()->json(array('error' => 1));
            }

        } catch (Exception $e) {
            return $e;
        }
    }
}
