<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey = 'idPedido';
    protected $table = 'pedido';
    public $timestamps = false;

    public static function cambiarMontoPedido($idpedido, $monto)
    {
        return static::where('idPedido', $idpedido)
            ->update(['costoBruto' => $monto, 'totalPago' => $monto]);
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
    static function reporteAdministrador()
    {
        return static::select(
            'p.idPedido',
            DB::raw('sum(pp.cantidadUnidades + pp.cantidadPaquetes) as cantidad'),
            DB::raw('CONCAT(pe.apellidos, \', \', pe.nombres) AS nombres'),
            'pe.nroCelular',
            't.nombreTienda', 'd.provincia','d.distrito', 'd.nombreCalle',
            DB::raw('date(p.fechaEntrega) as fechaEntrega'),
            'p.totalPago', 'p.estadoPedido as estado','us.usuario')
            ->from('pedido as p')
            ->join('productopedido as pp', 'pp.id_Pedido', '=', 'p.idPedido')
            ->join('direcciontienda as d', 'd.idDireccionTienda', '=', 'p.id_DireccionTienda')
            ->join('tienda as t', 't.idTienda', '=', 'd.id_Tienda')
            ->join('persona as pe', 'pe.idPersona', '=', 't.id_Persona')
            ->join('usuario as us', 'us.idUsuario', '=', 'p.idUsuario')
            ->where(DB::raw('DATE(p.fechaEntrega)'), '>=', DB::raw('DATE(NOW())'))
            ->groupBy('p.idPedido')
            ->orderBy('p.idPedido', 'DESC')
            ->get();

    }

    public static function obtenerPedido($idPedido)
    {
        return static::select('totalPago', 'estadoPedido', 'razonEliminar', 'usuarioEliminacion')
            ->where('idPedido', $idPedido)
            ->get();
    }

    public static function cambiarEstado($idpedido, $estado)
    {
        return static::where('idPedido', $idpedido)
            ->update(['estadoPedido' => $estado]);
    }

    public static function actualizarEmilinacion($idpedido, $motivo, $usuario, $estado)
    {
        return static::where('idPedido', $idpedido)
            ->update(['estadoPedido' => $estado, 'razonEliminar' => $motivo, 'usuarioEliminacion' => $usuario]);
    }
}
