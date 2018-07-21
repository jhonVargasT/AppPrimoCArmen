<?php

namespace App\Http\Controllers;
use App\Pedido;
class ReporteVendedorController extends Controller
{
    public function index(){
    return view('pagina/vendedor/reporte_vendedor');
    }

    public function obtenerPedido()
    {
        $pedido = Pedido::reporteVendedor();
    }
}
