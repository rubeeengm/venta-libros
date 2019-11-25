<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/UsuarioModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/ClienteModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Usuario.php';

$usuarioModelo = new UsuarioModelo();
$usuario = new Usuario();
$usuario->setUsuario($_POST['usuario']);
$usuario->setContrasenia($_POST['password']);
$usuario->setId((int) $_POST['idUsuario']);

$idUsuario = $usuarioModelo->actualizar($usuario);

$cliente = new Cliente();
$cliente->setNombre($_POST['nombre']);
$cliente->setApellido($_POST['apellidos']);
$cliente->setCorreoelectronico($_POST['correoElectronico']);
$cliente->setId((int) $_POST['idCliente']);

$clienteModelo = new ClienteModelo();
$idCliente = $clienteModelo->actualizar($cliente);

header("Location: ../panelAdministrador.php");