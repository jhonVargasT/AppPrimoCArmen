<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Devolucion extends Model
{
    protected $primaryKey = 'iddevolucion';
    protected $table = 'devolucion';
    public $timestamps = false;

    public static function obtenerDevolucion()
    {
        return DB::select('SELECT LPAD(d.iddevolucion, 6, \'0\') iddevolucion,p.nombre,d.cantidadUnidades,d.motivo,d.fechaCreacion,d.devuelto,d.estado FROM devolucion d join producto p on p.idProducto=d.id_Producto');
    }

    public static function obtenerDevolucionId($iddevolucion)
    {
        return static::select('*')
            ->from('devolucion as d')
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

    public static function obtenerImpresion($id)
    {
        return DB::select('SELECT producto.nombre,LPAD(devolucion.iddevolucion, 6, \'0\') as codigo, 
        devolucion.cantidadUnidades,date(devolucion.fechaCreacion) fechaCreacion,producto.precioVentaUnidad as precio,
        producto.precioVentaUnidad*devolucion.cantidadUnidades as total FROM devolucion
        inner join producto on producto.idProducto=devolucion.id_Producto
        where devolucion.iddevolucion=' . $id);

    }
}
