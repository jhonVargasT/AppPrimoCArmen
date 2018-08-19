<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $primaryKey = 'idTipoProducto';
    protected $table = 'tipoproducto';
    public $timestamps = false;
    public static function cambiarEstado($id, $estado)
    {
        static::where('idTipoProducto', $id)
            ->update(['estado' => $estado]);
    }

    public static function editar($id,$nombre){
        static::where('idTipoProducto', $id)
            ->update(['nombre' => $nombre]);
    }
}
