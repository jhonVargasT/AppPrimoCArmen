<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    protected $table = 'comision';
    public $timestamps = false;

    public function usuarios()
    {
        return $this->belongsTo('App\Usuario');
    }
}
