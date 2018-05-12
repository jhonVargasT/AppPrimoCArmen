<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Persona extends Model
{
    protected $table = 'persona';
    public $timestamps = false;

    public static function listado()
    {
        return static::select('persona.nombres as pnombres', 'persona.apellidos as papellidos','persona.nroCelular as pnroCelular',
            'persona.correo as pcorreo', 'persona.dni as pdni', 'persona.ruc as pruc', 'persona.direccion  as pdireccion',
            'persona.estado as pestado','t.nombreTienda as tnombreTienda', 'dt.nombreCalle as dtnombreCalle')
            ->join('tienda as t', 't.id_Persona', '=', 'persona.idPersona')
            ->join('direcciontienda as dt', 'dt.id_Tienda', '=', 't.idTienda')
            ->get();
    }

    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
    }

    public function tiendas()
    {
        return $this->hasMany('App\Tienda');
    }
}