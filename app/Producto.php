<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    public $timestamps = false;

    public function personas()
    {
        return $this->belongsTo('App\Persona');
    }

    public function comisiones()
    {
        return $this->hasMany('App\Comision');
    }
}
