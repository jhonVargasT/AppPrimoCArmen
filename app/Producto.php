<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $primaryKey = 'idProducto';
    protected $table = 'producto';
    public $timestamps = false;

    public static function actualizarStock($id, $paquete, $unidad)
    {
        if ($paquete) {
            static::where('idProducto', $id)
                ->increment('cantidadPaquete', $paquete);
        } elseif ($unidad) {
            static::where('idProducto', $id)
                ->increment('cantidadStockUnidad', $unidad);
        } elseif ($paquete && $paquete) {
            static::where('idProducto', $id)
                ->increment('cantidadPaquete', $paquete)
                ->increment('cantidadStockUnidad', $unidad);
        }
    }

    public function personas()
    {
        return $this->belongsTo('App\Persona');
    }

    public function comisiones()
    {
        return $this->hasMany('App\Comision');
    }
}
