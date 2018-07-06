<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionTienda extends Model
{
    protected $primaryKey = 'idDireccionTienda';
    protected $table = 'direcciontienda';
    public $timestamps = false;

    public static function actualizarDireccionTienda($idt, $estado)
    {
        static::where('id_Tienda', $idt)
            ->update(['estado' => $estado]);
    }

    public static function obtenerDirecciones($idTienda)
    {
        return static::select('distrito', 'provincia', 'nombreCalle','idDireccionTienda')
            ->where('id_Tienda', '=', $idTienda)
         //   ->where('estado', '=', 1)
            ->get();

    }
}
