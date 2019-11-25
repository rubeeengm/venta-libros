<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/template/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/CategoriaModelo.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/entidades/Categoria.php'; ?>

<?php 
	$categoriaModelo = new CategoriaModelo(); 
    $categoria = $categoriaModelo->obtenerPorId((int) $_GET['id']);
?>

<div class="container mt-3">
	<div class="row justify-content-center">
		<div class="col col-md-6">
			<form method="post" action="controladores/ActualizarCategoria.php">
				<div class="form-group text-center">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/book-logo.png" alt="" style="height: 7vh; width: 7vh;">
                    </a>

                    <h2>Actualizar Categoria</h2>
                </div>

				<div class="form-group">
					<label> Nombre </label>
					<input type="text" class="form-control" 
						required
						id="nombre"
						name="nombre"
						placeholder="Escriba la categoria" 
						value="<?php echo $categoria->getNombre(); ?>"
					>
				</div>

				<input type="submit" class="btn btn-info" 
					id="btnRegistro" 
					value="Actualizar"
				>

				<?php  echo '<a href="categoria.php" class="btn btn-danger">Cancelar</a>'; ?>

				<input type="hidden" name="idCategoria" value="<?php echo $categoria->getId(); ?>" />
		</div>
	</div>
</div>

<?php #require_once 'template/footer.php'; ?>