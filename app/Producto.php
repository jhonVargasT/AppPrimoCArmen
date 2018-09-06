<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    protected $primaryKey = 'idProducto';
    protected $table = 'producto';
    public $timestamps = false;

    public static function actualizarStock($id, $paquete, $unidad)
    {
        static::where('idProducto', $id)
            ->increment('cantidadPaquete', $paquete);

        static::where('idProducto', $id)
            ->increment('cantidadStockUnidad', $unidad);
    }

    public static function disminuirStock($id, $paquete, $unidad)
    {
        static::where('idProducto', $id)
            ->update(['cantidadPaquete' => $paquete, 'cantidadStockUnidad' => $unidad]);
    }

    public static function actualizarProducto($id, $estado)
    {
        static::where('idProducto', $id)
            ->update(['estado' => $estado]);
    }

    public static function consultarProductoNombre($nombre)
    {
        return static::select('*')
            ->from('producto as p')
            ->where('p.nombre', $nombre)
            ->get();

    }

    public static function consultarProducto($idproducto)
    {
        return static::select('*')
            ->from('producto as p')
            ->where('p.idProducto', $idproducto)
            ->get();

    }

    public function personas()
    {
        return $this->belongsTo('App\Persona');
    }

    public function comisiones()
    {
        return $this->hasMany('App\Comision');
    }

    public static function findByCodigoOrDescription($term)
    {
        return static::select('idProducto', 'nombre', DB::raw('concat(idProducto," | ",nombre) as name'))
            ->Where('nombre', 'LIKE', "%$term%")
            ->limit(50)
            ->get();
    }


}
