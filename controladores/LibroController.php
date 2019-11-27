<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/LibroModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Libro.php';

$libroModelo = new LibroModelo();
$libro = new Libro();
$libro->setNombre($_POST['nombre']);
$libro->setAutor($_POST['autor']);
$libro->setPrecio((float) $_POST['precio']);
$libro->setIdCategoria((int) $_POST['categoria']);
$libro->setExistencia((int) $_POST['existencia']);
var_dump($libro);
$libroModelo->insertar($libro);

header("Location: ../libros.php");