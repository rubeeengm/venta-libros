<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/OrdenCabecera.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/OrdenUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/Modelo.php';

class OrdenCabeceraModelo extends Modelo {
    /**
     * @param OrdenCabecera $ordenCabecera
     * @return int
     */
    function insertar(OrdenCabecera $ordenCabecera) : int {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'INSERT INTO ORDENESCABECERA (FECHA, IVA, TOTAL, IDCLIENTE)
            VALUES (NOW(), :iva, :total, :idCliente);'
        );

        $statement->bindValue(':iva', $ordenCabecera->getIva());
        $statement->bindValue(':total', $ordenCabecera->getTotal());
        $statement->bindValue(':idCliente', $ordenCabecera->getIdCliente());

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
        $listaOrdenes = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT O.ID, O.FECHA, D.CANTIDAD, D.PRECIO, D.IMPORTE, O.IDCLIENTE, L.NOMBRE, U.USUARIO
            FROM ORDENESCABECERA AS O 
            JOIN ORDENESDETALLE AS D
            ON O.ID = D.IDORDENCABECERA
            JOIN LIBROS AS L
            ON D.IDLIBRO = L.ID
            JOIN CLIENTES AS  C
            ON O.IDCLIENTE = C.ID
            JOIN USUARIOS AS U
            ON C.IDUSUARIO = U.ID'
        );

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $ordenUsuario = new OrdenUsuario();
            $ordenUsuario->id = (int) $result[$key]["ID"];
            $ordenUsuario->fecha = $result[$key]["FECHA"];
            $ordenUsuario->cantidad = (int) $result[$key]["CANTIDAD"];
            $ordenUsuario->precio = (float) $result[$key]["PRECIO"];
            $ordenUsuario->importe = (float) $result[$key]["IMPORTE"];
            $ordenUsuario->idCliente = (int) $result[$key]["IDCLIENTE"];
            $ordenUsuario->nombre = $result[$key]["NOMBRE"];
            $ordenUsuario->usuario = $result[$key]["USUARIO"];

            $listaOrdenes[] = $ordenUsuario;
        }

        return $listaOrdenes;
    }

    function obtenerTodosPorId(int $id) : ?array {
        $result = null;
        $listaOrdenes = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT O.ID, O.FECHA, D.CANTIDAD, D.PRECIO, D.IMPORTE, O.IDCLIENTE, L.NOMBRE 
            FROM ORDENESCABECERA AS O 
            JOIN ORDENESDETALLE AS D
            ON O.ID = D.IDORDENCABECERA
            JOIN LIBROS AS L
            ON D.IDLIBRO = L.ID
            WHERE O.IDCLIENTE = :id;'
        );
        $statement->bindValue(':id', $id);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $ordenUsuario = new OrdenUsuario();
            $ordenUsuario->id = (int) $result[$key]["ID"];
            $ordenUsuario->fecha = $result[$key]["FECHA"];
            $ordenUsuario->cantidad = (int) $result[$key]["CANTIDAD"];
            $ordenUsuario->precio = (float) $result[$key]["PRECIO"];
            $ordenUsuario->importe = (float) $result[$key]["IMPORTE"];
            $ordenUsuario->idCliente = (int) $result[$key]["IDCLIENTE"];
            $ordenUsuario->nombre = $result[$key]["NOMBRE"];

            $listaOrdenes[] = $ordenUsuario;
        }

        return $listaOrdenes;
    }

    /**
     * @param int $id
     */
    function eliminar(int $id) : void {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare('DELETE FROM ORDENESCABECERA WHERE ID = :id;');

        $statement->bindValue(':id', $id);

        $statement->execute();
        $this->cerrarConexion();
    }
}