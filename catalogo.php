<?php 
	declare(strict_types = 1);
	require_once 'template/header.php'; 
	require_once 'template/menu.php'; 

	//current URL of the Page. cart_update.php redirects back to this URL
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<div class="container">
	<div class="row">
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Carrito de compras</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				
      				<div class="modal-body">
    					<?php
							if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0){
								echo '<form method="post" action="agregarCarrito.php">';
								echo '<table width="100%"  cellpadding="6" cellspacing="0">';
								echo '<tbody>';
								$total =0;
								$b = 0;

								foreach ($_SESSION["cart_products"] as $cart_itm) {
									$product_name = $cart_itm["product_name"];
									$product_qty = $cart_itm["cantidad"];
									$product_price = $cart_itm["product_price"];
									$product_code = $cart_itm["idLibro"];

									echo '<td>Cant. <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
									echo '<td>'.$product_name.'</td>';
									echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
									echo '</tr>';
									$subtotal = ($product_price * $product_qty);
									$total = ($total + $subtotal);
								}

								echo '<td colspan="4">';
								echo '<button style="margin-right: 5px;" class="btn btn-info" type="submit">Actualizar</button><a href="pagar.php" class="btn btn-info">Pagar</a>';
								echo '</td>';
								echo '</tbody>';
								echo '</table>';
								echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
								echo '</form>';
							}
						?>
      				</div>
    			</div>
  			</div>
		</div>

		<?php 
			require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/LibroModelo.php';

			$libroModelo = new LibroModelo();
			$libros = $libroModelo->obtenerTodos();

			foreach ($libros as $libro) :
		?>
			
			<form method="post" action="agregarCarrito.php">
				<div class="col-sm">
					<div class="card text-center" style="width: 15rem; margin-top: 70px;">
						<img style="height: 250px; width: 100%; background-color: #EFEFEF;" 
							src="assets/libros/<?php echo $libro->getImagen(); ?>"
						>
						<div class="card-body">
							<h5 class="card-title"><?php echo utf8_encode($libro->getNombre()); ?></h5>
							<?php if(isset($_SESSION['idUsuario'])) : ?>
								<label>
									<span>Cantidad</span>
									<input type="text" size="2" maxlength="2" name="cantidad" value="1" />
								</label>

								<input type="hidden" name="idLibro" value="<?php echo $libro->getId(); ?>" />
								<input type="hidden" name="type" value="agregarCarrito" />
								<input type="hidden" name="return_url" value="<?php echo $current_url; ?>" />
								<div align="center">
									<button type="submit" class="btn btn-info">Agregar</button>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</form>
		<?php endforeach; ?>
	</div>
</div>

<?php require_once 'template/footer.php'; ?>