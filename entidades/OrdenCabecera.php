<?php

declare(strict_types = 1);

class OrdenCabecera {
	private $id;
	private $fecha;
	private $iva;
	private $total;
	private $idCliente;

    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getFecha() : string {
        return $this->fecha;
    }

    public function setFecha(string $fecha) : void {
        $this->fecha = $fecha;
    }

    public function getIva() : float {
        return $this->iva;
    }

    public function setIva(float $iva) : void {
        $this->iva = $iva;
    }

    public function getTotal() : float {
        return $this->total;
    }

    public function setTotal(float $total) : void {
        $this->total = $total;
    }

    public function getIdCliente() : int {
        return $this->idCliente;
    }

    public function setIdCliente(int $idCliente) : void {
        $this->idCliente = $idCliente;
    }
}