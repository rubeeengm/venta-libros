<?php

require_once 'entidades/Categoria.php';
require_once 'modelos/CategoriaModelo.php';

$categoria = new Categoria();
$categoria->setNombre("Geografia");

$categoriaModelo = new CategoriaModelo();
$id = $categoriaModelo->insertar($categoria);

echo $id;