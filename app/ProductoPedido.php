<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoPedido extends Model
{
    protected $primaryKey = 'idProductoPedido';
    protected $table = 'productopedido';
    public $timestamps = false;

    public static function consultarProductosPedido($idPedido)
    {
        return static::select('pp.idProductoPedido as idprod', 'p.nombre', 'pp.cantidadUnidades', 'pp.cantidadPaquetes', 'pp.estado', 'pp.id_Producto', 'pp.estado')
            ->from('productopedido as pp')
            ->join('bd_app.producto as  p', 'p.idProducto', '=', 'pp.id_Producto')
            ->where('pp.id_Pedido', '=', $idPedido)
            ->get();
    }

    public static function consultarProductosPedidos($idProductopedido)
    {
        return static::select('*')
            ->from('productopedido as pp')
            ->where('pp.idProductoPedido', '=', $idProductopedido)
            ->get();
    }

    public static function actualizarEstadoProductoPedido($id, $estado)
    {
        static::where('idProductoPedido', $id)
            ->update(['estado' => $estado]);
    }

    public static function actualizarCantidadProductoPedido($id, $cantpaque,$cantuni)
    {
        static::where('idProductoPedido', $id)
            ->update(['cantidadPaquetes' => $cantpaque,'cantidadUnidades'=>$cantuni]);
    }

    public static function consultarProductoPedidoPorId($idproductopedido)
    {
        return static::select('*')->where('idProductoPedido', $idproductopedido);
    }
}
