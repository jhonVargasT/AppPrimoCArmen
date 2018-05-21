<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $primaryKey = 'idTienda';
    protected $table = 'tienda';
    public $timestamps = false;

    public function personas()
    {
        return $this->belongsTo('App\Persona');
    }
}
