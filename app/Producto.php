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

    public static function consultarProductoNombre($nombre,$idPersona)
    {

        return  DB::select('SELECT idProducto,nombre, tipoProducto,tipoPaquete,cantidadPaquete,
                                    CASE
                                        WHEN (select tipoCliente from persona where persona.idPersona='.$idPersona.')  = 1 THEN producto.precioVentaMino
                                        ELSE producto.precioVentaMayo
                                    END precioVenta, cantidadStockUnidad, precioVentaUnidad,cantidadProductosPaquete
                                FROM
                                    producto
                                where producto.nombre="'.$nombre.'"'
);


    }
    public static function consultarPrmocionProductoNombre($nombre,$idPersona,$idPromocion)
    {

        return DB::select('SELECT 
            producto.idProducto,
            producto.nombre,
            producto.tipoProducto,
            producto.tipoPaquete,
            producto.cantidadPaquete,
            CASE
                WHEN
                    productopromocion.activoCaja = 0
                THEN
                    CASE
                        WHEN
                            (SELECT 
                                    tipoCliente
                                FROM
                                    persona
                                WHERE
                                    persona.idPersona = '.$idPersona.') = 1
                        THEN
                            producto.precioVentaMino
                        ELSE producto.precioVentaMayo
                    END
                ELSE CASE
                    WHEN
                        (SELECT 
                                tipoCliente
                            FROM
                                persona
                            WHERE
                                persona.idPersona = '.$idPersona.') = 1
                    THEN
                        ABS((ABS(producto.precioCompra - producto.precioVentaMino) * (promocion.descuento / 100)) - producto.precioVentaMino)
                    ELSE ABS((ABS(producto.precioCompra - producto.precioVentaMayo) * (promocion.descuento / 100)) - producto.precioVentaMayo)
                END
            END precioVenta,
            cantidadStockUnidad,
            CASE
                WHEN productopromocion.activoUnidad = 0 THEN producto.precioVentaUnidad
                ELSE ABS((ABS(producto.precioCompraUnidad - producto.precioVentaUnidad) * (promocion.descuento / 100)) - producto.precioVentaUnidad)
            END precioVentaUnidad,
            cantidadProductosPaquete
        FROM
            producto
                LEFT JOIN
            productopromocion ON producto.idProducto = productopromocion.id_Producto
                LEFT JOIN
            promocion ON promocion.idPromocion = productopromocion.id_Promocion
        WHERE
            promocion.idPromocion = '.$idPromocion.'
                AND producto.nombre = "'.$nombre.'"'
                );
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

    public static function obetnerProductoMasVendido()
    {
        return $res =
            DB::select(' select  max(cant) as cant,producto.nombre
            from (SELECT count(id_Producto) as cant, id_Producto FROM productopedido
          where MONTH(now())=MONTH(fechaCreacion)
          group by id_Producto )i inner join producto on producto.idProducto = i.id_Producto
        ');
    }

    public static function obetnerNumerosProductosVendidos()
    {
        return $res =
            DB::select('SELECT sum((producto.cantidadProductosPaquete*productopedido.cantidadPaquetes)+cantidadUnidades)  as cant FROM productopedido
                            INNER JOIN producto on producto.idProducto=productopedido.id_Producto
                             where MONTH(NOW())=month(productopedido.fechaCreacion)
                             AND YEAR(NOW())=year(productopedido.fechaCreacion)  and productopedido.estado=4
                      ');
    }

    public static function obtenerProductosTicket($idPedido)
    {
        return $res =
            DB::select('SELECT LPAD(pp.idProductoPedido, 6, \'0\') as id ,pr.nombre,pr.precioVentaUnidad,pp.cantidadUnidades,pr.precioVenta,pp.cantidadPaquetes,sum((pr.precioVentaUnidad*pp.cantidadUnidades)+(pr.precioVenta*pp.cantidadPaquetes))as suma
            FROM productopedido pp
            inner JOIN producto pr on pp.id_Producto=pr.idProducto
          where pp.id_Pedido='.$idPedido.'
        group by pp.idProductoPedido
                      ');
    }


}
