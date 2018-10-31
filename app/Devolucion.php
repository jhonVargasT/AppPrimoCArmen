<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Devolucion extends Model
{
    protected $primaryKey = 'iddevolucion';
    protected $table = 'Devolucion';
    public $timestamps = false;

    public static function obtenerDevolucion()
    {
        return DB::select('SELECT LPAD(d.iddevolucion, 6, \'0\') iddevolucion,p.nombre,d.cantidadUnidades,d.motivo,d.fechaCreacion,d.devuelto,d.estado FROM devolucion d join producto p on p.idProducto=d.id_Producto');
    }

    public static function obtenerDevolucionId($iddevolucion)
    {
        return static::select('*')
            ->from('Devolucion as d')
            ->where('d.iddevolucion', $iddevolucion)
            ->get();
    }

    public static function cambiarEstado($iddevolucion, $estado)
    {
        static::where('iddevolucion', $iddevolucion)
            ->update(['estado' => $estado]);

    }
    public static function entregar($iddevolucion, $estado)
    {
        static::where('iddevolucion', $iddevolucion)
            ->update(['devuelto' => $estado]);

    }
}
