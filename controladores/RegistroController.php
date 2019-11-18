<?php
declare(strict_types = 1);

require_once '../modelos/UsuarioModelo.php';
require_once '../modelos/ClienteModelo.php';

session_start();

if(!isset($_POST['nombre'])) {
	echo "El nombre es requerido";
} else if (!isset($_POST['apellidos'])) {
	echo "Los apellidos son requeridos";
} else if (!isset($_POST['correoElectronico'])) {
	echo "El correo electrónico es requerido";
} else if (!isset($_POST['usuario'])) {
	echo "EL usuario es requerido";
} elseif (!isset($_POST['password'])) {
	echo "El password es requerido";
} else {
	$usuarioModelo = new UsuarioModelo();
}