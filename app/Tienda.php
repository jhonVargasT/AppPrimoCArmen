<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    protected $primaryKey = 'idTienda';
    protected $table = 'tienda';
    public $timestamps = false;

    public static function actualizarTienda($id, $estado){
        static::where('idTienda', $id)
            ->update(['estado' => $estado]);
    }

    public function personas()
    {
        return $this->belongsTo('App\Persona');
    }
}
