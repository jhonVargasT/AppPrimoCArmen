<?php

namespace App\Http\Controllers;

use App\DireccionTienda;
use App\Persona;
use App\Tienda;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Exception;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pagina.cliente.reportar_cliente');
    }

    public function listado()
    {
        return datatables()->of(Persona::listado())->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.cliente.agregar_cliente');
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
            $persona = new Persona();
            $persona->dni = $request->dni;
            $persona->ruc = $request->ruc;
            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->fechaNacimiento = '1991-01-01';
            $persona->direccion = $request->direccion;
            $persona->nroCelular = $request->nroCelular;
            $persona->correo = $request->correo;
            $persona->nroCelular = $request->nroCelular;
            $persona->fechaCreacion = '1991-01-01';
            $persona->nroCelular = $request->nroCelular;
            $persona->departamento = $request->departamento;
            $persona->provincia = $request->provincia;
            $persona->nroCelular = $request->nroCelular;
            $persona->distrito = $request->distrito;

            $tienda = new Tienda();
            $tienda->nombreTienda = $request->tnombreTienda;
            $tienda->telefono = $request->ttelefono;
            $tienda->fechaCreacion = '1991-01-01';

            $direccionTienda = new DireccionTienda();
            $direccionTienda->distrito = $request->dtdistrito;
            $direccionTienda->provincia = $request->dtprovincia;
            $direccionTienda->nombreCalle = $request->dtnombreCalle;
            $direccionTienda->fechaCreacion = '1991-01-01';


            DB::transaction(function () use ($persona, $tienda, $direccionTienda) {
                $persona->save();

                $tienda->id_Persona = $persona->id;
                $tienda->save();

                $direccionTienda->id_Tienda = $tienda->id;
                $direccionTienda->save();

            });
            return 'success';

        } catch (Exception $e) {
            return $e;
        }
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
}