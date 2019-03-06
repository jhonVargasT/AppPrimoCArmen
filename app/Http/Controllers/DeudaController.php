<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use vakata\database\Exception;

class DeudaController extends Controller
{
    public function index()
    {
        return view('/pagina/deuda/deuda');
    }

    public function listardeudas()
    {
        return datatables()->of(Pedido::obtenerDeudas())->toJson();
    }

    public function verdeudas($idpersona)
    {
        $persona = Pedido::obtenerdatosPersonadeuda($idpersona);
        return view('pagina.deuda.ver_deuda')->with('persona', $persona);
    }

    public function listardeudasPersona($idpersona)
    {
        return datatables()->of(Pedido::obtenerDeudasPersona($idpersona))->toJson();
    }

    public function pagarDeudas($array)
    {
        try {
            $data = json_decode($array);
            if ($data) {
                foreach ($data as $dato) {
                    $dato->monto;

                    $pedido = Pedido::findOrFail($dato->idpedido);
                    $pedido->saldo = 0;
                    DB::transaction(function () use ($pedido) {
                        $pedido->save();
                    });
                }
                return response()->json(array('error' => 0));
            } else {
                return 'error';
            }

        } catch (Exception $e) {
            return $e;
        }
    }
}
