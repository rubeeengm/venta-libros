<?php
declare(strict_types = 1);

require_once 'entidades/Categoria.php';
require_once 'modelos/Modelo.php';

class CategoriaModelo extends Modelo {
    function insertar(Categoria $categoria) : int {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare("INSERT INTO CATEGORIAS (NOMBRE) VALUES (:nombre);");
        $statement->bindValue(':nombre', $categoria->getNombre());
        $statement->execute();
        $id = (int) $conexion->lastInsertId();
        $this->cerrarConexion();

        return $id;
    }
}