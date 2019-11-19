<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Rol.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/Modelo.php';

class RolModelo extends Modelo {
    /**
     * @param Rol $rol
     * @return int
     */
    function insertar(Rol $rol) : int {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'INSERT INTO ROLES (NOMBRE) VALUES (:nombre);'
        );

        $statement->bindValue(':nombre', $rol->getNombre());

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
        $listaRoles = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT C.ID, C.NOMBRE FROM ROLES AS C;'
        );

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $rol = new Rol();
            $rol->setId((int) $result[$key]["ID"]);
            $rol->setNombre($result[$key]["NOMBRE"]);

            $listaRoles[] = $rol;
        }

        return $listaRoles;
    }

    /**
     * @param Rol $rol
     */
    function actualizar(Rol $rol) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'UPDATE ROLES SET NOMBRE = :nombre WHERE ID = :id;'
        );

        $statement->bindValue(':nombre', $rol->getNombre());
        $statement->bindValue(':id', $rol->getId());

        $statement->execute();
        $this->cerrarConexion();
    }

    /**
     * @param int $id
     */
    function eliminar(int $id) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('DELETE FROM ROLES WHERE ID = :id;');

        $statement->bindValue(':id', $id);

        $statement->execute();
        $this->cerrarConexion();
    }
}