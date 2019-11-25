<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/ClienteModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/UsuarioModelo.php';

$clienteModelo = new ClienteModelo();
$cliente = $clienteModelo->obtenerPorId((int) $_GET['id']);
$clienteModelo->eliminar((int) $_GET['id']);

$usuarioModelo = new UsuarioModelo();
$usuarioModelo->eliminar($cliente->getIdUsuario());

header("Location: ../index.php");