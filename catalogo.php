<?php 
	require_once 'template/header.php'; 
	require_once 'template/menu.php'; 
?>

<div class="container">
	<div class="row">
		<?php 
			require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/LibroModelo.php';

			$libroModelo = new LibroModelo();
			$libros = $libroModelo->obtenerTodos();

			foreach ($libros as $libro) :
		?>
			<form method="post" action="agregarCarrito.php">
				<div class="col-sm">
					<div class="card text-center" style="width: 10rem; margin-top: 70px;">
						<img style="height: 250px; width: 100%; background-color: #EFEFEF;" src="assets/libros/<?php echo $libro->getImagen(); ?>">
						<div class="card-body">
							<h5 class="card-title"><?php echo utf8_encode($libro->getNombre()); ?></h5>
						<?php if(isset($_SESSION['idUsuario'])) : ?>
							<label>
								<span>Cantidad</span>
								<input type="text" size="2" maxlength="2" name="cantidad" value="1" />
							</label>

							<input type="hidden" name="idLibro" value="idLibro" />
							<input type="hidden" name="type" value="agregarCarrito" />
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