<?php

namespace App\Http\Controllers;


use App\Persona;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Exception;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */

    public function log(Request $request)
    {
        $request->usuario;
        $request->contrasena;
        return view('index_administrador');
    }

    public function index()
    {
        return view('pagina.usuario.reportar_usuario');
    }

    public function listado()
    {
        return datatables()->of(Usuario::listado())->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagina.usuario.agregar_usuario');
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

            $usuario = new Usuario();
            $usuario->password = $request->tnombreTienda;
            $usuario->usuario = $request->ttelefono;
            $usuario->fechaCreacion = '1991-01-01';


            DB::transaction(function () use ($persona, $usuario) {
                $persona->save();

                $usuario->id_Persona = $persona->id;
                $usuario->save();

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
