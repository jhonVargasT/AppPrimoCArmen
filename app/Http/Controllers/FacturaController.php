<?php

namespace App\Http\Controllers;

use App\boleta;
use App\Pedido;
use Illuminate\Http\Request;
use App\Producto;
use vakata\database\Exception;

class FacturaController extends Controller
{
    public function index()
    {
        return view('pagina.factura.reporte_facturas');
    }

    public function nuevaFactura()
    {
        return view('pagina.factura.agregar_factura');
    }


    public function buscarFactura($idpedido)
    {
        try {
            $idPersona = null;
            $cabezaPedido = Pedido::obetenerCabezaFactura($idpedido);
            foreach ($cabezaPedido as $cab) {
                $idPersona = $cab->idPersona;
            }
            $productos = Producto::obtenerProductosTicket($idpedido, $idPersona);
            $impuestos = Pedido::obetenerCuerpoTicket($idpedido);
            return response()->json(array('error' => 1, 'productos' => $productos, 'cabeza' => $cabezaPedido, 'impuesto' => $impuestos));
        } catch (Exception $e) {
            return response()->json(array('error' => 0, 'err' => $e));
        }
    }

    public function enviarFactura($factura){

        try{
            //amic separas este arreglo cen 3 arreglos cabezafactura,piefactura, productos
            var_dump($factura);
        }catch (Exception $e){
            return $e;
        }
    }

    public function listarFacturas(){
        return datatables()->of(Boleta::listarFacturas())->toJson();
    }
}
