<?php

declare(strict_types = 1);

namespace entidades;

class Rol {
	private $id;
	private $nombre;

	public function getTd() : int {
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
}