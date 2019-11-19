<?php
declare(strict_types = 1);

require_once '../entidades/Cliente.php';
require_once '../modelos/Modelo.php';

class ClienteModelo extends Modelo {
    /**
     * @param Cliente $cliente
     * @return int
     */
    function insertar(Cliente $cliente) : int {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'INSERT INTO CLIENTES (NOMBRE, APELLIDO, CORREOELECTRONICO, IDUSUARIO) 
            VALUES (:nombre, :apellido, :correoElectronico, :idUsuario);'
        );

        $statement->bindValue(':nombre', $cliente->getNombre());
        $statement->bindValue(':apellido', $cliente->getApellido());
        $statement->bindValue(':correoElectronico', $cliente->getCorreoelectronico());
        $statement->bindValue(':idUsuario', $cliente->getIdUsuario());

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
        $listaClientes = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT C.ID, C.NOMBRE, C.APELLIDO, C.CORREOELECTRONICO, C.IDUSUARIO FROM CLIENTES AS C;'
        );

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $cliente = new Cliente();
            $cliente->setId((int) $result[$key]["ID"]);
            $cliente->setNombre($result[$key]["NOMBRE"]);
            $cliente->setApellido($result[$key]["APELLIDO"]);
            $cliente->setCorreoelectronico($result[$key]["CORREOELECTRONICO"]);
            $cliente->setIdUsuario((int) $result[$key]["IDUSUARIO"]);

            $listaClientes[] = $cliente;
        }

        return $listaClientes;
    }

    /**
     * @param Cliente $cliente
     */
    function actualizar(Cliente $cliente) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'UPDATE CLIENTES 
            SET NOMBRE = :nombre
            , APELLIDO = :apellido
            , CORREOELECTRONICO = :correoElectronico
            , IDUSUARIO = :idUsuario 
            WHERE ID = :id;'
        );

        $statement->bindValue(':nombre', $cliente->getNombre());
        $statement->bindValue(':apellido', $cliente->getApellido());
        $statement->bindValue(':correoElectronico', $cliente->getCorreoelectronico());
        $statement->bindValue(':idUsuario', $cliente->getIdUsuario());
        $statement->bindValue(':id', $cliente->getId());

        $statement->execute();
        $this->cerrarConexion();
    }

    /**
     * @param int $id
     */
    function eliminar(int $id) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('DELETE FROM CLIENTES WHERE ID = :id;');

        $statement->bindValue(':id', $id);

        $statement->execute();
        $this->cerrarConexion();
    }
}