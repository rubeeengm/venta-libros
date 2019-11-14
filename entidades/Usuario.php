<?php

declare(strict_types = 1);

namespace entidades;

class Usuario {
	private $id;
	private $usuario;
	private $contrasenia;
	private $estado;
	private $roleId;

	public function getTd() : int {
		return $this->id;
	}

	public function setId(int $id) : void {
		$this->id = $id;
	}

	public function getUsuario() : string {
		return $this->usuario;
	}

	public function setUsuario(string $usuario) : void {
		$this->usuario = $usuario;
	}

	public function getContrasenia() : string {
		return $this->contrasenia;
	}

	public function setContrasenia(string $contrasenia) : void {
		$this->contrasenia = $contrasenia;
	}

	public function getEstado() : int {
		return $this->estado;
	}

	public function setEstado(int $estado) : void {
		$this->estado = $estado;
	}

	public function getRoleId() : int {
		return $this->roleId;
	}

	public function setRoleId(int $roleId) : void {
		$this->roleId = $roleId;
	}
}