<?php

declare(strict_types = 1);

class Cliente {
	private $id;
	private $nombre;
	private $apellido;
	private $correoelectronico;
    private $idUsuario;

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

    public function getApellido() : string {
        return $this->apellido;
    }

    public function setApellido(string $apellido) : void {
        $this->apellido = $apellido;
    }

    public function getCorreoelectronico() : string {
        return $this->correoelectronico;
    }

    public function setCorreoelectronico(string $correoelectronico) : void {
        $this->correoelectronico = $correoelectronico;
    }

    public function getIdUsuario() : int {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario) : void {
        $this->idUsuario = $idUsuario;
    }
}