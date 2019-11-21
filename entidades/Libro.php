<?php
declare(strict_types = 1);

class Libro {
	private $id;
	private $nombre;
	private $autor;
	private $precio;
	private $existencia;
	private $idCategoria;
    private $imagen;
    private $categoria;

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
    public function getNombre() : string {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre) : void {
        $this->nombre = $nombre;        
    }

    /**
     * @return string
     */
    public function getAutor() : string {
        return $this->autor;
    }

    /**
     * @param string $autor
     */
    public function setAutor(string $autor) : void {
        $this->autor = $autor;
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
     * @return int
     */
    public function getExistencia() : int {
        return $this->existencia;
    }

    /**
     * @param int $existencia
     */
    public function setExistencia(int $existencia) : void {
        $this->existencia = $existencia;
    }

    /**
     * @return int
     */
    public function getIdCategoria() : int {
        return $this->idCategoria;
    }

    /**
     * @param int $idCategoria
     */
    public function setIdCategoria(int $idCategoria) : void {
        $this->idCategoria = $idCategoria;
    }

    public function getImagen() : string {
        return $this->imagen;
    }

    public function setImagen(string $imagen) : void {
        $this->imagen = $imagen;
    }
    
    public function getCategoria() : string {
        return $this->categoria;
    }

    public function setCategoria(string $categoria) {
        $this->categoria = $categoria;
    }
}