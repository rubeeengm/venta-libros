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

			<table id="listadoClientes" class="table table-striped table-responseive">
				<thead>
					<tr>
					  	<th scope="col">#</th>
					  	<th scope="col">Nombre</th>
					  	<th scope="col">Autor</th>
					  	<th scope="col">Precio</th>
					  	<th scope="col">Existencia</th>
					  	<th scope="col">idCategoria</th>
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
					      		<?php echo utf8_encode($libro->getNombre()); ?>
				      		</td>

					      	<td>
					      		<?php echo utf8_encode($libro->getAutor()); ?>
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
					      		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Modificar</button>
					      	</td>
	    				</tr>
	    			<?php endforeach; ?>
  				</tbody>
			</table>
		</div>
	</div>
</div>

<?php require_once 'template/footer.php'; ?>