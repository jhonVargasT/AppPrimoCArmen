<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    public function BuscarUsuario(Request $request)
    {
        $term = $request->input('term');
        return Usuario::findByCodigoOrDescription($term);
    }
}
