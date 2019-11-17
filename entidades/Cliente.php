<?php
declare(strict_types = 1);

class Cliente {
	private $id;
	private $nombre;
	private $apellido;
	private $correoelectronico;
    private $idUsuario;

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
    public function getApellido() : string {
        return $this->apellido;
    }

    /**
     * @param string $apellido
     */
    public function setApellido(string $apellido) : void {
        $this->apellido = $apellido;
    }

    /**
     * @return string
     */
    public function getCorreoelectronico() : string {
        return $this->correoelectronico;
    }

    /**
     * @param string $correoelectronico
     */
    public function setCorreoelectronico(string $correoelectronico) : void {
        $this->correoelectronico = $correoelectronico;
    }

    /**
     * @return int
     */
    public function getIdUsuario() : int {
        return $this->idUsuario;
    }

    /**
     * @param int $idUsuario
     */
    public function setIdUsuario(int $idUsuario) : void {
        $this->idUsuario = $idUsuario;
    }
}