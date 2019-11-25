<?php
declare(strict_types = 1);

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/LibroModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/OrdenCabeceraModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/OrdenDetalleModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/OrdenCabecera.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/OrdenDetalle.php';

#crear cabecera
$ordenCabecera = new OrdenCabecera();
$ordenCabecera->setIdCliente((int) $_SESSION['clienteId']);

#calculo de total
$total = 0;

foreach ($_SESSION['cart_products'] as $key => $value) {
	$total += $_SESSION['cart_products'][$key]["cantidad"] * $_SESSION['cart_products'][$key]["product_price"];
}

$ordenCabecera->setTotal($total);
$ordenCabecera->setIva($total * 0.16);

$ordenCabeceraMdodelo = new OrdenCabeceraModelo();
#almacenamos la cabecera de la orden
$idOrden = $ordenCabeceraMdodelo->insertar($ordenCabecera);

#almacenamos el detalle de la orden
$ordenDetalleModelo = new OrdenDetalleModelo();

foreach ($_SESSION["cart_products"] as $key => $value) {
	$ordenDetalle = new OrdenDetalle();
	$ordenDetalle->setIdOrdenCabecera($idOrden);
	$ordenDetalle->setIdLibro((int) $_SESSION['cart_products'][$key]['idLibro']);
	$ordenDetalle->setCantidad((int) $_SESSION['cart_products'][$key]["cantidad"]);
	$ordenDetalle->setPrecio((float) $_SESSION['cart_products'][$key]["product_price"]);
	$ordenDetalle->setImporte((float)
		$_SESSION['cart_products'][$key]["cantidad"] * $_SESSION['cart_products'][$key]["product_price"]
	);

	$ordenDetalleModelo->insertar($ordenDetalle);
}


unset($_SESSION['cart_products']);
//back to return url
$return_url = $_GET["url"];
header('Location:'.$return_url);