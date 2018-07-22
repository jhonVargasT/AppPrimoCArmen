<?php

namespace App\Http\Controllers;
use App\Pedido;
use App\ProductoPedido;

class ReporteVendedorController extends Controller
{
    public function index(){
    return view('pagina/vendedor/reporte_vendedor');
    }

    public function obtenerPedido()
    {
        return  datatables()->of(Pedido::reporteVendedor())->toJson();
    }
    public function obtenerPrdocutosPedido($idpedido)

    {
        return datatables()->of(ProductoPedido::consultarProductosPedido($idpedido))->toJson();
    }
}
