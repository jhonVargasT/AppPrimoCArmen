<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class boleta extends Model
{
    protected $primaryKey = 'idBoleta';
    protected $table = 'boleta';
    public $timestamps = false;

    public static function cambiarNumeroBoleta($idPedido, $nroBoleta, $fechaEntrega)
    {
        static::where('id_Pedido', $idPedido)
            ->update(['nroboleta' => $nroBoleta, 'entregado' => 1, 'fechaEntrega' => $fechaEntrega]);
    }

    public static function obtenerUltimaBoleta()
    {
        return DB::select('SELECT nroboleta FROM bd_app.boleta 
            where fechaEntrega= (select max(fechaEntrega)from bd_app.boleta )');
    }

    public static function listarFacturas($fechaini,$fechafin)
    {
        return DB::select('SELECT LPAD(pedido.idPedido, 6, \'0\')  idPedido,boleta.nroboleta,boleta.dnioruc,boleta.vendedor,boleta.clienterazonsocial,boleta.documento,
                boleta.direccion,date(boleta.fechaEntrega) fechaEntrega ,pedido.costoBruto,pedido.impuesto,
                pedido.totalPago,boleta.entregado,date(pedido.fechaEntrega) as pedidoentreg
                 FROM boleta
                join pedido on pedido.idPedido=boleta.id_Pedido');
    }

    public static function listarFacturaPedido($idpedido)
    {
        return DB::select('SELECT LPAD(pedido.idPedido, 6, \'0\')  idPedido,boleta.nroboleta,boleta.dnioruc,boleta.vendedor,boleta.clienterazonsocial,boleta.documento,
                boleta.direccion,date(boleta.fechaEntrega) fechaEntrega ,pedido.costoBruto,pedido.impuesto,
                pedido.totalPago,boleta.entregado,date(pedido.fechaEntrega) as pedidoentreg,pedido.idPersona
                 FROM boleta
                join pedido on pedido.idPedido=boleta.id_Pedido
                where pedido.idPedido='.$idpedido);
    }
}
