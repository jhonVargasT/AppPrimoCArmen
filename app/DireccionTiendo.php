<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionTiendo extends Model
{
    public $direccionTienda;
    public $nombreCalle;
    public $Distrito;
    public $nroCalle;
    public $fechaCreacion;
    public $fechaActualzaicion;

    /**
     * DireccionTiendo constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getDireccionTienda()
    {
        return $this->direccionTienda;
    }

    /**
     * @param mixed $direccionTienda
     */
    public function setDireccionTienda($direccionTienda)
    {
        $this->direccionTienda = $direccionTienda;
    }

    /**
     * @return mixed
     */
    public function getNombreCalle()
    {
        return $this->nombreCalle;
    }

    /**
     * @param mixed $nombreCalle
     */
    public function setNombreCalle($nombreCalle)
    {
        $this->nombreCalle = $nombreCalle;
    }

    /**
     * @return mixed
     */
    public function getDistrito()
    {
        return $this->Distrito;
    }

    /**
     * @param mixed $Distrito
     */
    public function setDistrito($Distrito)
    {
        $this->Distrito = $Distrito;
    }

    /**
     * @return mixed
     */
    public function getNroCalle()
    {
        return $this->nroCalle;
    }

    /**
     * @param mixed $nroCalle
     */
    public function setNroCalle($nroCalle)
    {
        $this->nroCalle = $nroCalle;
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
    public function getFechaActualzaicion()
    {
        return $this->fechaActualzaicion;
    }

    /**
     * @param mixed $fechaActualzaicion
     */
    public function setFechaActualzaicion($fechaActualzaicion)
    {
        $this->fechaActualzaicion = $fechaActualzaicion;
    }

}
