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

    public static function consultarProductoNombre($nombre)
    {
        return static::select('*')
            ->from('producto as p')
            ->where('p.nombre', $nombre)
            ->get();

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
