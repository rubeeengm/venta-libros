<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/UsuarioModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/ClienteModelo.php';

session_start();

if(isset($_POST['loginUsuario'])) {
	if(isset($_POST['loginPassword'])) {
		$usuarioModelo = new UsuarioModelo();
		$clienteModelo = new ClienteModelo();

		$idUsuario = (int) $usuarioModelo->login(
			$_POST['loginUsuario']
			, $_POST['loginPassword']
		);

		if ($idUsuario > 0) {
			//guardamos el id del usuario en la sesion
			$_SESSION['idUsuario'] = $idUsuario;

			$usuario = $usuarioModelo->obtenerPorid($idUsuario);
			//guardamos el rol en la sesión
			$_SESSION['rol'] = $usuario->getRol();
			$_SESSION['usuario'] = $usuario->getUsuario();
			
			if($usuario->getRol()) {
				header("Location: ../panelAdministrador.php");
			} else {
				//guadamos el cliente en la sesión
				$cliente = $clienteModelo->obtenerPorIdUsuario($idUsuario);
				$_SESSION['clienteId'] = $cliente->getId();
				header("Location: ../index.php");
			}
		} else {
			header("Location: ../login.php");
			$_SESSION['error'] = "El usuario o contraseña son incorrectos";
		}
	} else {
		echo "El password es requerido";
	}
} else {
	echo "El usuario es requerido";
}