<?php

declare(strict_types = 1);

class OrdenDetalle {
	private $id;
	private $cantidad;
	private $precio;
	private $importe;
	private $idOrdenCabecera;
    private $idLibro;
    
    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getCantidad() : int {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad) : void {
        $this->cantidad = $cantidad;
    }

    public function getPrecio() : float {
        return $this->precio;
    }

    public function setPrecio(float $precio) : void {
        $this->precio = $precio;
    }

    public function getImporte() : float {
        return $this->importe;
    }

    public function setImporte(float $importe) : void {
        $this->importe = $importe;
    }

    public function getIdOrdenCabecera() : int {
        return $this->idOrdenCabecera;
    }

    public function setIdOrdenCabecera(int $idOrdenCabecera) : void {
        $this->idOrdenCabecera = $idOrdenCabecera;
    }

    public function getIdLibro() : int {
        return $this->idLibro;
    }

    public function setIdLibro(int $idLibro) : void {
        $this->idLibro = $idLibro;
    }
}