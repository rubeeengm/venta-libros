<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="index.php">
		<img src="assets/img/book-logo.png" alt="" style="height: 50px; width: 50px;">
	</a>

  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
        		<a class="nav-link" href="index.php">
        			Home <span class="sr-only">(current)</span>
        		</a>
		  	</li>
			
			<li class="nav-item">
	            <a class="nav-link" href="catalogo.php">
	              Catalago
	            </a>
			</li>

			<?php
				if(isset($_SESSION['idUsuario'])) {
					echo '<li class="nav-item">
					<a class="nav-link" href="ordenesUsuario.php">
					  Mis Ordenes
					</a>
				</li>';
				}
			?>
			  
      		<li class="nav-item">
        		<a class="nav-link" href="politicaPrivacidad.php">
        			Politica de Privacidad
        		</a>
			</li>
			
			<?php if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0) : ?>
				<li class="nav-item">
					<a class="nav-link" href="#exampleModal" data-toggle="modal" data-target="#exampleModal">
						<img src="assets/img/cart.jpeg" alt="" style="width: 53px; height: 34px">
					</a>
				</li>
			<?php endif; ?>
	  	</ul>

	    <div class="form-inline my-2 my-lg-0">
	    	<div class="nav-item">
				<?php 
	    			if(isset($_SESSION['idUsuario'])) {
						echo '<div><center><span>'.$_SESSION['usuario'].'</span><span> &nbsp; <img src="assets/img/profile.png" height="15px" width="15px"></span></center></div>';
	    				echo '<a class="nav-link" href="controladores/cerrarSesion.php" title="">Cerrar Sesión</a>';
	    			} else {
	    				echo '<a class="nav-link" href="login.php" title="">Iniciar Sesión</a>';
	    			}
	    		?>
	    	</div>
	    </div>
  	</div>
</nav>

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

					$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
					
					if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0){
						echo '<form method="post" action="agregarCarrito.php">';
						echo '<table width="100%"  cellpadding="8" cellspacing="0">';
						echo '<tbody>';

						foreach ($_SESSION["cart_products"] as $cart_itm) {
							$product_name = $cart_itm["product_name"];
							$product_qty = $cart_itm["cantidad"];
							$product_price = $cart_itm["product_price"];
							$product_code = $cart_itm["idLibro"];

							echo '<td>Cant. <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
							echo '<td>'.$product_name.'</td>';
							$total = ($product_price * $product_qty);
							echo '<td>$'.$total.'&nbsp;</td>';
							echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
							echo '</tr>';

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