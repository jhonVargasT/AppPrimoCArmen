<?php

namespace App\Http\Controllers;

use App\DireccionTienda;
use App\Persona;
use App\Tienda;
use App\util;
use Illuminate\Http\Request;
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
            $persona = new Persona;
            $persona->dni = $request->dni;
            $persona->ruc = $request->ruc;
            $persona->nombres = strtoupper($request->nombres);
            $persona->apellidos = strtoupper($request->apellidos);
            $persona->fechaNacimiento = date('Y-m-d H:i:s', strtotime($persona->fechaNacimiento));
            $persona->direccion = strtoupper($request->direccion);
            $persona->nroCelular = $request->nroCelular;
            $persona->correo = $request->correo;
            $persona->nroCelular = $request->nroCelular;
            $persona->fechaCreacion = util::fecha();
            $persona->nroCelular = $request->nroCelular;
            $persona->departamento =strtoupper($request->departamento);
            $persona->provincia = strtoupper($request->provincia);
            $persona->nroCelular = $request->nroCelular;
            $persona->distrito = strtoupper($request->distrito);
            $persona->usuarioCreacion=Session('idusuario');

            $tienda = new Tienda;
            $tienda->nombreTienda = strtoupper($request->tnombreTienda);
            $tienda->telefono = strtoupper($request->ttelefono);
            $tienda->fechaCreacion = util::fecha();

            $contdireccion = $request->val1;

            if ($contdireccion > 1) {

                DB::transaction(function () use ($persona, $tienda, $contdireccion, $request) {
                    $persona->save();

                    $tienda->id_Persona = $persona->idPersona;
                    $tienda->save();

                    for ($i = 1; $i <= $contdireccion; $i++) {
                        $direccionTienda = new DireccionTienda;
                        $direccionTienda->distrito = strtoupper($request->input('dtdistrito'.$i));
                        $direccionTienda->provincia = strtoupper($request->input('dtprovincia'.$i));
                        $direccionTienda->nombreCalle = strtoupper($request->input('dtnombreCalle'.$i));
                        $direccionTienda->fechaCreacion = util::fecha();

                        $direccionTienda->id_Tienda = $tienda->idTienda;
                        $direccionTienda->save();
                    }
                });
                return 'success';

            } else {
                $direccionTienda = new DireccionTienda;
                $direccionTienda->distrito = strtoupper($request->dtdistrito1);
                $direccionTienda->provincia = strtoupper($request->dtprovincia1);
                $direccionTienda->nombreCalle = strtoupper($request->dtnombreCalle1);
                $direccionTienda->fechaCreacion = util::fecha();

                DB::transaction(function () use ($persona, $tienda, $direccionTienda) {
                    $persona->save();

                    $tienda->id_Persona = $persona->idPersona;
                    $tienda->save();

                    $direccionTienda->id_Tienda = $tienda->idTienda;
                    $direccionTienda->save();

                });
                return 'success';
            }
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
     * @return int
     */
    public function edit($id)
    {
        $ids = explode('-', $id);
        $persona = Persona::datos($ids[0], $ids[1]);
        return view('pagina.cliente.editar_cliente')->with('persona', $persona);
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
            $persona = Persona::findOrFail($id);

            $persona->dni = $request->dni;
            $persona->ruc = $request->ruc;
            $persona->nombres = strtoupper($request->nombres);
            $persona->apellidos = strtoupper($request->apellidos);
            $persona->fechaNacimiento = date('Y-m-d H:i:s', strtotime($persona->fechaNacimiento));
            $persona->direccion = strtoupper($request->direccion);
            $persona->nroCelular = $request->nroCelular;
            $persona->correo = $request->correo;
            $persona->nroCelular = $request->nroCelular;
            $persona->fechaCreacion = util::fecha();
            $persona->nroCelular = $request->nroCelular;
            $persona->departamento = strtoupper($request->departamento);
            $persona->provincia = strtoupper($request->provincia);
            $persona->nroCelular = $request->nroCelular;
            $persona->distrito = strtoupper($request->distrito);

            $tienda = Tienda::findOrFail($request->idTienda);
            $tienda->nombreTienda = strtoupper($request->tnombreTienda);
            $tienda->telefono = $request->ttelefono;
            $tienda->fechaCreacion = util::fecha();

            $direccionTienda = DireccionTienda::findOrFail($request->idDireccionTienda);
            $direccionTienda->distrito = strtoupper($request->dtdistrito);
            $direccionTienda->provincia = strtoupper($request->dtprovincia);
            $direccionTienda->nombreCalle = strtoupper($request->dtnombreCalle);
            $direccionTienda->fechaCreacion = util::fecha();

            DB::transaction(function () use ($persona, $tienda, $direccionTienda) {
                $persona->save();

                $tienda->id_Persona = $persona->idPersona;
                $tienda->save();

                $direccionTienda->id_Tienda = $tienda->idTienda;
                $direccionTienda->save();

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

    public function actualizarCliente(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Persona::actualizarCliente($request->idp, $request->estado);
                Tienda::actualizarTienda($request->idt, $request->estado);
                DireccionTienda::actualizarDireccionTienda($request->idt, $request->estado);
            });
            return 'success';

        } catch (Exception $e) {
            return $e;
        }
    }
}
