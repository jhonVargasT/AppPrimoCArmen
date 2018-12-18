<?php

namespace App\Http\Controllers;

use App\boleta;
use App\Devolucion;
use App\Pedido;
use App\Producto;
use App\util;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


//require_once 'E:\Aplicaciones\AppPrimoCArmenNuevo\vendor\vendor\autoload.php';
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

class ImpresionesController extends Controller
{

    /*   public function generateReport()
       {
           JasperPHP::compile(__DIR__ . '/vendor/cossou/jasperphp/examples/hello_world.jrxml')->execute();

       }

       public function report()
       {
           $datafile = base_path('/storage/jasper/data.json');
           $output = base_path('/storage/jasper/data'); //indicate the name of the output PDF
           JasperPHP::process(
               base_path('/resources/reports/taxinvoice80.jrxml'),
               $output,
               array("pdf"),
               array("msg" => "Tax Invoice"),
               array("driver" => "json", "json_query" => "data", "data_file" => $datafile)
           )->execute();

       }*/

    public function notaVenta($id)
    {

        $data = array();
        $pedido = Pedido::obetenerCabezaTicket($id);
        foreach ($pedido as $ped) {
            $idpers = $ped->idPersona;
        }
        $productos = Producto::obtenerProductosTicket($id, $idpers);
        $impuestos = Pedido::obetenerCuerpoTicket($id);
        $pdf = new PDF();
        $pdf = PDF::loadView('pdf.ticket', ['pedido' => $pedido, 'productos' => $productos, 'impuestos' => $impuestos]);
        $pdf->setPaper(array(0, 0, 800, 165), 'landscape');
        return $pdf->download('notaventa-'.$id.'-'.util::fecha().'.pdf');
    }

    public function facturaEletronica($id)
    {

        $data = array();
        $cabezaPedido = Boleta::listarFacturaPedido($id);
        foreach ($cabezaPedido as $cab) {
            $idPersona = $cab->idPersona;
            $tipodoc=$cab->documento;
        }
        $productos = Producto::obtenerProductosTicket($id, $idPersona);
        $impuestos = Pedido::obetenerCuerpoTicket($id);
        $pdf = new PDF();
        $pdf = PDF::loadView('pdf.factura', ['cabezaPedido' => $cabezaPedido, 'productos' => $productos, 'impuestos' => $impuestos]);
        $pdf->setPaper(array(0, 0, 800, 155), 'landscape');
        return $pdf->download($tipodoc.'.pdf');
    }

    public function devoluciones($id)
    {
        $devolucion = Devolucion::obtenerImpresion($id);
        $pdf = new PDF();
        $pdf = PDF::loadView('pdf.devolucion', ['devolucion' => $devolucion]);
        $pdf->setPaper(array(0, 0, 500, 155), 'landscape');
        return $pdf->download('devolucion.pdf');

    }

    public function ticketeraDirecta()
    {
        $connector = new NetworkPrintConnector("192.168.8.100", 9100);
        $printer = new Printer($connector);
        try {
            // ... Print stuff
        } finally {
            $printer->close();
        }
    }
}