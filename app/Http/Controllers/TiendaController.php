<?php

namespace App\Http\Controllers;

use App\boleta;
use App\Pedido;
use App\Producto;
use App\ProductoPedido;
use App\util;
use Barryvdh\DomPDF\Facade as PDF;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/pagina/vendedor/tienda');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function enviarPedidos($array)
    {
        // return response()->json(array('error' => 0,'url'=>0,'id'=>1));
        try {
            $idpedidoreporte = null;
            $data = json_decode($array);
            $persona = $data->persona;


            $pedido = new Pedido;
            $pedido->fechaEntrega = null;
            $pedido->fechaPedido = date('Y-m-d H:i:s', strtotime($persona->fechaentrega));;
            $pedido->estadoPedido = 1;
            $pedido->idPersona = $persona->persona;
            $pedido->usuarioEliminacion = null;
            $pedido->razonEliminar = null;
            $pedido->costoBruto = $persona->total;
            $pedido->impuesto = ($persona->total * 0.18);
            $pedido->descuento = 0;
            $pedido->totalPago = ($persona->total * 0.18) + $persona->total;
            $pedido->idUsuario = Session('idusuario');
            $pedido->fechaCreacion = util::fecha();
            $pedido->id_DireccionTienda = $persona->tienda;
            $pedido->estadoPedido = 3;
            $productos = $data->productos;
            DB::transaction(function () use ($pedido, $productos) {
                $pedido->save();
                $idpedidoreporte = $pedido->idPedido;
                foreach ($productos as $pr) {
                    $stockproducto = Producto::consultarProducto($pr->id);
                    $productopedido = new ProductoPedido();
                    $unidades = $pr->unidades;
                    $paquetes = $pr->paquete;
                    $productopedido->cantidadUnidades = $unidades;
                    $productopedido->estado = 4;
                    $productopedido->cantidadPaquetes = $paquetes;
                    $productopedido->idUsuario = Session('idusuario');;
                    $productopedido->fechaCreacion = util::fecha();
                    $productopedido->id_Producto = $pr->id;
                    $productopedido->id_Pedido = $pedido->idPedido;
                    $productopedido->save();
                    foreach ($stockproducto as $stock) {
                        $stockunidad = $stock->cantidadStockUnidad;
                        $stockpaquete = $stock->cantidadPaquete;
                    }
                    $totalunidades = ($stockunidad - $unidades);
                    $totalpaquetes = ($stockpaquete - $paquetes);
                    Producto::disminuirStock($pr->id, $totalpaquetes, $totalunidades);
                }
                $boleta = new Boleta();
                $boleta->id_Pedido = $idpedidoreporte;
                $boleta->estado = 1;
                $boleta->entregado = 0;
                $boleta->fechaCreacion = util::fecha();
                $boleta->nroimpresiones = 0;
                $boleta->tipocomprobante = null;
                //  $boleta->montoletras = util::convertirSeisCifras($montoletra);
                $boleta->nroboleta = null;
                $boleta->idcliente = $pedido->idPersona;
                $boleta->idUsuario = Session('idusuario');
                $boleta->save();
            });
            $tipousu = Session('tipoUsuario');
            $idpedidoreporte = $pedido->idPedido;

            return response()->json(array('error' => 0, 'url' => 1, 'id' => $idpedidoreporte));


        } catch (Exception $e) {
            return response()->json(array('error' => $e));
        }
    }
}
