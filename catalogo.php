<?php 
	require_once 'template/header.php'; 
	require_once 'template/menu.php'; 
?>

<div class="container">
	<div class="row">
		<?php for ($i=0; $i < 6 ; $i++): ?>
		<div class="col-sm">
			<div class="card text-center" style="width: 18rem; margin-top: 70px;">
				<img style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" src="https://firebasestorage.googleapis.com/v0/b/laradex-2bcb4.appspot.com/o/squirtle.png?alt=media&token=84571b1e-b131-4602-816d-00c3676827d5" alt="" class="card-img-top rounded-circle mx-auto d-block">
				<div class="card-body">
					<h5 class="card-title">Libro</h5>
					
					<p class="card-text">
						Some quick example text to build on the card title and make up the bulk of the card's content
					</p>
					
					<a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver más...</a>
				</div>
			</div>
		</div>
	<?php endfor; ?>
	</div>
</div>

<?require_once 'template/footer.php';?>
