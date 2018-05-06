<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

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
        return Datatables::of(Persona::listado())->make(true);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->dni = $request->dni;
        $persona->apellidos = $request->apellidos;
        $persona->fechaNacimiento = $request->fechaNacimiento;
        $persona->direccion = $request->direccion;
        $persona->nroCelular = $request->nroCelular;
        $persona->correo = $request->correo;
        $persona->nroCelular = $request->nroCelular;
        $persona->fechaCreacion = $request->fechaCreacion;
        $persona->fechaActualizacion = $request->fechaActualizacion;
        $persona->usuarioCreacion = $request->usuarioCreacion;
        $persona->nroCelular = $request->nroCelular;
        $persona->departamento = $request->departamento;
        $persona->provincia = $request->provincia;
        $persona->nroCelular = $request->nroCelular;
        $persona->distrito = $request->distrito;
        if($persona->save()){
            return view('pagina.cliente.reportar_cliente');
        }else{
            return view('pagina.cliente.agregar_cliente');
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
