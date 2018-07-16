<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $primaryKey = 'idUsuario';
    protected $table = 'usuario';
    public $timestamps = false;

    protected $fillable = ['usuario', 'password'];

    protected $hidden = ['password'];

    public static function listado()
    {
        return static::select('p.nombres as pnombres', 'p.apellidos as papellidos', 'p.nroCelular as pnroCelular',
            'p.correo as pcorreo', 'p.dni as pdni', 'p.direccion  as pdireccion', 'usuario.usuario as uusuario', 'p.idPersona as idPersona',
            'p.idPersona as idPersona', 'usuario.idUsuario as idUsuario', 'usuario.idUsuario as idUsuario', 'usuario.estado as uestado')
            ->join('persona as p', 'p.idPersona', '=', 'usuario.id_Persona')
            ->get();
    }

    public static function datos($id)
    {
        return static::select('p.nombres as pnombres', 'p.apellidos as papellidos', 'p.nroCelular as pnroCelular', 'p.correo as pcorreo', 'p.dni as pdni',
            'p.ruc as pruc', 'p.direccion as pdireccion', 'p.idPersona as idPersona', 'p.fechaNacimiento as pfechaNacimiento', 'usuario.idUsuario as idUsuario',
            'p.departamento as pdepartamento', 'p.provincia as pprovincia', 'p.distrito as pdistrito', 'p.nroCelular as pnroCelular',
            'p.correo as pcorreo', 'p.idPersona as idPersona', 'usuario.password as upassword', 'usuario.usuario as uusuario')
            ->join('persona as p', 'p.idPersona', '=', 'usuario.id_Persona')
            ->where('idUsuario', $id)
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

    public static function actualizarUsuario($id, $estado)
    {
        return static::where('idUsuario', $id)
            ->update(['estado' => $estado]);
    }
}
