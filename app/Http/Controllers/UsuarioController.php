<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Usuario;
use App\util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */

    public function index()
    {
        return view('pagina/usuario/reportar_usuario');
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
            $util = new util();

            $persona = new Persona();
            $persona->dni = $request->dni;
            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->fechaNacimiento = $request->fecha;
            $persona->direccion = $request->direccion;
            $persona->nroCelular = $request->nroCelular;
            $persona->correo = $request->correo;
            $persona->nroCelular = $request->nroCelular;
            $persona->fechaCreacion = util::fecha();
            $persona->nroCelular = $request->nroCelular;
            $persona->departamento = $request->departamento;
            $persona->provincia = $request->provincia;
            $persona->nroCelular = $request->nroCelular;
            $persona->distrito = $request->distrito;
            $persona->usuarioCreacion = util::fecha();
            $usuario = new Usuario();
            if($request->tipousuario==='Administrador')
                $usuario->tipoUsuario=1;
            elseif ($request->tipousuario==='Vendedor')
                $usuario->tipoUsuario=0;
            $usuario->password = bcrypt($request->password);
            $usuario->usuario = $request->usuario;
            $usuario->fechaCreacion = util::fecha();
            $usuario->usuarioCreacion = Session('idusuario');

            DB::transaction(function () use ($persona, $usuario) {
                $persona->save();

                $usuario->id_Persona = $persona->idPersona;
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
        $usuario = Usuario::datos($id);
        return view('pagina.usuario.editar_usuario')->with('usuario', $usuario);
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
            $util = new util();
            $fecha = $util->fecha_ingles();

            $persona = Persona::findOrFail($request->idPersona);
            $persona->dni = $request->dni;
            $persona->nombres = $request->nombres;
            $persona->apellidos = $request->apellidos;
            $persona->fechaNacimiento = $util->fecha_a_ingles($request->fechaNacimiento);
            $persona->direccion = $request->direccion;
            $persona->nroCelular = $request->nroCelular;
            $persona->correo = $request->correo;
            $persona->nroCelular = $request->nroCelular;
            $persona->fechaActualizacion = $fecha;
            $persona->nroCelular = $request->nroCelular;
            $persona->departamento = $request->departamento;
            $persona->provincia = $request->provincia;
            $persona->nroCelular = $request->nroCelular;
            $persona->distrito = $request->distrito;

            $usuario = Usuario::findOrFail($id);
            $usuario->password = $request->password;
            $usuario->usuario = $request->usuario;
            $usuario->passwordAntigua = '';
            $usuario->fechaCambioPassword = $fecha;

            DB::transaction(function () use ($persona, $usuario) {
                $persona->save();

                $usuario->id_Persona = $persona->idPersona;
                $usuario->save();

            });

            return 'success';

        } catch (Exception $e) {
            return $e;
        }
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

    public function actualizarUsuario(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Usuario::actualizarUsuario($request->id, $request->estado);
                Persona::actualizarCliente($request->idp, $request->estado);
            });
            return 'success';
        } catch (Exception $e) {
            return $e;
        }
    }
}
