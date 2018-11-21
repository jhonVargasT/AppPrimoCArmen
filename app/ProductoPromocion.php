<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoPromocion extends Model
{
    protected $primaryKey = 'idProductoPromocion';
    protected $table = 'productopromocion';
    public $timestamps = false;
    public static function ActualizarActivarCaja($id, $estado)
    {
        static::where('idProductoPromocion', $id)
            ->update(['activoCaja' => $estado]);
    }

    public static function ActualizarActivarUnidad($id, $estado)
    {
        static::where('idProductoPromocion', $id)
            ->update(['activoUnidad' => $estado]);
    }
}
