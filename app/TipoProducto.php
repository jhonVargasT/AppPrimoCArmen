<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $primaryKey = 'idTipoProducto';
    protected $table = 'tipoproducto';
    public $timestamps = false;

    public static function listarTipoProducto()
    {
        return static::select('tipoproducto.idTipoProducto', 'tipoproducto.nombre', 'tipoproducto.estado')
            ->where('tipoproducto.estado','=', '1')->get();
    }

    public static function cambiarEstado($id, $estado)
    {
        return  static::where('idTipoProducto', $id)
            ->update(['estado' => $estado]);
    }

    public static function editar($id, $nombre)
    {
        return static::where('idTipoProducto', $id)
            ->update(['nombre' => $nombre]);
    }
}
