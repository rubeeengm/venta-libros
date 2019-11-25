<?php require_once 'template/menu.php'; ?>

<?php
	/*if(isset($_SESSION['rol'])) {
		if ($_SESSION['rol'] == 1) {
			header("Location: panelAdministrador.php");
		}
	}*/
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  	</ol>
	  
	<div class="carousel-inner">
    	<div class="carousel-item active">
      		<img class="d-block w-100 banner" src="assets/img/book1.jpg" alt="First slide">
		</div>
		
		<div class="carousel-item">
      		<img class="d-block w-100 banner" src="assets/img/book2.jpg" alt="Second slide">
		</div>
		
		<div class="carousel-item">
      		<img class="d-block w-100 banner" src="assets/img/book3.jpg" alt="Third slide">
		</div>
	</div>
	  
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div class="container" style="margin-top: 15px;">
	<div class="col">
		<p>
		Bienvenido a esta, tu biblioteca virtual. Encontrarás libros fascinantes de autores reconocidos y universales en una amplia gama de géneros literarios, que van desde la literatura clásica, narrativa, lírica, dramática y griega hasta manuales de técnica, ingeniería, informática, medicina y ciencias naturales. 58.000 libros en 126 categorías directamente en tu teléfono móvil​, tablet y/o computadora.
		</p>
	</div>
</div>