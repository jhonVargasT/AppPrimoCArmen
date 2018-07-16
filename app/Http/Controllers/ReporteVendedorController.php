<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class ReporteVendedorController extends Controller
{
    public function index(){
    return view('pagina/vendedor/reporte_vendedor');
    }
}
