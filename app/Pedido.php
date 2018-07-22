<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey = 'idPedido';
    protected $table = 'pedido';
    public $timestamps = false;

    public static function reporteVendedor()
    {
        return static::select(
            'p.idPedido',
            DB::raw('pp.cantidadUnidades + pp.cantidadPaquetes as cantidad'),
            DB::raw('CONCAT(pe.apellidos, \', \', pe.nombres) AS nombres'),
            'pe.nroCelular',
            DB::raw(' CONCAT(t.nombreTienda,\' - \', d.distrito, \' - \',d.provincia,\' - \',d.nombreCalle) AS tienda'),
            'p.fechaEntrega',
            'p.totalPago', 'p.estado')
            ->from('pedido as p')
            ->join('productopedido as pp', 'pp.id_Pedido', '=', 'p.idPedido')
            ->join('direcciontienda as d', 'd.idDireccionTienda', '=', 'p.id_DireccionTienda')
            ->join('tienda as t', 't.idTienda', '=', 'd.id_Tienda')
            ->join('persona as pe', 'pe.idPersona', '=', 't.id_Persona')
            ->where('p.fechaEntrega', '>=', util::fecha())
            ->orderBy('p.idPedido', 'p.fechaEntrega','d.provincia','d.distrito','d.nombreCalle','t.nombreTienda', 'asc')
            ->get();

    }

}
