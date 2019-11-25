<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/template/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/LibroModelo.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/CategoriaModelo.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Libro.php'; ?>

<?php 
	$libroModelo = new LibroModelo(); 
    $libro = $libroModelo->obtenerPorId((int) $_GET['id']);
?>

<div class="container mt-3">
	<div class="row justify-content-center">
		<div class="col col-md-6">
			<form method="post" action="controladores/ActualizarLibro.php">
				<div class="form-group text-center">
                    <a class="navbar-brand" href="libros.php">
                        <img src="assets/img/book-logo.png" alt="" style="height: 7vh; width: 7vh;">
                    </a>

                    <h2>Actualizar Libro</h2>
                </div>

				<div class="form-group">
					<label> Nombre </label>
					<input type="text" class="form-control" 
						required
						id="nombre"
						name="nombre"
						placeholder="Escribe el nombre" 
						value="<?php echo $libro->getNombre(); ?>"
					>
				</div>

				<div class="form-group">
					<label> Autor </label>
					<input type="text" class="form-control" 
						required
						id="autor"
						name="autor"
						placeholder="Escribe el nombre del autor" 
						value="<?php echo $libro->getAutor(); ?>"
					>
				</div>

				<div class="form-group">
					<label> Precio </label>
					<input type="text" class="form-control" 
						required
						id="precio"
						name="precio"
						placeholder="Escribe el precio" 
						value="<?php echo $libro->getPrecio(); ?>"
					>
				</div>

				<div class="form-group">
					<label> Categoria </label>
					<select name="categoria" class="form-control">
						<?php 
							$categoriaModelo = new CategoriaModelo();
							$categorias = $categoriaModelo->obtenerTodos();
							
							foreach ($categorias as $categoria) {
								echo '<option value="'.$categoria->getId().'">'.$categoria->getNombre().'</option>';
							}
						?>
					</select>					
				</div>

				<input type="submit" class="btn btn-info" 
					id="btnRegistro" 
					value="Actualizar"
				>

				<?php  echo '<a href="libros.php" class="btn btn-danger">Cancelar</a>'; ?>

				<input type="hidden" name="idLibro" value="<?php echo $libro->getId(); ?>" />
			</form>
		</div>
	</div>
</div>

<?php #require_once 'template/footer.php'; ?>