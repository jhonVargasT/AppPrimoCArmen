<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoPedido extends Model
{
    public $idProducto;
    public $idPedido;
    public $cantidadUnidades;
    public $cantidadPaquetes;
    public $estado;
    public $usuarioId;
    public $fechaCreacion;

    /**
     * ProductoPedidoController constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * @param mixed $idProducto
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    /**
     * @return mixed
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * @param mixed $idPedido
     */
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }

    /**
     * @return mixed
     */
    public function getCantidadUnidades()
    {
        return $this->cantidadUnidades;
    }

    /**
     * @param mixed $cantidadUnidades
     */
    public function setCantidadUnidades($cantidadUnidades)
    {
        $this->cantidadUnidades = $cantidadUnidades;
    }

    /**
     * @return mixed
     */
    public function getCantidadPaquetes()
    {
        return $this->cantidadPaquetes;
    }

    /**
     * @param mixed $cantidadPaquetes
     */
    public function setCantidadPaquetes($cantidadPaquetes)
    {
        $this->cantidadPaquetes = $cantidadPaquetes;
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
    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    /**
     * @param mixed $usuarioId
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;
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

}
