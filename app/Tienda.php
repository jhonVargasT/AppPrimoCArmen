<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public static function findByCodigoOrDescription($term)
    {
        return static::select('idTienda', 'nombreTienda', DB::raw('concat(idTienda," | ",nombreTienda) as name'))
            ->Where('nombreTienda', 'LIKE', "%$term%")
            ->Where('estado', '=', 1)
            ->limit(10000)
            ->get();
    }
}
