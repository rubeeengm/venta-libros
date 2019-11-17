<?php
declare(strict_types = 1);

class Usuario {
	private $id;
	private $usuario;
	private $contrasenia;
	private $estado;
	private $idRol;

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
	public function getUsuario() : string {
		return $this->usuario;
	}

    /**
     * @param string $usuario
     */
	public function setUsuario(string $usuario) : void {
		$this->usuario = $usuario;
	}

    /**
     * @return string
     */
	public function getContrasenia() : string {
		return $this->contrasenia;
	}

    /**
     * @param string $contrasenia
     */
	public function setContrasenia(string $contrasenia) : void {
		$this->contrasenia = $contrasenia;
	}

    /**
     * @return int
     */
	public function getEstado() : int {
		return $this->estado;
	}

    /**
     * @param int $estado
     */
	public function setEstado(int $estado) : void {
		$this->estado = $estado;
	}

    /**
     * @return int
     */
	public function getIdRol() : int {
		return $this->idRol;
	}

    /**
     * @param int $idRol
     */
	public function setIdRoL(int $idRol) : void {
		$this->idRol = $idRol;
	}
}