<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $idPersona;
    public $nombres;
    public $apellidos;
    public $fechaNacimiento;
    public $direccion;
    public $nroCelular;
    public $correo;
    public $fechaCreacion;
    public $estado;
    public $fechaActualizacion;
    public $usuarioCreacion;
    public $departamento;
    public $provincia;
    public $distrito;

    /**
     * Persona constructor.
     * @param $idPersona
     * @param $nombres
     * @param $apellidos
     * @param $fechaNacimiento
     * @param $direccion
     * @param $nroCelular
     * @param $correo
     * @param $fechaCreacion
     * @param $estado
     * @param $fechaActualizacion
     * @param $usuarioCreacion
     * @param $departamento
     * @param $provincia
     * @param $distrito
     */
    public function __construct($idPersona, $nombres, $apellidos, $fechaNacimiento, $direccion, $nroCelular, $correo, $fechaCreacion, $estado, $fechaActualizacion, $usuarioCreacion, $departamento, $provincia, $distrito)
    {
        $this->idPersona = $idPersona;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->direccion = $direccion;
        $this->nroCelular = $nroCelular;
        $this->correo = $correo;
        $this->fechaCreacion = $fechaCreacion;
        $this->estado = $estado;
        $this->fechaActualizacion = $fechaActualizacion;
        $this->usuarioCreacion = $usuarioCreacion;
        $this->departamento = $departamento;
        $this->provincia = $provincia;
        $this->distrito = $distrito;
    }

    public function _construct(){}

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @param mixed $idPersona
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    /**
     * @return mixed
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param mixed $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getNroCelular()
    {
        return $this->nroCelular;
    }

    /**
     * @param mixed $nroCelular
     */
    public function setNroCelular($nroCelular)
    {
        $this->nroCelular = $nroCelular;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @param mixed $fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getFechaActualizacion()
    {
        return $this->fechaActualizacion;
    }

    /**
     * @param mixed $fechaActualizacion
     */
    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;
    }

    /**
     * @return mixed
     */
    public function getUsuarioCreacion()
    {
        return $this->usuarioCreacion;
    }

    /**
     * @param mixed $usuarioCreacion
     */
    public function setUsuarioCreacion($usuarioCreacion)
    {
        $this->usuarioCreacion = $usuarioCreacion;
    }

    /**
     * @return mixed
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * @param mixed $departamento
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    /**
     * @return mixed
     */
    public function getDistrito()
    {
        return $this->distrito;
    }

    /**
     * @param mixed $distrito
     */
    public function setDistrito($distrito)
    {
        $this->distrito = $distrito;
    }


}
