<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $idProducto;
    public $nombre;
    public $tipoProducto;
    public $tipoPaquete;
    public $cantidadPaquete;
    public $cantidadProductosPaquete;
    public $precioCompra;
    public $precioVenta;
    public $comisionPaquete;
    public $cantidadStockUnidad;
    public $precioCompraUnidad;
    public $precioVentaUnidad;
    public $descuento;

    /**
     * ProductoController constructor.
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getTipoProducto()
    {
        return $this->tipoProducto;
    }

    /**
     * @param mixed $tipoProducto
     */
    public function setTipoProducto($tipoProducto)
    {
        $this->tipoProducto = $tipoProducto;
    }

    /**
     * @return mixed
     */
    public function getTipoPaquete()
    {
        return $this->tipoPaquete;
    }

    /**
     * @param mixed $tipoPaquete
     */
    public function setTipoPaquete($tipoPaquete)
    {
        $this->tipoPaquete = $tipoPaquete;
    }

    /**
     * @return mixed
     */
    public function getCantidadPaquete()
    {
        return $this->cantidadPaquete;
    }

    /**
     * @param mixed $cantidadPaquete
     */
    public function setCantidadPaquete($cantidadPaquete)
    {
        $this->cantidadPaquete = $cantidadPaquete;
    }

    /**
     * @return mixed
     */
    public function getCantidadProductosPaquete()
    {
        return $this->cantidadProductosPaquete;
    }

    /**
     * @param mixed $cantidadProductosPaquete
     */
    public function setCantidadProductosPaquete($cantidadProductosPaquete)
    {
        $this->cantidadProductosPaquete = $cantidadProductosPaquete;
    }

    /**
     * @return mixed
     */
    public function getPrecioCompra()
    {
        return $this->precioCompra;
    }

    /**
     * @param mixed $precioCompra
     */
    public function setPrecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;
    }

    /**
     * @return mixed
     */
    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }

    /**
     * @param mixed $precioVenta
     */
    public function setPrecioVenta($precioVenta)
    {
        $this->precioVenta = $precioVenta;
    }

    /**
     * @return mixed
     */
    public function getComisionPaquete()
    {
        return $this->comisionPaquete;
    }

    /**
     * @param mixed $comisionPaquete
     */
    public function setComisionPaquete($comisionPaquete)
    {
        $this->comisionPaquete = $comisionPaquete;
    }

    /**
     * @return mixed
     */
    public function getCantidadStockUnidad()
    {
        return $this->cantidadStockUnidad;
    }

    /**
     * @param mixed $cantidadStockUnidad
     */
    public function setCantidadStockUnidad($cantidadStockUnidad)
    {
        $this->cantidadStockUnidad = $cantidadStockUnidad;
    }

    /**
     * @return mixed
     */
    public function getPrecioCompraUnidad()
    {
        return $this->precioCompraUnidad;
    }

    /**
     * @param mixed $precioCompraUnidad
     */
    public function setPrecioCompraUnidad($precioCompraUnidad)
    {
        $this->precioCompraUnidad = $precioCompraUnidad;
    }

    /**
     * @return mixed
     */
    public function getPrecioVentaUnidad()
    {
        return $this->precioVentaUnidad;
    }

    /**
     * @param mixed $precioVentaUnidad
     */
    public function setPrecioVentaUnidad($precioVentaUnidad)
    {
        $this->precioVentaUnidad = $precioVentaUnidad;
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

}
