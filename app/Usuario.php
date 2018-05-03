<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
   public $idUsuario;
   public $contraseña;
   public $usuario;
   public $contraseñaAntigua;
   public $fechaCambioContraseña;
   public $usuarioCreacion;
   public $fechaCreacion;
   public $estado;
   public $idPersona;

    /**
     * Usuario constructor.
     * @param $idUsuario
     * @param $contraseña
     * @param $usuario
     * @param $contraseñaAntigua
     * @param $fechaCambioContraseña
     * @param $usuarioCreacion
     * @param $fechaCreacion
     * @param $estado
     * @param $idPersona
     */
    public function __construct()
    {

    }



    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * @param mixed $contraseña
     */
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getContraseñaAntigua()
    {
        return $this->contraseñaAntigua;
    }

    /**
     * @param mixed $contraseñaAntigua
     */
    public function setContraseñaAntigua($contraseñaAntigua)
    {
        $this->contraseñaAntigua = $contraseñaAntigua;
    }

    /**
     * @return mixed
     */
    public function getFechaCambioContraseña()
    {
        return $this->fechaCambioContraseña;
    }

    /**
     * @param mixed $fechaCambioContraseña
     */
    public function setFechaCambioContraseña($fechaCambioContraseña)
    {
        $this->fechaCambioContraseña = $fechaCambioContraseña;
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

}
