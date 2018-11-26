<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Promocion extends Model
{
    protected $primaryKey = 'idPromocion';
    protected $table = 'promocion';
    public $timestamps = false;

    public static function actualizarPromocion($id, $estado)
    {
        static::where('idPromocion', $id)
            ->update(['estado' => $estado]);
    }

    public static function obtenerProductoPromocion($id)
    {
        return DB::select('SELECT 
    productopromocion.idProductoPromocion id,
    producto.nombre,
    productopromocion.fechaCreacion,
    productopromocion.activoCaja,
    productopromocion.activoUnidad,

    CASE
        WHEN productopromocion.activoCaja = 0 THEN producto.precioVentaMayo
        ELSE abs((abs(producto.precioCompra - producto.precioVentaMayo) * (promocion.descuento / 100))-producto.precioVentaMayo)
    END montomayo,
    CASE
         WHEN productopromocion.activoCaja = 0 THEN producto.precioVentaMino
        ELSE abs((abs(producto.precioCompra - producto.precioVentaMino) * (promocion.descuento / 100))-producto.precioVentaMino)
        end montomino,
    CASE
        WHEN productopromocion.activoUnidad = 0 THEN producto.precioVentaUnidad
        ELSE abs((abs(producto.precioCompraUnidad - producto.precioVentaUnidad) * (promocion.descuento / 100))-producto.precioVentaUnidad)
    END montouni,
    producto.idProducto	 idProducto,
    promocion.idPromocion idpromo
FROM
    producto
        LEFT JOIN
    productopromocion ON producto.idProducto = productopromocion.id_Producto
        left  JOIN
    promocion ON promocion.idPromocion = productopromocion.id_Promocion
    where promocion.idPromocion=' . $id . '
    union
SELECT 
    0 id,
    producto.nombre,
    \'0000-00-00 00:00:00\',
    0 activoCaja,
    0 activoUnidad,
    producto.precioVentaMayo montomayo,
    producto.precioVentaMino montomino,
	producto.precioVentaUnidad  montouni,
    producto.idProducto,
    ' . $id . ' idpromo
FROM
    producto
where producto.idProducto not in(select id_Producto from productopromocion where id_Promocion=' . $id . ')');
    }

    public static function listarPromocionesProducto($id)
    {
        return DB::select('SELECT promocion.idPromocion idPromocion,promocion.nombre  nombre FROM productopromocion
                                    inner join promocion on productopromocion.id_Promocion = promocion.idPromocion
                                    where productopromocion.id_Producto='. $id.' and promocion.activo=1' );
    }

}
