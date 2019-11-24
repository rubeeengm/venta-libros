<?php
declare(strict_types = 1);

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/LibroModelo.php';

//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='agregarCarrito' && $_POST["cantidad"]>0)
{
	foreach($_POST as $key => $value){ //add all post vars to new_product array
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
	//remove unecessary vars
	unset($new_product['type']);
	unset($new_product['return_url']); 
	
	$libroModelo = new LibroModelo();
	$libro = $libroModelo->obtenerPorId((int) $new_product['idLibro']);
	
	//fetch product name, price from db and add to new_product array
    $new_product["product_name"] = $libro->getNombre(); 
    $new_product["product_price"] = $libro->getPrecio();
    
    if(isset($_SESSION["cart_products"])){  //if session var already exist
        if(isset($_SESSION["cart_products"][$new_product['idLibro']])) //check item exist in products array
        {
            unset($_SESSION["cart_products"][$new_product['idLibro']]); //unset old array item
        }           
    }
    $_SESSION["cart_products"][$new_product['idLibro']] = $new_product; //update or create product session with new item
}


//update or remove items 
if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
{
	//update item quantity in product session
	if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
		foreach($_POST["product_qty"] as $key => $value){
			if(is_numeric($value)){
				$_SESSION["cart_products"][$key]["cantidad"] = $value;
			}
		}
	}
	//remove an item from product session
	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
		foreach($_POST["remove_code"] as $key){
			unset($_SESSION["cart_products"][$key]);
		}	
	}
}

//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
#var_dump($_SESSION["cart_products"]);
header('Location:'.$return_url);

?>