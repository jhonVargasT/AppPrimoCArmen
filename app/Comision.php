<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comision extends Model
{
    public $idComision;
    public $mes;
    public $año;
    public $idUsuario;
    public $monto;
    public $fechaActualizacion;
    public $estado;

    /**
     * Comision constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getIdComision()
    {
        return $this->idComision;
    }

    /**
     * @param mixed $idComision
     */
    public function setIdComision($idComision)
    {
        $this->idComision = $idComision;
    }

    /**
     * @return mixed
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * @param mixed $mes
     */
    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    /**
     * @return mixed
     */
    public function getAño()
    {
        return $this->año;
    }

    /**
     * @param mixed $año
     */
    public function setAño($año)
    {
        $this->año = $año;
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
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
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



}
