<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoPedido extends Model
{
    protected $primaryKey = 'idProductoPedido';
    protected $table = 'productopedido';
    public $timestamps = false;

}
