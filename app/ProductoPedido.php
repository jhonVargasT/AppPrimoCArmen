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
        return static::select('p.nombre','pp.cantidadUnidades','pp.cantidadPaquetes','pp.estado')
            ->from('productopedido as pp')
            ->join('bd_app.producto as  p','p.idProducto','=','pp.id_Producto')
            ->where('pp.id_Pedido','=',$idPedido)
            ->get();
    }
}
