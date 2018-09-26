<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Persona;
use App\Producto;
use Illuminate\Http\Request;
use vakata\database\Exception;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pagina/Reporte/reporte');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function obtenerProductoMasvendido()
    {
        try {
            $result = Producto::obetnerProductoMasVendido();
            foreach ($result as $res) {
                $comision = $res->nombre;
            }
            return response()->json(array('error' => 1, 'nomb' => $comision));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function obtenerNumeroClientes()
    {
        try {
            $result = Persona::cantidadClientes();
            foreach ($result as $res) {
                $cant = $res->cant;
            }
            return response()->json(array('error' => 1, 'cant' => $cant));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function totalProductosVendidos()
    {
        try {
            $result = Producto::obetnerNumerosProductosVendidos();
            foreach ($result as $res) {
                $cant = $res->cant;
            }
            return response()->json(array('error' => 1, 'cant' => $cant));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function ventasMensuales()
    {
        try {
            $result = Pedido::obtenerCajaMensual();
            foreach ($result as $res) {
                $cant = $res->tot;
            }
            return response()->json(array('error' => 1, 'tot' => $cant));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function ventasDiarias()
    {
        try {
            $result = Pedido::obtenerCajaDiaria();
            foreach ($result as $res) {
                $cant = $res->tot;
            }
            return response()->json(array('error' => 1, 'tot' => $cant));
        } catch (Exception $e) {
            return $e;
        }
    }


    public function reportarBoletas($cliente, $fechainicio, $fechafin)
    {
        try {
            if ($cliente === '0' && $fechainicio === '0' && $fechafin === '0'){
                return datatables()->of(Pedido::obtenerReporte())->toJson();}
                else{
                return null;
                }
        } catch (Exception $e) {
            return $e;
        }
    }

}
