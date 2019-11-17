<?php
declare(strict_types = 1);

class OrdenCabecera {
	private $id;
	private $fecha;
	private $iva;
	private $total;
	private $idCliente;

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
     * @return string
     */
    public function getFecha() : string {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     */
    public function setFecha(string $fecha) : void {
        $this->fecha = $fecha;
    }

    /**
     * @return float
     */
    public function getIva() : float {
        return $this->iva;
    }

    /**
     * @param float $iva
     */
    public function setIva(float $iva) : void {
        $this->iva = $iva;
    }

    /**
     * @return float
     */
    public function getTotal() : float {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total) : void {
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getIdCliente() : int {
        return $this->idCliente;
    }

    /**
     * @param int $idCliente
     */
    public function setIdCliente(int $idCliente) : void {
        $this->idCliente = $idCliente;
    }
}