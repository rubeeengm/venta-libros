<?php
declare(strict_types = 1);

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/LibroModelo.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/OrdenCabecera.php';

#crear cabecera
$ordenCabecera = new OrdenCabecera();
$ordenCabecera->setFecha(date("Y-m-d H:i:s"));

foreach ($_SESSION['cart_products'] as $key) {
    
}

var_dump($_SESSION['cart_products']);


if(isset($_POST["type"]) && $_POST["type"] == 'pagar') { 
    foreach ($_SESSION["cart_products"] as $key => $value) {
        echo $_SESSION["cart_products"][$key];
    }
}*/

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
#var_dump($_SESSION["cart_products"]);
header('Location:'.$return_url);

?>