<?php
declare(strict_types = 1);

require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/LibroModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/UsuarioModelo.php';

$libroModelo = new LibroModelo();
$existe = $libroModelo->verificarExistenciaOrden((int) $_GET['id']);

if ($existe) {
    session_start();
    $_SESSION["mensajeLibros"] = "El libro tiene ordenes asociadas";
    
    header("Location: ../libros.php");
} else {
    $libroModelo->eliminar((int) $_GET['id']);
}

header("Location: ../libros.php");