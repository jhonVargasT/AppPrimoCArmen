<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public $idPedido;
    public $idBoleta;
    public $idDireccionTienda;
    public $fechaEntrega;
    public $estado;
    public $estadoPedido;
    public $idUsuario;
    public $idPersona;
    public $usuarioEliminacion;
    public $razonEliminar;
    public $costoBruto;
    public $descuento;
    public $totalPago;

    /**
     * Pedido constructor.
     */
    public function __construct()
    {
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
    public function getIdBoleta()
    {
        return $this->idBoleta;
    }

    /**
     * @param mixed $idBoleta
     */
    public function setIdBoleta($idBoleta)
    {
        $this->idBoleta = $idBoleta;
    }

    /**
     * @return mixed
     */
    public function getIdDireccionTienda()
    {
        return $this->idDireccionTienda;
    }

    /**
     * @param mixed $idDireccionTienda
     */
    public function setIdDireccionTienda($idDireccionTienda)
    {
        $this->idDireccionTienda = $idDireccionTienda;
    }

    /**
     * @return mixed
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * @param mixed $fechaEntrega
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;
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
    public function getEstadoPedido()
    {
        return $this->estadoPedido;
    }

    /**
     * @param mixed $estadoPedido
     */
    public function setEstadoPedido($estadoPedido)
    {
        $this->estadoPedido = $estadoPedido;
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
    public function getUsuarioEliminacion()
    {
        return $this->usuarioEliminacion;
    }

    /**
     * @param mixed $usuarioEliminacion
     */
    public function setUsuarioEliminacion($usuarioEliminacion)
    {
        $this->usuarioEliminacion = $usuarioEliminacion;
    }

    /**
     * @return mixed
     */
    public function getRazonEliminar()
    {
        return $this->razonEliminar;
    }

    /**
     * @param mixed $razonEliminar
     */
    public function setRazonEliminar($razonEliminar)
    {
        $this->razonEliminar = $razonEliminar;
    }

    /**
     * @return mixed
     */
    public function getCostoBruto()
    {
        return $this->costoBruto;
    }

    /**
     * @param mixed $costoBruto
     */
    public function setCostoBruto($costoBruto)
    {
        $this->costoBruto = $costoBruto;
    }

    /**
     * @return mixed
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * @param mixed $descuento
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    /**
     * @return mixed
     */
    public function getTotalPago()
    {
        return $this->totalPago;
    }

    /**
     * @param mixed $totalPago
     */
    public function setTotalPago($totalPago)
    {
        $this->totalPago = $totalPago;
    }


}
