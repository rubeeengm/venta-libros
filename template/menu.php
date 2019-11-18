<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">
		<img src="assets/img/book-logo.png" alt="" style="height: 5vh; width: 5vh;">
	</a>

  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
        		<a class="nav-link" href="#">
        			Home <span class="sr-only">(current)</span>
        		</a>
		  	</li>
			  
			<li class="nav-item">
	            <a class="nav-link" href="#">
	              Catalago
	            </a>
			</li>
			  
      		<li class="nav-item">
        		<a class="nav-link" href="#">
        			Contacto
        		</a>
			</li>
	  	</ul>

	    <div class="form-inline my-2 my-lg-0">
	    	<div class="nav-item">
	    		<?php 
	    			if(isset($_SESSION['idUsuario'])) {
	    				echo '<a class="nav-link" href="cerrarSesion.php" title="">Cerrar Sesión</a>';
	    			} else {
	    				echo '<a class="nav-link" href="login.php" title="">Iniciar Sesión</a>';
	    			}
	    		?>
	    	</div>
	    </div>
  	</div>
</nav>