<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/CategoriaModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Categoria.php';

$categoriaModelo = new CategoriaModelo();
$categoria = new Categoria();
$categoria->setNombre($_POST['nombre']);
$categoria->setId((int) $_POST['idCategoria']);
$categoriaModelo->actualizar($categoria);

header("Location: ../categoria.php");