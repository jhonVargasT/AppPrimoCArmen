<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Pedido extends Model
{
    protected $primaryKey = 'idPedido';
    protected $table = 'pedido';
    public $timestamps = false;

    public static function cambiarMontoPedido($idpedido, $monto)
    {
        return static::where('idPedido', $idpedido)
            ->update(['costoBruto' => $monto, 'impuesto' => ($monto * 0.18), 'totalPago' => $monto + ($monto * 0.18)]);
    }

    public static function cambiarMontoPedidoDescuento($idpedido, $total, $descuento, $igv, $opegrav)
    {
        return static::where('idPedido', $idpedido)
            ->update(['costoBruto' => $opegrav, 'impuesto' => $igv, 'descuento' => $descuento, 'totalPago' => $total]);
    }

    public static function cambiarMontoDesc($idpedido, $totalpag, $descuento)
    {
        return static::where('idPedido', $idpedido)
            ->update(['totalPago' => $totalpag, 'descuento' => $descuento]);
    }

    public static function cambiarDescuento($idpedido, $monto)
    {
        return static::where('idPedido', $idpedido)
            ->update(['descuento' => $monto]);
    }

    public static function reporteVendedorbusc($idusuario, $val)
    {
        return static::select(
            'p.idPedido',
            DB::raw('sum(pp.cantidadUnidades + pp.cantidadPaquetes) as cantidad'),
            DB::raw('CONCAT(pe.apellidos, \', \', pe.nombres) AS nombres'),
            'pe.nroCelular',
            DB::raw(' CONCAT(t.nombreTienda,\' - \', d.distrito, \' - \',d.provincia,\' - \',d.nombreCalle) AS tienda'),
            'p.fechaEntrega',
            'p.totalPago', 'p.estadoPedido as estado')
            ->from('pedido as p')
            ->join('productopedido as pp', 'pp.id_Pedido', '=', 'p.idPedido')
            ->join('direcciontienda as d', 'd.idDireccionTienda', '=', 'p.id_DireccionTienda')
            ->join('tienda as t', 't.idTienda', '=', 'd.id_Tienda')
            ->join('persona as pe', 'pe.idPersona', '=', 't.id_Persona')
            //   ->where('p.fechaEntrega', '>=', util::fecha())
            ->where('p.idUsuario', '=', $idusuario)
            ->where('p.estadoPedido', $val)
            ->groupBy('p.idPedido')
            ->get();

    }

    public static function reporteVendedor($idusuario)
    {
        return static::select(
            'p.idPedido',
            DB::raw('sum(pp.cantidadUnidades + pp.cantidadPaquetes) as cantidad'),
            DB::raw('CONCAT(pe.apellidos, \', \', pe.nombres) AS nombres'),
            'pe.nroCelular',
            DB::raw(' CONCAT(t.nombreTienda,\' - \', d.distrito, \' - \',d.provincia,\' - \',d.nombreCalle) AS tienda'),
            'p.fechaEntrega',
            'p.totalPago', 'p.estadoPedido as estado')
            ->from('pedido as p')
            ->join('productopedido as pp', 'pp.id_Pedido', '=', 'p.idPedido')
            ->join('direcciontienda as d', 'd.idDireccionTienda', '=', 'p.id_DireccionTienda')
            ->join('tienda as t', 't.idTienda', '=', 'd.id_Tienda')
            ->join('persona as pe', 'pe.idPersona', '=', 't.id_Persona')
            //   ->where('p.fechaEntrega', '>=', util::fecha())
            ->where('p.idUsuario', '=', $idusuario)
            ->groupBy('p.idPedido')
            ->get();

    }

    public
    static function reporteAdministradorPar($val, $fechaini, $fechafin)
    {

        $query = DB::table('pedido as p')->select(
            'p.idPedido',
            'pe.dni',
            DB::raw('sum(pp.cantidadUnidades + pp.cantidadPaquetes) as cantidad'),
            DB::raw('CONCAT(pe.apellidos, \', \', pe.nombres) AS nombres'),
            'pe.nroCelular',
            't.nombreTienda', 'd.provincia', 'd.distrito', 'd.nombreCalle',
            DB::raw('date(p.fechaPedido) as fechaEntrega'),
            DB::raw('p.totalPago as totalPago'), 'p.estadoPedido as estado', 'us.usuario')
            ->join('productopedido as pp', 'pp.id_Pedido', '=', 'p.idPedido')
            ->join('direcciontienda as d', 'd.idDireccionTienda', '=', 'p.id_DireccionTienda')
            ->join('tienda as t', 't.idTienda', '=', 'd.id_Tienda')
            ->join('persona as pe', 'pe.idPersona', '=', 't.id_Persona')
            ->join('usuario as us', 'us.idUsuario', '=', 'p.idUsuario')
            ->groupBy('p.idPedido')
            ->orderBy('p.idPedido', 'DESC');
        if ($val === '1' || $val === '2') {
            $query = $query->where('p.estadoPedido', $val);
            if ($fechaini != 0)
                $query = $query->whereBetween(DB::raw('date(p.fechaPedido) '), [$fechaini, $fechafin]);
        } else {
            if ($val === '3' || $val === '4') {
                $query = $query->where('p.estadoPedido', $val);
                if ($fechaini != 0)
                    $query = $query->whereBetween(DB::raw('date(p.fechaEntrega) '), [$fechaini, $fechafin]);
            } else {
                if ($val === '0')
                    $query = $query->where('p.estadoPedido', $val);
                if ($fechaini != 0)
                    $query = $query->whereBetween(DB::raw('date(p.fechaCreacion) '), [$fechaini, $fechafin]);
            }
        }


        return $query->get();

    }

    public
    static function reporteAdministrador()
    {
        return static::select(
            'p.idPedido',
            'pe.dni',
            DB::raw('sum(pp.cantidadUnidades + pp.cantidadPaquetes) as cantidad'),
            DB::raw('CONCAT(pe.apellidos, \', \', pe.nombres) AS nombres'),
            'pe.nroCelular',
            't.nombreTienda', 'd.provincia', 'd.distrito', 'd.nombreCalle',
            DB::raw('date(p.fechaPedido) as fechaEntrega'),
            DB::raw('p.totalPago as totalPago'), 'p.estadoPedido as estado', 'us.usuario')
            ->from('pedido as p')
            ->join('productopedido as pp', 'pp.id_Pedido', '=', 'p.idPedido')
            ->join('direcciontienda as d', 'd.idDireccionTienda', '=', 'p.id_DireccionTienda')
            ->join('tienda as t', 't.idTienda', '=', 'd.id_Tienda')
            ->join('persona as pe', 'pe.idPersona', '=', 't.id_Persona')
            ->join('usuario as us', 'us.idUsuario', '=', 'p.idUsuario')
            //   ->where(DB::raw('DATE(p.fechaPedido)'), '>=', DB::raw('DATE(NOW())'))
            ->groupBy('p.idPedido')
            ->orderBy('p.idPedido', 'DESC')
            ->get();

    }

    public static function obtenerPedido($idPedido)
    {
        return static::select('*')
            ->where('idPedido', $idPedido)
            ->get();
    }

    public static function cambiarEstado($idpedido, $estado)
    {
        return static::where('idPedido', $idpedido)
            ->update(['estadoPedido' => $estado, 'fechaEntrega' => util::fecha()]);
    }

    public static function actualizarEmilinacion($idpedido, $motivo, $usuario, $estado)
    {
        return static::where('idPedido', $idpedido)
            ->update(['estadoPedido' => $estado, 'razonEliminar' => $motivo, 'usuarioEliminacion' => $usuario]);
    }

    public static function obtenerCajaDiaria()
    {
        return DB::select('SELECT round(sum(pedido.totalPago-ifnull(pedido.saldo,0)),2) as tot FROM pedido
                                where month(now())= month(pedido.fechaEntrega)
                                and YEAR(now())= YEAR(pedido.fechaEntrega)
                                and day(now())= day(pedido.fechaEntrega)
                                and pedido.estadoPedido between 3 and 4');
    }

    public static function obtenerDeudas()
    {
        return DB::select('SELECT persona.idPersona,concat(persona.nombres,\', \',persona.apellidos) nom, persona.dni,sum(pedido.saldo) as tot FROM pedido join 
        persona on persona.idPersona=pedido.idPersona where 
        pedido.saldo is not null and pedido.saldo != 0 and pedido.estadoPedido between 3 and 4
        group by idPersona,nom,dni
      ');
    }

    public static function obtenerDeudasPersona($idpersona)
    {
        return DB::select('SELECT pedido.idPedido,pedido.fechaCreacion,pedido.fechaEntrega,
                pedido.totalPago montototal,pedido.totalPago-pedido.saldo pago, pedido.saldo
                 FROM pedido join 
                persona on persona.idPersona=pedido.idPersona where 
                pedido.saldo is not null and pedido.saldo != 0 and pedido.idPersona = '.$idpersona.' and pedido.estadoPedido between 3 and 4
      ');
    }

    public static function obtenerdatosPersonadeuda($idpersona)
    {
        return DB::select('SELECT persona.idPersona, persona.nombres,persona.apellidos,persona.dni,persona.nroCelular,persona.correo,sum(pedido.saldo)  tot
                 FROM pedido join 
                persona on persona.idPersona=pedido.idPersona where 
                pedido.saldo is not null and pedido.saldo != 0 and pedido.idPersona = '.$idpersona.' and pedido.estadoPedido between 3 and 4');
    }

    public static function obtenerCajaDiariaVendedor($idUsuario)
    {
        return DB::select('SELECT format(round(sum(pedido.totalPago-ifnull(pedido.saldo,0))),2),2) as tot FROM pedido
                                where month(now())= month(pedido.fechaEntrega)
                                and YEAR(now())= YEAR(pedido.fechaEntrega)
                                and day(now())= day(pedido.fechaEntrega)
                                and pedido.estadoPedido between 3 and 4 and pedido.idUsuario=' . $idUsuario);
    }

    public static function obtenerCajaMensual()
    {
        return DB::select('SELECT round(sum(pedido.totalPago-ifnull(pedido.saldo,0)),2) as tot FROM pedido
                                where month(now())= month(pedido.fechaEntrega)
                                and year(now())= year(pedido.fechaEntrega)
                                and pedido.estadoPedido between 3 and 4');
    }

    public static function obtenerReporte()
    {
        return DB::select('SELECT pedido.idPedido,boleta.nroboleta,ifnull(persona.razonsocial,concat(persona.nombres,\', \',persona.apellidos)) as raz,
                                    ifnull(persona.dni,persona.ruc) as  ruc,
                                    persona.nroCelular,persona.direccion,boleta.fechaCreacion,round(pedido.costoBruto,2) as costoBruto,round(pedido.impuesto,2) as impuesto,round(pedido.totalPago,2) as totalPago,boleta.entregado
                                    FROM pedido
                                    inner join persona on persona.idPersona=pedido.idPersona
                                    left join boleta on pedido.idPedido =boleta.id_Pedido
                                    where pedido.estadoPedido between 3 and 4 ');
    }

    public static function obetenerCabezaTicket($idpedido)
    {
        return DB::select('SELECT DATE(now()) fechaimpre,concat(pers.apellidos,\', \',pers.nombres)  usu,per.tipoCliente,per.idPersona, LPAD(pe.idPedido, 6, \'0\')  id,
                                  CONCAT(per.direccion ,\' - \',per.distrito,\' - \',per.provincia,\' - \',per.departamento) as direccion,ifnull(per.razonsocial,concat(per.apellidos,\', \',per.nombres))  clie, ifnull(per.ruc,per.dni) dni
                                    FROM pedido pe
                                    inner join usuario usu on usu.idUsuario=pe.idUsuario
                                    inner join persona pers on pers.idPersona=usu.id_Persona
                                    inner join persona per on per.idPersona=pe.idPersona
                                    inner join direcciontienda dr on pe.id_DireccionTienda=dr.idDireccionTienda
                                    inner join tienda ti on ti.idTienda=dr.id_Tienda
                                    where pe.estado=1  AND pe.idPedido=' . $idpedido);

    }

    public static function obtenerCabezaFactura($idpedido)
    {
        return DB::select('SELECT DATE(now()) fechaimpre,concat(pers.apellidos,\',\',pers.nombres)  usu,bol.nroboleta  id,
                                  CONCAT(per.direccion ,\' - \',per.distrito,\' - \',per.provincia,\' - \',per.departamento) as direccion,ifnull(per.razonsocial,concat(per.apellidos,\', \',per.nombres))  clie, ifnull(per.ruc,per.dni) dni
                                    FROM pedido pe
                                    inner join boleta bol on bol.id_Pedido=pe.idPedido
                                    inner join usuario usu on usu.idUsuario=pe.idUsuario
                                    inner join persona pers on pers.idPersona=usu.id_Persona
                                    inner join persona per on per.idPersona=pe.idPersona
                                    inner join direcciontienda dr on pe.id_DireccionTienda=dr.idDireccionTienda
                                    inner join tienda ti on ti.idTienda=dr.id_Tienda
                                    where pe.estado=1  AND pe.idPedido=' . $idpedido);

    }

    public static function obetenerCuerpoTicket($idpedido)
    {
        return DB::select('SELECT format(costoBruto,2) costoBruto,format(impuesto,2) impuesto,format(descuento,2) descuento,format(totalPago,2) totalPago FROM pedido where idPedido=' . $idpedido);

    }

    public static function obetenerCabezaFactura($idpedido)
    {
        return DB::select('SELECT date(now()) fecha,concat(perusu.nombres,\', \',perusu.apellidos) usu, ifnull(per.ruc,per.dni) dni, ifnull(per.razonsocial,concat(per.nombres,\', \',per.apellidos)) razsoc,per.direccion,per.idPersona FROM pedido pedi
                                join persona  per on per.idPersona=pedi.idPersona
                                join usuario usu on usu.idUsuario=pedi.idUsuario 
                                join persona  perusu on perusu.idPersona=usu.id_Persona
                                where pedi.idPedido=' . $idpedido);

    }

    public static function obetenerVendedorIngresos($vendedor, $fechaini, $fechafin)
    {
        if ($vendedor != 0)
            $vendedor = 'and pedido.idUsuario=' . $vendedor;
        else
            $vendedor = '';
        if ($fechaini != 0)
            $fechaini = ' and date(pedido.fechaEntrega) between "' . $fechaini . '" and "' . $fechafin . '"';
        else
            $fechaini = '';

        return DB::select('SELECT x.idUsuario,
                                        x.vendedor,format(x.total,2) total
                                        ,format(x.igv,2) igv,
                                        format(x.opgv,2) opgv,
                                        format(y.gastoprod,2) gastoprod,
                                        format(x.total - y.gastoprod,2) as ganancia,x.fecha,
                                         IF(x.lugar=1, "TIENDA", "CALLE") lugar
                                        FROM
                                            (SELECT 
                                                usuario.idUsuario,
                                                    CONCAT(persona.apellidos, \' ,\', persona.nombres) AS vendedor,
                                                    SUM(pedido.totalPago) total,
                                                    SUM(pedido.costoBruto) opgv,
                                                    sum(pedido.impuesto) igv,
                                                    DATE(pedido.fechaEntrega) fecha,
                                                    pedido.lugar
                                            FROM
                                                pedido
                                            JOIN usuario ON usuario.idUsuario = pedido.idUsuario
                                            JOIN persona ON persona.idPersona = usuario.id_Persona
                                            WHERE
                                                pedido.estadoPedido = 3 ' . $fechaini . ' ' . $vendedor . '
                                            GROUP BY usuario.idUsuario , pedido.lugar , DATE(pedido.fechaEntrega)
                                            ORDER BY usuario.idUsuario , DATE(pedido.fechaEntrega)) x
                                                JOIN
                                            (SELECT 
                                                SUM(productopedido.cantidadPaquetes * producto.precioCompra + productopedido.cantidadUnidades * producto.precioCompraUnidad) AS gastoprod,
                                                    pedido.idUsuario,
                                                    DATE(pedido.fechaEntrega) fechaEntrega,
                                                    pedido.lugar
                                            FROM
                                                productopedido
                                            INNER JOIN pedido ON pedido.idPedido = productopedido.id_Pedido
                                            JOIN producto ON producto.idProducto = productopedido.id_Producto
                                            WHERE
                                                pedido.estadoPedido = 3 ' . $fechaini . ' ' . $vendedor . '
                                            GROUP BY pedido.idUsuario , DATE(pedido.fechaEntrega)) y ON y.fechaEntrega = x.fecha
                                                AND y.idUsuario = x.idUsuario
                                                AND y.lugar = x.lugar');
    }

    public static function obetenerProductosIngresos($producto, $fechaini, $fechafin)
    {
        if ($producto != '0')
            $producto = 'and  producto.nombre= "' . $producto . '"';
        else
            $producto = '';
        if ($fechaini != 0)
            $fechaini = 'and date(pedido.fechaEntrega) between "' . $fechaini . '" and "' . $fechafin . '" ';
        else
            $fechaini = '';

        return DB::select('SELECT producto.idProducto, producto.nombre,sum(productopedido.cantidadPaquetes) cantpa,
                sum(productopedido.montoPaquetes) montpaque,
                sum(productopedido.cantidadUnidades) cantuni,
                sum(productopedido.montoUnidades) monuni,
                date(pedido.fechaEntrega) fecha
                FROM producto
                join productopedido on productopedido.id_Producto=producto.idProducto
                join pedido on pedido.idPedido=productopedido.id_Pedido
                where pedido.estadoPedido=3 ' . $producto . ' ' . $fechaini . '
                group by producto.nombre,date(pedido.fechaEntrega)');
    }


    public static function obetenerProductosPedidos($idusuario, $fechaini, $fechafin)
    {
        if ($idusuario != '0')
            $idusuario = ' and usuario.idUsuario=' . $idusuario;
        else
            $idusuario = '';
        if ($fechaini != 0)
            $fechaini = 'and date(pedido.fechaPedido) between "' . $fechaini . '" and "' . $fechafin . '" ';
        else
            $fechaini = '';

        return DB::select('SELECT usuario.idUsuario,concat(persona.apellidos,\', \',persona.nombres) as usu,
                                producto.nombre, sum(productopedido.cantidadPaquetes) as paque,sum(productopedido.cantidadUnidades) as uni, date(pedido.fechaPedido) fechaPedido
                                 FROM productopedido
                                inner join 
                                pedido on pedido.idPedido=productopedido.id_Pedido
                                inner join usuario on usuario.idUsuario=pedido.idUsuario
                                inner join producto on producto.idProducto=productopedido.id_Producto
                                inner join persona on persona.idPersona = usuario.id_Persona
                                 where pedido.estadoPedido =1 ' . $idusuario . ' ' . $fechaini . '
                                 group by producto.nombre,date(pedido.fechaPedido)');
    }

    public static function obetenerIngresosClientes($fechaini, $fechafin)
    {

        if ($fechaini != 0)
            $fechaini = 'and date(pedido.fechaEntrega) between "' . $fechaini . '" and "' . $fechafin . '" ';
        else
            $fechaini = '';

        return DB::select('SELECT persona.idPersona ,concat(persona.nombres,\', \',persona.apellidos) as nomb,sum(totalPago) tot,date(pedido.fechaEntrega)  as fec FROM pedido 
inner join persona on persona.idPersona=pedido.idPersona
where pedido.estadoPedido=3 ' . $fechaini . '
group by concat(persona.nombres,\', \',persona.apellidos) ,date(pedido.fechaEntrega) 
order by date(pedido.fechaEntrega) desc,concat(persona.nombres,\', \',persona.apellidos) asc');
    }
}
