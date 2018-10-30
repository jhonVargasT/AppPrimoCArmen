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
}
