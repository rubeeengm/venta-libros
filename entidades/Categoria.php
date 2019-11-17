<?php
declare(strict_types = 1);

class Categoria {
	private $id;
	private $nombre;

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
}