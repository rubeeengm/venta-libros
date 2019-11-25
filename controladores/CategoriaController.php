<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/CategoriaModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Categoria.php';

session_start();

if(!isset($_POST['nombre'])) {
	echo "El nombre es requerido";
} else {
	$categoriaModelo = new CategoriaModelo();
    $categoria = new Categoria();
    $categoria->setNombre($_POST['nombre']);

    $categoriaModelo->insertar($categoria);;

    header("Location: ../categoria.php");
	
}