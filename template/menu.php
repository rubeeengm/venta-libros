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
	    				echo '<a class="nav-link" href="controladores/cerrarSesion.php" title="">Cerrar Sesión</a>';
	    			} else {
	    				echo '<a class="nav-link" href="login.php" title="">Iniciar Sesión</a>';
	    			}
	    		?>
	    	</div>
	    </div>
  	</div>
</nav>