<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey = 'idPedido';
    protected $table = 'pedido';
    public $timestamps = false;

    public static function reporteVendedor()
    {
        return static::select('CONCAT(pe.apellidos, \', \', pe.nombres) AS nombres',
            ' pe.nroCelular',
            ' CONCAT(t.nombreTienda,
            \' - \',
            d.distrito,
            \' - \',
            d.provincia,
            \' - \',
            d.nombreCalle) AS tienda','  p.fechaEntrega',
            'p.totalPago','p.estado')
            ->from('pedido as p')
            ->join(' bd_app.productopedido pp', 'pp.id_Pedido', '=','p.idPedido')
            ->join(' bd_app.direcciontienda d', 'd.idDireccionTienda', '=', 'p.id_DireccionTienda')
            ->join('bd_app.tienda t', 't.idTienda', '=', 'd.id_Tienda')
            ->join('bd_app.persona pe', 'pe.idPersona', '=', 't.id_Persona')
            ->whereColumn([
                ['p.fechaEntrega', '>=', 'NOW()'],
                ['p.estado', '=', 1]
            ])
            ->groupBy('status')
            ->orderBy('p.fechaEntrega','asc')
            ->get();

    }

}
