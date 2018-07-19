<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey = 'idPedido';
    protected $table = 'pedido';
    public $timestamps = false;
  static function ingresarPedido()
  {

  }
}
