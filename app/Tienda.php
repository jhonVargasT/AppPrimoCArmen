<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $table = 'tienda';
    public $timestamps = false;

    public function personas()
    {
        return $this->belongsTo('App\Persona');
    }
}
