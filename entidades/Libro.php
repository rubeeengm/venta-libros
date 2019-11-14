<?php

declare(strict_types = 1);

namespace entidades;

class Libro {
	private $id;
	private $nombre;
	private $autor;
	private $precio;
	private $cantidad;
	private $idCategoria;

    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getNombre() : string {
        return $this->nombre;
    }

    public function setNombre(string $nombre) : void {
        $this->nombre = $nombre;        
    }

    public function getAutor() : string {
        return $this->autor;
    }

    public function setAutor(string $autor) : void {
        $this->autor = $autor;
    }

    public function getPrecio() : float {
        return $this->precio;
    }
    
    public function setPrecio(float $precio) : void {
        $this->precio = $precio;
    }

    public function getCantidad() : int {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad) : void {
        $this->cantidad = $cantidad;
    }

    public function getIdCategoria() : int {
        return $this->idCategoria;
    }


    public function setIdCategoria(int $idCategoria) : void {
        $this->idCategoria = $idCategoria;
    }
}