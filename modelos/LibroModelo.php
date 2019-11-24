<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Libro.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/Modelo.php';

class LibroModelo extends Modelo {
    /**
     * @param Libro $libro
     * @return int
     */
    function insertar(Libro $libro) : int {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            "INSERT INTO LIBROS(NOMBRE, AUTOR, PRECIO, EXISTENCIA, IDCATEGORIA) 
                         VALUES (:nombre, :autor, :precio, :existencia, :idCategoria);"
        );

        $statement->bindValue(':nombre', $libro->getNombre());
        $statement->bindValue(':autor', $libro->getAutor());
        $statement->bindValue(':precio', $libro->getPrecio());
        $statement->bindValue(':existencia', $libro->getExistencia());
        $statement->bindValue(':idCategoria', $libro->getIdCategoria());

        $statement->execute();

        $id = (int) $conexion->lastInsertId();

        $this->cerrarConexion();

        return $id;
    }

    function obtenerPorId(int $id) : ?Libro {
        $result = null;
        $libro = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT L.ID, L.NOMBRE, L.AUTOR, L.PRECIO, L.EXISTENCIA, L.IDCATEGORIA, L.IMAGEN 
            FROM LIBROS AS L
            WHERE ID = :id;'
        );

        $statement->bindValue(':id', $id);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $libro = new Libro();
            $libro->setId((int) $result[$key]["ID"]);
            $libro->setNombre($result[$key]["NOMBRE"]);
            $libro->setAutor($result[$key]["AUTOR"]);
            $libro->setPrecio((float) $result[$key]["PRECIO"]);
            $libro->setExistencia((int) $result[$key]["EXISTENCIA"]);
            $libro->setIdCategoria((int) $result[$key]["IDCATEGORIA"]);
            $libro->setImagen($result[$key]["IMAGEN"]);
            break;
        }

        return $libro;
    }

    /**
     * @return array|null
     */
    function obtenerTodos() : ?array {
        $result = null;
        $listaLibros = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT L.ID, L.NOMBRE, L.AUTOR, L.PRECIO, L.EXISTENCIA, L.IDCATEGORIA, L.IMAGEN, C.NOMBRE AS CATEGORIA FROM LIBROS AS L
JOIN CATEGORIAS AS C ON L.IDCATEGORIA = C.ID;'
        );

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $libro = new Libro();
            $libro->setId((int) $result[$key]["ID"]);
            $libro->setNombre($result[$key]["NOMBRE"]);
            $libro->setAutor($result[$key]["AUTOR"]);
            $libro->setPrecio((float) $result[$key]["PRECIO"]);
            $libro->setExistencia((int) $result[$key]["EXISTENCIA"]);
            $libro->setIdCategoria((int) $result[$key]["IDCATEGORIA"]);
            $libro->setImagen($result[$key]["IMAGEN"]);
            $libro->setCategoria($result[$key]["CATEGORIA"]);

            $listaLibros[] = $libro;
        }

        return $listaLibros;
    }

    /**
     * @param Libro $libro
     */
    function actualizar(Libro $libro) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'UPDATE LIBROS 
            SET NOMBRE = :nombre
            , AUTOR = :autor
            , PRECIO = :precio
            , EXISTENCIA = :existencia
            , IDCATEGORIA = :idCategoria 
            WHERE ID = :id;'
        );

        $statement->bindValue(':nombre', $libro->getNombre());
        $statement->bindValue(':autor', $libro->getAutor());
        $statement->bindValue(':precio', $libro->getPrecio());
        $statement->bindValue(':existencia', $libro->getExistencia());
        $statement->bindValue(':idCategoria', $libro->getIdCategoria());
        $statement->bindValue(':id', $libro->getId());

        $statement->execute();
        $this->cerrarConexion();
    }

    /**
     * @param int $id
     */
    function eliminar(int $id) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('DELETE FROM LIBROS WHERE ID = :id;');

        $statement->bindValue(':id', $id);

        $statement->execute();
        $this->cerrarConexion();
    }
}