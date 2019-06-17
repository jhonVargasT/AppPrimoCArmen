<?php

namespace App\Http\Controllers;

use App\ProductoPromocion;
use App\Promocion;
use App\util;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Promocioncontroller extends Controller
{
    public function index()
    {
        return view('pagina.Promociones.promociones');
    }

    public function listar()
    {
        return datatables()->of(Promocion::all())->toJson();
    }

    public function create()
    {
        return view('pagina.Promociones.agregar_promocion');
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
            $promocion = new Promocion();
            $promocion->nombre = strtoupper($request->nombre);
            $promocion->descripcion = strtoupper($request->descripcion);
            $promocion->descuento = $request->podesc;
            $promocion->fechaCreacion = util::fecha();
            $promocion->fechaVigencia = date('Y-m-d H:i:s', strtotime($request->fechaFina));;
            DB::transaction(function () use ($promocion) {
                $promocion->save();
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
        $promocion = Promocion::where('idPromocion', $id)->firstOrFail();
        return view('pagina.Promociones.editar_promocion')->with('promocion', $promocion);
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
            $promocion = Promocion::findOrFail($id);
            $promocion->nombre = strtoupper($request->nombre);
            $promocion->descripcion = strtoupper($request->descripcion);
            $promocion->descuento = $request->podesc;
            $promocion->activo=1;
            $promocion->fechaCreacion = util::fecha();
            $promocion->fechaVigencia = date('Y-m-d H:i:s', strtotime($request->fechaFina));;
            DB::transaction(function () use ($promocion) {
                $promocion->save();
            });
            return 'success';

        } catch (Exception $e) {
            return $e;
        }
    }

    public function actualizarPromocion($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $promocion = Promocion::findOrFail($id);
                if ($promocion->estado === '1')
                    $estado = '0';
                else
                    $estado = '1';
                Promocion::actualizarPromocion($id, $estado);
            });
            return 'success';

        } catch (Exception $e) {
            return $e;
        }
    }

    public function verPromocionProducto($id)
    {
        return view('pagina.Promociones.ver_promocion_producto')->with('id', $id);
    }

    public function listarProductoPromocion($id)
    {
        return datatables()->of(Promocion::obtenerProductoPromocion($id))->toJson();
    }

    public function activarDesactivar($id, $estado, $tipo,$prod,$prom)
    {
        try {

            if ($id==='0') {

                $prodprom=new ProductoPromocion();
                $prodprom->id_Producto=$prod;
                $prodprom->id_Promocion=$prom;
                $prodprom->fechaCreacion=util::fecha();
                DB::transaction(function () use ($prodprom,$id) {
                    $prodprom->save();

                });
                $id=$prodprom->idProductoPromocion;
            }

            if ($estado === '1') {
                $estado = 0;
            } else {
                $estado = 1;
            }
            if ($tipo === '1')
                ProductoPromocion::ActualizarActivarCaja($id, $estado);
            else
                ProductoPromocion::ActualizarActivarUnidad($id, $estado);
            return response()->json(array('error' => 1, 'id' => $prom));
        } catch (Exception $e) {
            return $e;
        }
    }
}
