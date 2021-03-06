<?php

namespace App;

use Illuminate\Support\Facades\DB;
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
            'p.idPersona as idPersona', 'usuario.idUsuario as idUsuario', 'usuario.idUsuario as idUsuario', 'usuario.estado as uestado', 'usuario.metaminima', 'usuario.porcentajeDeComision')
            ->join('persona as p', 'p.idPersona', '=', 'usuario.id_Persona')
            ->get();
    }

    public static function datos($id)
    {
        return static::select('p.nombres as pnombres', 'p.apellidos as papellidos', 'p.nroCelular as pnroCelular', 'p.correo as pcorreo', 'p.dni as pdni',
            'p.ruc as pruc', 'p.direccion as pdireccion', 'p.idPersona as idPersona', 'p.fechaNacimiento as pfechaNacimiento', 'usuario.idUsuario as idUsuario',
            'p.departamento as pdepartamento', 'p.provincia as pprovincia', 'p.distrito as pdistrito', 'p.nroCelular as pnroCelular',
            'p.correo as pcorreo', 'p.idPersona as idPersona', 'usuario.password as upassword', 'usuario.usuario as uusuario', 'usuario.metaminima', 'usuario.porcentajeDeComision','usuario.tipoUsuario')
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

    public function isAdmin()
    {
        return $this->tipoUsuario;
    }

    public function estado()
    {
        return $this->estado;
    }

    public static function obtenerMeta($idusuario)
    {
        return static::select(DB::raw('*'))
            ->where('idUsuario', $idusuario)
            ->get();
    }

    public static function obtenerTotalVenta($idusuario)
    {
        return DB::select('SELECT format(sum(totalPago),2) as total FROM pedido where idUsuario=' . $idusuario . ' and 
        month(fechaEntrega)=month(now()) and year(fechaEntrega) =year(now())  and estadoPedido=3');
    }

    public static function obtenerComision($idusuario)
    {
        return DB::select('select  case when  totpa <= meta then format(totpa *0.025,2)
            else format(totpa *0.03,2)   end comi
             from
            (select sum(pedido.totalPago) totpa,usuario.metaminima meta from pedido
            inner join usuario on usuario.idUsuario=pedido.idUsuario
             where pedido.idUsuario='.$idusuario.' and  month(fechaEntrega)=month(now()) and year(fechaEntrega) =year(now())  and estadoPedido=3)
             dato');
    }

    public static function findByCodigoOrDescription($term)
    {
        return static::select('idUsuario', 'usuario', DB::raw('concat(idUsuario," | ",usuario) as name'))
            ->Where(DB::raw('concat(idUsuario," ",usuario)'), 'LIKE', "%$term%")
            ->Where('estado', '=', 1)
            ->limit(10000)
            ->get();
    }

    public static function cambiarContrasena($id, $password)
    {
        static::where('idUsuario', $id)
            ->update(['password' => $password]);
    }
}
