<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Persona extends Model
{
    protected $primaryKey = 'idPersona';
    protected $table = 'persona';
    public $timestamps = false;

    public static function listado()
    {
        return static::select('persona.nombres as pnombres', 'persona.apellidos as papellidos', 'persona.nroCelular as pnroCelular', 'dt.idDireccionTienda as dtidDireccionTienda',
            'persona.correo as pcorreo', 'persona.dni as pdni', 'persona.ruc as pruc', 'persona.direccion  as pdireccion', 't.idTienda as tidTienda',
            'persona.estado as pestado', 't.nombreTienda as tnombreTienda', 'dt.nombreCalle as dtnombreCalle', 'persona.idPersona as idPersona')
            ->join('tienda as t', 't.id_Persona', '=', 'persona.idPersona')
            ->join('direcciontienda as dt', 'dt.id_Tienda', '=', 't.idTienda')
            ->get();
    }

    public static function datos($id, $idt)
    {
        return static::select('p.nombres as pnombres', 'p.apellidos as papellidos', 'p.nroCelular as pnroCelular', 'p.correo as pcorreo', 'p.dni as pdni',
            'p.ruc as pruc', 'p.direccion as pdireccion', 'p.idPersona as idPersona', 't.nombreTienda as tnombreTienda', 't.telefono as ttelefono',
            'dt.nombreCalle as dtnombreCalle', 'dt.provincia as dtprovincia', 'dt.distrito as dtdistrito', 'p.fechaNacimiento as pfechaNacimiento',
            'p.departamento as pdepartamento', 'p.provincia as pprovincia', 'p.distrito as pdistrito', 'p.nroCelular as pnroCelular',
            'p.correo as pcorreo', 'p.idPersona as idPersona', 't.idTienda as idTienda', 'dt.idDireccionTienda as idDireccionTienda')
            ->from('persona as p')
            ->join('tienda as t', 't.id_Persona', '=', 'p.idPersona')
            ->join('direcciontienda as dt', 'dt.id_Tienda', '=', 't.idTienda')
            ->where('idPersona', $id)
            ->where('idDireccionTienda', $idt)
            ->get();
    }

    public static function actualizarCliente($id, $estado)
    {
        static::where('idPersona', $id)
            ->update(['estado' => $estado]);
    }

    public function productospedidos()
    {
        return $this->hasMany('App\ProductoPedido');
    }
}