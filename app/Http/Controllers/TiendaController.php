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
            $pedido->fechaPedido = util::fecha();
            $pedido->estadoPedido = 1;
            $pedido->idPersona = $persona->persona;
            $pedido->usuarioEliminacion = null;
            $pedido->razonEliminar = null;
            $pedido->impuesto = round(($persona->total * 0.18), 2);
            $pedido->costoBruto = round(abs(($persona->total * 0.18) - $persona->total), 2);
            $pedido->totalPago = round($persona->total, 2);
            $pedido->descuento = 0;
            $pedido->idUsuario = Session('idusuario');
            $pedido->fechaCreacion = util::fecha();
            $pedido->fechaEntrega = util::fecha();
            $pedido->lugar = 1;
            $pedido->id_DireccionTienda = $persona->tienda;
            $pedido->estadoPedido = 3;
            $productos = $data->productos;
            DB::transaction(function () use ($pedido, $productos, $persona) {
                $pedido->save();
                $idpedidoreporte = $pedido->idPedido;
                $totaldescuento = 0;
                foreach ($productos as $pr) {
                    $stockproducto = Producto::consultarProducto($pr->id);
                    foreach ($stockproducto as $stock) {
                        $stockunidad = $stock->cantidadStockUnidad;
                        $stockpaquete = $stock->cantidadPaquete;
                        if ($persona->tipousuario === 2) {
                            $montopaque = $stock->precioVentaMayo;
                        } else {
                            $montopaque = $stock->precioVentaMino;
                        }
                        $montounida = $stock->precioVentaUnidad;
                    }
                    $productopedido = new ProductoPedido();
                    $unidades = $pr->unidades;
                    $paquetes = $pr->paquete;
                    $productopedido->montoUnidades = round($pr->montounidades, 2);
                    $productopedido->montoPaquetes = round($pr->montopaquete, 2);
                    $productopedido->cantidadUnidades = $unidades;
                    if ($pr->idpromo != 0) {
                        $productopedido->id_Promocion = $pr->idpromo;
                        $productopedido->DescuentoPaquetes = round(abs($pr->montopaquete - ($montopaque * $paquetes)), 2);
                        $productopedido->DescuentoUnidades = round(abs($pr->montounidades - ($montounida * $unidades)), 2);
                    } else {
                        $productopedido->id_Promocion = null;
                        $productopedido->DescuentoPaquetes =0;
                        $productopedido->DescuentoUnidades =0;
                    }
                    $productopedido->estado = 4;
                    $productopedido->cantidadPaquetes = $paquetes;
                    $productopedido->idUsuario = Session('idusuario');;
                    $productopedido->fechaCreacion = util::fecha();
                    $productopedido->id_Producto = $pr->id;
                    $productopedido->id_Pedido = $pedido->idPedido;
                    $productopedido->save();
                    $totalunidades = ($stockunidad - $unidades);
                    $totalpaquetes = ($stockpaquete - $paquetes);
                    Producto::disminuirStock($pr->id, $totalpaquetes, $totalunidades);

                    $totaldescuento = +$productopedido->DescuentoUnidades + $productopedido->DescuentoPaquetes;
                }
                Pedido::cambiarDescuento($idpedidoreporte, round($totaldescuento, 2));
            });
            $tipousu = Session('tipoUsuario');
            $idpedidoreporte = $pedido->idPedido;

            return response()->json(array('error' => 0, 'url' => 1, 'id' => $idpedidoreporte));


        } catch (Exception $e) {
            return response()->json(array('error' => $e));
        }
    }
}
