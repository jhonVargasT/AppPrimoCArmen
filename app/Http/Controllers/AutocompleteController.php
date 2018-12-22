<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Producto;
use App\Tienda;
use App\Usuario;
use Illuminate\Http\Request;
use vakata\database\Exception;

class AutocompleteController extends Controller
{
    public function BuscarUsuario(Request $request)
    {
        $term = $request->input('term');
        return Usuario::findByCodigoOrDescription($term);
    }

    public function buscarPorCliente(Request $request)
    {
        $term = $request->input('term');
        return Persona::findByCodigoOrDescription($term);
    }

    public function buscarPorTienda(Request $request)
    {
        $term = $request->input('term');
        return Tienda::findByCodigoOrDescription($term);
    }

    public function buscarNombreProducto(Request $request)
    {
        try {
            $term = $request->input('term');
            $dat= Producto::findByCodigoOrDescription($term);
         return $dat;
        } catch (Exception $e) {
            return $e;
        }

    }
}
