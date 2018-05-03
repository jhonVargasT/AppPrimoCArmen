<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    public $idTienda;
    public $idPersona;
    public $nombreTienda;
    public $telefono;
    public $usuarioCreacion;
    public $fechaCreacion;
    public $fechaActualzacion;

    /**
     * Tienda constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getIdTienda()
    {
        return $this->idTienda;
    }

    /**
     * @param mixed $idTienda
     */
    public function setIdTienda($idTienda)
    {
        $this->idTienda = $idTienda;
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

    /**
     * @return mixed
     */
    public function getNombreTienda()
    {
        return $this->nombreTienda;
    }

    /**
     * @param mixed $nombreTienda
     */
    public function setNombreTienda($nombreTienda)
    {
        $this->nombreTienda = $nombreTienda;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
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
    public function getFechaActualzacion()
    {
        return $this->fechaActualzacion;
    }

    /**
     * @param mixed $fechaActualzacion
     */
    public function setFechaActualzacion($fechaActualzacion)
    {
        $this->fechaActualzacion = $fechaActualzacion;
    }



}
