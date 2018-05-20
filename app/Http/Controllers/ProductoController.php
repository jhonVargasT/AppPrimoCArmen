<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
                Producto::actualizarStock($request->id, $request->paquete, $request->unidad);
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
            $producto->nombre = $request->nombre;
            $producto->tipoProducto = $request->tipoProducto;
            $producto->tipoPaquete = $request->tipoPaquete;
            $producto->cantidadPaquete = $request->cantidadPaquete;
            $producto->cantidadProductosPaquete = $request->cantidadProductosPaquete;
            $producto->precioCompra = $request->precioCompra;
            $producto->precioVenta = $request->precioVenta;
            $producto->comisionPaquete = $request->comisionVenta;
            $producto->cantidadStockUnidad = $request->cantidadStockUnidad;
            $producto->precioCompraUnidad = $request->precioCompraUnidad;
            $producto->precioVentaUnidad = $request->precioVentaUnidad;
            $producto->descuento = 0;
            $producto->fechaCreacion = '1991-01-01';;

            DB::transaction(function () use ($producto) {
                $producto->save();
            });
            return 'success';

        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
