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
    static function reporteAdministradorPar($val)
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
            ->where(DB::raw('DATE(p.fechaPedido)'), '>=', DB::raw('DATE(NOW())'))
            ->where('p.estadoPedido', $val)
            ->groupBy('p.idPedido')
            ->orderBy('p.idPedido', 'DESC')
            ->get();

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
            ->where(DB::raw('DATE(p.fechaPedido)'), '>=', DB::raw('DATE(NOW())'))
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
        return DB::select('SELECT round(sum(pedido.totalPago),2) as tot FROM pedido
                                where month(now())= month(pedido.fechaEntrega)
                                and YEAR(now())= YEAR(pedido.fechaEntrega)
                                and day(now())= day(pedido.fechaEntrega)
                                and pedido.estadoPedido between 3 and 4');
    }

    public static function obtenerCajaMensual()
    {
        return DB::select('SELECT round(sum(pedido.totalPago),2) as tot FROM pedido
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
        return DB::select('SELECT DATE(now()) fechaimpre,concat(pers.apellidos,\', \',pers.nombres)  usu, LPAD(pe.idPedido, 6, \'0\')  id,
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
        return DB::select('SELECT round(costoBruto,2) as opgrav,round(costoBruto*0.18,2) as igv,round(sum(costoBruto+(costoBruto*0.18)),2) as tot FROM pedido where idPedido='.$idpedido);

    }
}
