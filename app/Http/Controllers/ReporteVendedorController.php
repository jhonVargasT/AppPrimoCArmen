<?php

namespace App\Http\Controllers;
use App\Pedido;
use App\ProductoPedido;
use App\Usuario;
use http\Exception;

class ReporteVendedorController extends Controller
{
    public function index(){
        return view('pagina/vendedor/reporte_vendedor');
    }

    public function obtenerPedido()
    {


        return  datatables()->of(Pedido::reporteVendedor(1))->toJson();
    }
    public function obtenerPrdocutosPedido($idpedido)

    {
        return datatables()->of(ProductoPedido::consultarProductosPedido($idpedido))->toJson();
    }

    public function obtenerComision()
    {
        try{
            $comision= Usuario::obtenerComision(1);
            foreach ($comision as $com)
            {
                $comision=$com->suma;
            }
            return response()->json(array('error' =>1,'comi'=>$comision));
        }catch (Exception $e)
        {
            return response()->json(array('error' =>2));
        }

    }
}
