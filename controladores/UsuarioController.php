<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/UsuarioModelo.php';

session_start();

if(isset($_POST['loginUsuario'])) {
	if(isset($_POST['loginPassword'])) {
		$usuarioModelo = new UsuarioModelo();

		$idUsuario = $usuarioModelo->login(
			$_POST['loginUsuario']
			, $_POST['loginPassword']
		);

		if ($idUsuario > 0) {
			$_SESSION['idUsuario'] = $idUsuario;

			$usuario = $usuarioModelo->obtenerPorid($idUsuario);

			if($usuario->getRol()) {
				header("Location: ../panelAdministrador.php");
			} else {
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