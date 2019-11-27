<?php 
	/*if(!isset($_SESSION['rol'])) {
		header("Location: index.php");
	}*/
?>

<?php require_once 'template/header.php'; ?>

<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/LibroModelo.php';
	$libroModelo = new LibroModelo();
	#obtiene la lista de todos los libros registrados
	$libros = $libroModelo->obtenerTodos();
?>

<?php 
	#carga en el menu en la página principal del administrador
	require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/template/menuAdministrador.php'; 
?>

<div class="container">
	<div class="row">
		<div class="col" style="margin-top: 50px;">
			<h1>Libros</h1>
			<?php 
				if(isset($_SESSION['mensajeLibros'])) {
					if(isset($_SESSION['mensajeLibros']) != null) {
						echo '<div class="alert alert-danger" role="alert">' . $_SESSION['mensajeLibros'] . '</div>';
						$_SESSION['mensajeLibros'] = null;
					}
				}
			?>
			<table id="listadoClientes" class="table table-striped table-responseive">
				<thead>
					<tr>
					  	<th scope="col">#</th>
					  	<th scope="col">Nombre</th>
					  	<th scope="col">Autor</th>
					  	<th scope="col">Precio</th>
						<th scope="col">Existencia</th>
					  	<th scope="col">Categoria</th>
					  	<th scope="col">Acción</th>
					</tr>
				</thead>
  				
  				<tbody>
  					<?php foreach ($libros as $libro): ?>
	    				<tr>
	      					<th scope="row">
	      						<?php echo $libro->getId(); ?>
	      					</th>

					      	<td>
					      		<?php echo $libro->getNombre(); ?>
				      		</td>

					      	<td>
					      		<?php echo $libro->getAutor(); ?>
					      	</td>

					      	<td>
					      		<?php echo $libro->getPrecio(); ?>
					      	</td>

							<td>
					      		<?php echo $libro->getExistencia(); ?>
					      	</td>

					      	<td>
					      		<?php echo $libro->getCategoria(); ?>
					      	</td>

					      	<td>
								<?php  echo '<a href="formularioLibro.php?id='.$libro->getId().'" class="btn btn-info">Modificar</a>'; ?>
								<?php echo '<a href="controladores/EliminarLibro.php?id='.$libro->getId().'" class="btn btn-danger">Eliminar</a>'; ?>
					      	</td>
	    				</tr>
	    			<?php endforeach; ?>
  				</tbody>
			</table>
			<?php echo '<a href="nuevoLibro.php" class="btn btn-info">Nuevo Libro</a>'; ?>
		</div>
	</div>
</div>

<?php require_once 'template/footer.php'; ?>