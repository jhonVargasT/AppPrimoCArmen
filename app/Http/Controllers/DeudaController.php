<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;

class DeudaController extends Controller
{
    public function index(){
        return view('/pagina/deuda/deuda');
    }

    public function listardeudas()
    {
        return datatables()->of(Pedido::obtenerDeudas())->toJson();
    }
}
