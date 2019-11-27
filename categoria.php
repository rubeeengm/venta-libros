<?php require_once 'template/header.php'; ?>

<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/CategoriaModelo.php';
	$categoriaModelo = new CategoriaModelo();
	#obtiene la lista de todos los libros registrados
	$categorias = $categoriaModelo->obtenerTodos();
?>

<?php 
	#carga en el menu en la página principal del administrador
	require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/template/menuAdministrador.php'; 
?>

<div class="container">
	<div class="row">
		<div class="col" style="margin-top: 50px;">
			<h1>Categorias</h1>

			<table id="listadoClientes" class="table table-striped table-responseive">
				<thead>
					<tr>
					  	<th scope="col">#</th>
					  	<th scope="col">Nombre</th>
					  	<th scope="col">Acción</th>
					</tr>
				</thead>
  				
  				<tbody>
  					<?php foreach ($categorias as $categoria): ?>
	    				<tr>
	      					<th scope="row">
	      						<?php echo $categoria->getId(); ?>
	      					</th>

					      	<td>
					      		<?php echo $categoria->getNombre(); ?>
				      		</td>

					      	<td>
							  <?php  echo '<a href="formularioCategoria.php?id='.$categoria->getId().'" class="btn btn-info">Modificar</a>'; ?>
					      	</td>
	    				</tr>
	    			<?php endforeach; ?>
  				</tbody>
			</table>
			<?php echo '<a href="nuevaCategoria.php" class="btn btn-info">Nueva Categoria</a>'; ?>
		</div>
	</div>
</div>

<?php require_once 'template/footer.php'; ?>