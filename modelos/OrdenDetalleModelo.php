<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/OrdenDetalle.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/Modelo.php';

class OrdenDetalleModelo extends Modelo {
    /**
     * @param OrdenDetalle $ordenDetalle
     * @return int
     */
    function insertar(OrdenDetalle $ordenDetalle) : int {
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'INSERT INTO ORDENESDETALLE (CANTIDAD, PRECIO, IMPORTE, IDORDENCABECERA, IDLIBRO) 
            VALUES (:cantidad, :precio, :importe, :idOrdenCabecera, :idLibro);'
        );

        $statement->bindValue(':cantidad', $ordenDetalle->getCantidad());
        $statement->bindValue(':precio', $ordenDetalle->getPrecio());
        $statement->bindValue(':importe', $ordenDetalle->getImporte());
        $statement->bindValue(':idOrdenCabecera', $ordenDetalle->getIdOrdenCabecera());
        $statement->bindValue(':idLibro', $ordenDetalle->getIdLibro());

        $statement->execute();

        $id = (int) $conexion->lastInsertId();

        $this->cerrarConexion();

        return $id;
    }

    /**
     * @param int $idOrdenCabecera
     * @return array|null
     */
    function obtenerTodos(int $idOrdenCabecera) : ?array {
        $result = null;
        $listaOrdenesDetalle = null;
        $conexion = $this->obtenerConexion();
        $statement = $conexion->prepare(
            'SELECT O.ID, O.CANTIDAD, O.PRECIO, O.IMPORTE
            , O.IDORDENCABECERA, O.IDLIBRO 
            FROM ORDENESDETALLE AS O 
            WHERE IDORDENCABECERA = :id;'
        );

        $statement->bindValue(':id', $idOrdenCabecera);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->cerrarConexion();

        foreach ($result as $key => $value) {
            $ordenDetalle = new OrdenDetalle();
            $ordenDetalle->setId((int) $result[$key]["ID"]);
            $ordenDetalle->setCantidad((int) $result[$key]["CANTIDAD"]);
            $ordenDetalle->setPrecio((float) $result[$key]["PRECIO"]);
            $ordenDetalle->setImporte((float) $result[$key]["IMPORTE"]);
            $ordenDetalle->setIdOrdenCabecera((int) $result[$key]["IDORDENCABECERA"]);
            $ordenDetalle->setIdLibro((int) $result[$key]["IDLIBRO"]);

            $listaOrdenesDetalle[] = $ordenDetalle;
        }

        return $listaOrdenesDetalle;
    }
}