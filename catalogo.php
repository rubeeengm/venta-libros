<?php
	declare(strict_types = 1);
	require_once 'template/header.php';
	require_once 'template/menu.php';

	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
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
				<div class="card text-center" style="width: 15rem; margin-top: 70px;">
					<img style="height: 250px; width: 100%; background-color: #EFEFEF;"
						src="assets/libros/<?php echo $libro->getImagen(); ?>"
					>
					<div class="card-body" style="width: 241px; height: 238px;">
						<h5 class="card-title"><?php echo $libro->getNombre(); ?></h5>
						<h3>$<?php echo $libro->getPrecio(); ?></h3>
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