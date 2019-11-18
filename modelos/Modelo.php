<?php
declare(strict_types = 1);

require_once '../config.php';

abstract class Modelo {
    /**
     * @var Objeto para interactuar con la base de datos
     */
    private $conexion;

    /**
     * Devuelve un objeto de la conexión
     * @return Pdo
     */
    public function obtenerConexion() : Pdo{
        $pdo = new Pdo (
            __CONFIG__['db']['host']
            , __CONFIG__['db']['user']
            , __CONFIG__['db']['password']
        );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conexion = $pdo;

        return $this->conexion;
    }

    /**
     * Vuelve nulo el objeto de la conexion
     */
    public function cerrarConexion() : void {
        $this->conexion = null;
    }
}