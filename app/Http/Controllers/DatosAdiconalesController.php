<?php

namespace App\Http\Controllers;

use App\TipoPaquete;
use App\TipoProducto;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatosAdiconalesController extends Controller
{
    public function index()
    {
        return view('/pagina/producto/datos_adicionales');
    }

    public function listarTipoPquete()
    {
        return datatables()->of(TipoPaquete::all())->toJson();
    }

    public function listarTipoProducto()
    {
        return datatables()->of(TipoProducto::all())->toJson();
    }

    public function agregarTipoPaquete($nombre)
    {
        try {
            $tippaque = new TipoPaquete();
            $tippaque->nombre = $nombre;

            DB::transaction(function () use ($tippaque) {
                $tippaque->save();
            });
            return 'success';
        } catch (Exception $e) {
            return 'error';
        }

    }

    public function agregarTipoProducto($nombre)
    {

        try {
            $tipprodu = new TipoProducto();
            $tipprodu->nombre = $nombre;
            DB::transaction(function () use ($tipprodu) {
                $tipprodu->save();
            });
            return 'success';
        } catch (Exception $e) {

            return $e->getMessage();
        }


    }

    public function cambiarEstadoTipoProducto($id)
    {
        try {
            $tipoprod = TipoProducto::findOrFail($id);
            $estado = $tipoprod->estado;
            if ($estado === 0)
                $estado = 1;
            else
                $estado = 0;
            TipoProducto::cambiarEstado($id, $estado);
            return 'success';
        } catch (Excepion $e) {
            return 'Error';
        }
    }

    public function cambiarEstadoTipoPaquete($id)
    {
        try {
            $tipopaque = TipoPaquete::findOrFail($id);
            $estado = $tipopaque->estado;
            if ($estado === 0)
                $estado = 1;
            else
                $estado = 0;
            TipoPaquete::cambiarEstado($id, $estado);
            return 'success';
        } catch (Excepion $e) {
            return 'Error';
        }
    }

    public function editarNombreTipo($id, $nombre, $tipo)
    {
        try {
            if ($tipo === 0) {
                TipoProducto::editar($id, $nombre);
            } elseif ($tipo === 1) {
                TipoPaquete::editar($id, $nombre);
            }
            return 'success';
        } catch (Excepion $e) {
            return 'Error';
        }
    }

    public function llenarTipos()
    {
        try{
            $tipopro=TipoProducto::listarTipoProducto();
            $tipopaque=TipoPaquete::listarTipoPaquete();
            return response()->json(array('tipoproducto' => $tipopro, 'tipopaquete' => $tipopaque));
        }catch (Exception $e)
        {
            return 'error';
        }
    }


}
