<?php
declare(strict_types = 1);

require_once '../modelos/UsuarioModelo.php';
require_once '../modelos/ClienteModelo.php';
require_once '../entidades/Usuario.php';

session_start();

if(!isset($_POST['nombre'])) {
	echo "El nombre es requerido";
} else if (!isset($_POST['apellidos'])) {
	echo "Los apellidos son requeridos";
} else if (!isset($_POST['correoElectronico'])) {
	echo "El correo electrónico es requerido";
} else if (!isset($_POST['usuario'])) {
	echo "El usuario es requerido";
} elseif (!isset($_POST['password'])) {
	echo "El password es requerido";
} else {
	$usuarioModelo = new UsuarioModelo();
	$existe = $usuarioModelo->verificarExistenciaUsuario($_POST['usuario']);

	if($existe) {
		$_SESSION['error'] = "El usuario ya existe";
		header("Location: ../registro.php");
	} else {
		$usuario = new Usuario();
		$usuario->setUsuario($_POST['usuario']);
		$usuario->setContrasenia($_POST['password']);

		$idUsuario = $usuarioModelo->insertar($usuario);

		$cliente = new Cliente();
		$cliente->setNombre($_POST['nombre']);
		$cliente->setApellido($_POST['apellidos']);
		$cliente->setCorreoelectronico($_POST['correoElectronico']);
		$cliente->setIdUsuario($idUsuario);

		$clienteModelo = new ClienteModelo();
		$idCliente = $clienteModelo->insertar($cliente);
		$_SESSION['idCliente'] = $idCliente;
		$_SESSION['idUsuario'] = $idUsuario;

	 	header("Location: ../index.php");
	}
}