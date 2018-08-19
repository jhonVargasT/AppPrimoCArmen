<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Usuario;
use Illuminate\Http\Request;

class CorreoController extends Controller
{

    public function correoCreacionUsuario()
    {



      return view('Mail.Factura');

    }
}
