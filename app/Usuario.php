<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    public $timestamps = false;

    public static function listado()
    {
        return static::select('p.nombres as pnombres', 'p.apellidos as papellidos', 'p.nroCelular as pnroCelular',
            'p.correo as pcorreo', 'p.dni as pdni', 'p.direccion  as pdireccion', 'p.estado as pestado'
            , 'usuario.usuario as uusuario')
            ->join('persona as p', 'p.idPersona', '=', 'usuario.id_Persona')
            ->get();
    }

    public function personas()
    {
        return $this->belongsTo('App\Persona');
    }

    public function comisiones()
    {
        return $this->hasMany('App\Comision');
    }
}
