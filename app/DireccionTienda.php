<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionTienda extends Model
{
    protected $primaryKey = 'idDireccionTienda';
    protected $table = 'direcciontienda';
    public $timestamps = false;

    public static function actualizarDireccionTienda($id, $estado)
    {
        static::where('idDireccionTienda', $id)
            ->update(['estado' => $estado]);
    }
}
