<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPaquete extends Model
{
    protected $primaryKey = 'idTipoPaquete';
    protected $table = 'tipopaquete';
    public $timestamps = false;
    public static function listarTipoPaquete()
    {
       return static::select('tipopaquete.idTipoPaquete','tipopaquete.nombre','tipopaquete.estado')
            ->where('tipopaquete.estado','=',1)->get();
    }
    public static function cambiarEstado($id, $estado)
    {
        return static::where('idTipoPaquete', $id)
            ->update(['estado' => $estado]);
    }

    public static function editar($id,$nombre){
        return static::where('idTipoPaquete', $id)
            ->update(['nombre' => $nombre]);
    }
}
