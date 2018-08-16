<?php

namespace App\Http\Controllers;

use App\Mail\CorreoUsuarioCreado;
use App\Persona;
use App\Usuario;
use Exception;
use Faker\Provider\ne_NP\Person;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
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

    public function session()
    {

        $nombres = Session('nombres');
        $apellidos = Session('apellidos');
        $tipousu = Session('tipoUsuario');

        switch ($tipousu) {

            case 0:
                $tipousu = 'VENDEDOR';
                break;
            case 1:
                $tipousu = 'ADMINISTRADOR';
                break;

        }
        return response()->json(array('nombape' => $apellidos . ', ' . $nombres, 'tipousu' => $tipousu));
    }

    public function cambiarcontra($contrasena)
    {
        try {
            $idusuario = Session('idusuario');
            $contrasenna=bcrypt($contrasena);
            Usuario::cambiarContrasena($idusuario,$contrasenna);
            $usuario=Usuario::findOrFail($idusuario);
            $usuario->password=$contrasena;
            $persona=Persona::findOrFail($usuario->id_Persona);
            Mail::to($persona->correo)->send(new  CorreoUsuarioCreado($usuario,$persona));
            return 'success';
        } catch (Exception $e) {
            return 'errpr';
        }


    }
}
