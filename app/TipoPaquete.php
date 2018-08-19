<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPaquete extends Model
{
    protected $primaryKey = 'idTipoPaquete';
    protected $table = 'tipopaquete';
    public $timestamps = false;

    public static function cambiarEstado($id, $estado)
    {
        static::where('idTipoPaquete', $id)
            ->update(['estado' => $estado]);
    }

    public static function editar($id,$nombre){
        static::where('idTipoPaquete', $id)
            ->update(['nombre' => $nombre]);
    }
}
