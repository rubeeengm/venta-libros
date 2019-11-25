<?php 
	/*if(!isset($_SESSION['rol'])) {
		header("Location: index.php");
	}*/
?>

<?php require_once 'template/header.php'; ?>

<?php 
	require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/ClienteModelo.php';
	$clienteModelo = new ClienteModelo();
	#obtiene la lista de todos los clientes registrados
	$clientes = $clienteModelo->obtenerTodos();
?>

<?php 
	#carga en el menu en la página principal del administrador
	require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/template/menuAdministrador.php'; 
?>

<div class="container">
	<div class="row">
		<div class="col" style="margin-top: 50px;">
			<h1>Clientes</h1>

			<table id="listadoClientes" class="table table-striped table-responseive">
				<thead>
					<tr>
					  	<th scope="col">#</th>
					  	<th scope="col">Nombre</th>
					  	<th scope="col">Apellidos</th>
					  	<th scope="col">Correo Electrónico</th>
					  	<th scope="col">Usuario</th>
					  	<th scope="col">Estado</th>
					  	<th scope="col">Acción</th>
					</tr>
				</thead>
  				
  				<tbody>
  					<?php foreach ($clientes as $cliente): ?>
	    				<tr>
	      					<th scope="row">
	      						<?php echo $cliente->getId(); ?>
	      					</th>

					      	<td>
					      		<?php echo $cliente->getNombre(); ?>
				      		</td>

					      	<td>
					      		<?php echo $cliente->getApellido(); ?>
					      	</td>

					      	<td>
					      		<?php echo $cliente->getCorreoelectronico(); ?>
					      	</td>

					      	<td>
					      		<?php echo $cliente->getUsuario()->getUsuario(); ?>
					      	</td>

					      	<td>
					      		<?php 
					      			$estado = $cliente->getUsuario()->getEstado(); 
					      			if($estado) {
					      				echo "Activo";
					      			} else {
					      				echo "Inactivo";
					      			}
				      			?>
					      	</td>

					      	<td>
								<?php echo '<a href="formularioCliente.php?id='.$cliente->getId().'" class="btn btn-info">Modificar</a>'; ?>
								<?php echo '<a href="controladores/EliminarCliente.php?id='.$cliente->getId().'" class="btn btn-danger">Eliminar</a>'; ?>
					      	</td>
	    				</tr>
	    			<?php endforeach; ?>
  				</tbody>
			</table>
			<?php echo '<a href="nuevoCliente.php" class="btn btn-info">Nuevo Cliente</a>'; ?>
		</div>
	</div>
</div>

<?php require_once 'template/footer.php'; ?>