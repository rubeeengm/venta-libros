<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/Modelo.php';

class UsuarioModelo extends Modelo {
    /**
     * @param Usuario $usuario
     * @return int
     */
    function insertar(Usuario $usuario) : int {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'INSERT INTO USUARIOS (USUARIO, CONTRASENIA) VALUES (:usuario, :contrasenia)'
        );

        $statement->bindValue(':usuario', $usuario->getUsuario());
        $statement->bindValue(':contrasenia', $usuario->getContrasenia());

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
        $listaUsuarios = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT U.ID, U.USUARIO, U.CONTRASENIA, U.ESTADO, U.IDROL FROM USUARIOS AS U;'
        );

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $usuario = new Usuario();
            $usuario->setId((int) $result[$key]["ID"]);
            $usuario->setUsuario($result[$key]["USUARIO"]);
            $usuario->setContrasenia($result[$key]["CONTRASENIA"]);
            $usuario->setEstado((int) $result[$key]["ESTADO"]);
            $usuario->setIdRoL((int) $result[$key]["IDROL"]);

            $listaUsuarios[] = $usuario;
        }

        return $listaUsuarios;
    }

    /**
     * @param Usuario $usuario
     */
    function actualizar(Usuario $usuario) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'UPDATE USUARIOS 
            SET USUARIO = :usuario
            , CONTRASENIA = :contrasenia
            WHERE ID = :id;'
        );

        $statement->bindValue(':usuario', $usuario->getUsuario());
        $statement->bindValue(':contrasenia', $usuario->getContrasenia());
        $statement->bindValue(':id', $usuario->getId());

        $statement->execute();
        $this->cerrarConexion();
    }

    /**
     * @param int $id
     */
    function eliminar(int $id) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('DELETE FROM USUARIOS WHERE ID = :id;');

        $statement->bindValue(':id', $id);

        $statement->execute();
        $this->cerrarConexion();
    }

    /**
     * @param string $usuario
     * @param string $contrasenia
     */
    function login(string $usuario, string $contrasenia) : int {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT 
                IF(COUNT(ID)>0,ID,0)
            FROM 
                USUARIOS 
            WHERE 
                USUARIO = :usuario
            AND 
                CONTRASENIA = :contrasenia;'
        );

        $statement->bindValue(':usuario', $usuario);
        $statement->bindValue(':contrasenia', $contrasenia);

        $statement->execute();
        $resultado = $statement->fetch();
        $this->cerrarConexion();

        $existe = (int) $resultado[0];

        return $existe;
    }

    function verificarExistenciaUsuario(string $usuario) : int {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('SELECT COUNT(ID) FROM USUARIOS WHERE USUARIO = :usuario;');

        $statement->bindValue(':usuario', $usuario);

        $statement->execute();
        $resultado = $statement->fetch();
        $this->cerrarConexion();

        $existe = (int) $resultado[0];

        return $existe;
    }

    function obtenerPorid(int $id) : ?Usuario {
        $usuario = null;
        $result = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('
            SELECT U.ID, U.USUARIO, U.CONTRASENIA, U.ESTADO, U.ROL
            FROM USUARIOS 
            AS U
            WHERE U.ID = :id;'
        );

        $statement->bindValue(':id', $id);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $usuario = new Usuario();
            $usuario->setId((int) $result[$key]["ID"]);
            $usuario->setUsuario($result[$key]["USUARIO"]);
            $usuario->setContrasenia($result[$key]["CONTRASENIA"]);
            $usuario->setEstado((int) $result[$key]["ESTADO"]);
            $usuario->setRoL((int) $result[$key]["ROL"]);

            break;
        }

        return $usuario;
    }
}