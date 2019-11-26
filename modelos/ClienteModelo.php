<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/Modelo.php';

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

    function obtenerPorIdUsuario(int $id) : ?Cliente {
        $result = null;
        $cliente = null;

        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT C.ID, C.NOMBRE, C.APELLIDO, C.CORREOELECTRONICO, C.IDUSUARIO 
            FROM CLIENTES AS C 
            WHERE C.IDUSUARIO = :id;'
        );

        $statement->bindValue(':id', $id);
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

            break;
        }

        return $cliente;
    }

    function obtenerPorId(int $id) : ?Cliente {
        $result = null;
        $cliente = null;

        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('SELECT C.ID, C.NOMBRE, C.APELLIDO, C.CORREOELECTRONICO, C.IDUSUARIO FROM CLIENTES AS C WHERE C.ID = :id;');

        $statement->bindValue(':id', $id);
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

            break;
        }

        return $cliente;
    }

    /**
     * @return array|null
     */
    function obtenerTodos() : ?array {
        $result = null;
        $listaClientes = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT
                C.ID
                , C.NOMBRE
                , C.APELLIDO
                , C.CORREOELECTRONICO
                , U.USUARIO
                , U.CONTRASENIA
                , U.ESTADO
                , U.ROL
            FROM
                CLIENTES AS C
            JOIN
                USUARIOS AS U
            ON
                C.IDUSUARIO = U.ID
            ;'
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

            $usuario = new Usuario();
            $usuario->setUsuario($result[$key]["USUARIO"]);
            $usuario->setContrasenia($result[$key]["CONTRASENIA"]);
            $usuario->setEstado((int) $result[$key]["ESTADO"]);
            $usuario->setRoL((int) $result[$key]["ROL"]);

            $cliente->setUsuario($usuario);

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
            WHERE ID = :id;'
        );

        $statement->bindValue(':nombre', $cliente->getNombre());
        $statement->bindValue(':apellido', $cliente->getApellido());
        $statement->bindValue(':correoElectronico', $cliente->getCorreoelectronico());
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