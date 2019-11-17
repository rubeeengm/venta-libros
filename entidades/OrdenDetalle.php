<?php
declare(strict_types = 1);

class OrdenDetalle {
	private $id;
	private $cantidad;
	private $precio;
	private $importe;
	private $idOrdenCabecera;
    private $idLibro;

    /**
     * @return int
     */
    public function getId() : int {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id) : void {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCantidad() : int {
        return $this->cantidad;
    }

    /**
     * @param int $cantidad
     */
    public function setCantidad(int $cantidad) : void {
        $this->cantidad = $cantidad;
    }

    /**
     * @return float
     */
    public function getPrecio() : float {
        return $this->precio;
    }

    /**
     * @param float $precio
     */
    public function setPrecio(float $precio) : void {
        $this->precio = $precio;
    }

    /**
     * @return float
     */
    public function getImporte() : float {
        return $this->importe;
    }

    /**
     * @param float $importe
     */
    public function setImporte(float $importe) : void {
        $this->importe = $importe;
    }

    /**
     * @return int
     */
    public function getIdOrdenCabecera() : int {
        return $this->idOrdenCabecera;
    }

    /**
     * @param int $idOrdenCabecera
     */
    public function setIdOrdenCabecera(int $idOrdenCabecera) : void {
        $this->idOrdenCabecera = $idOrdenCabecera;
    }

    /**
     * @return int
     */
    public function getIdLibro() : int {
        return $this->idLibro;
    }

    /**
     * @param int $idLibro
     */
    public function setIdLibro(int $idLibro) : void {
        $this->idLibro = $idLibro;
    }
}