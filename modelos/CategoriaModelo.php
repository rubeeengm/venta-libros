<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Categoria.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/Modelo.php';

class CategoriaModelo extends Modelo {
    /**
     * @param Categoria $categoria
     * @return int
     */
    function insertar(Categoria $categoria) : int {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'INSERT INTO CATEGORIAS (NOMBRE) VALUES (:nombre);'
        );

        $statement->bindValue(':nombre', $categoria->getNombre());
        $statement->execute();

        $id = (int) $conexion->lastInsertId();

        $this->cerrarConexion();

        return $id;
    }

    /**
     * @return array|null
     */
    function obtenerTodos() : ?array {
        $result = null;
        $listaCategorias = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('SELECT U.ID, U.NOMBRE FROM CATEGORIAS AS U;');

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $categoria = new Categoria();
            $categoria->setId((int) $result[$key]["ID"]);
            $categoria->setNombre($result[$key]["NOMBRE"]);

            $listaCategorias[] = $categoria;
        }

        return $listaCategorias;
    }

    function obtenerPorId(int $id) : ?Categoria {
        $result = null;
        $categoria = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('SELECT C.ID, C.NOMBRE FROM CATEGORIAS AS C WHERE C.ID = :id;');
        $statement->bindValue(':id', $id);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $categoria = new Categoria();
            $categoria->setId((int) $result[$key]["ID"]);
            $categoria->setNombre($result[$key]["NOMBRE"]);

            break;
        }

        return $categoria;
    }

    /**
     * @param Categoria $categoria
     */
    function actualizar(Categoria $categoria) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('UPDATE CATEGORIAS SET NOMBRE = :nombre WHERE ID = :id;');

        $statement->bindValue(':nombre', $categoria->getNombre());
        $statement->bindValue(':id', $categoria->getId());

        $statement->execute();
        $this->cerrarConexion();
    }

    /**
     * @param int $id
     */
    function eliminar(int $id) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('DELETE FROM CATEGORIAS WHERE ID = :id;');

        $statement->bindValue(':id', $id);

        $statement->execute();
        $this->cerrarConexion();
    }
}