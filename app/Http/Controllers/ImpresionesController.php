<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Producto;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use PHPJasper\PHPJasper;

use JasperPHP\Facades\JasperPHP;

//require_once 'E:\Aplicaciones\AppPrimoCArmenNuevo\vendor\vendor\autoload.php';
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

class ImpresionesController extends Controller
{

    public function generateReport()
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

    }

    public function notaVenta($id)
    {

        $data = array();
        $pedido = Pedido::obetenerCabezaTicket($id);

        $productos = Producto::obtenerProductosTicket($id);
        $impuestos = Pedido::obetenerCuerpoTicket($id);
        $pdf = new PDF();
        $pdf = PDF::loadView('pdf.ticket', ['pedido' => $pedido, 'productos' => $productos, 'impuestos' => $impuestos]);
        $pdf->setPaper(array(0, 0, 800, 155), 'landscape');
        return $pdf->stream('archivo.pdf');
    }

    public function ticketeraDirecta()
    {
        $connector = new NetworkPrintConnector("192.168.8.100", 9100);
        $printer = new Printer($connector);
        try {
            // ... Print stuff
        } finally {
            $printer -> close();
        }
    }
}