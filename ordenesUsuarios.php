<?php 
    declare(strict_types = 1);
    require_once 'template/header.php'; 
    require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/OrdenCabeceraModelo.php';
    $ordenCabeceraModelo = new OrdenCabeceraModelo();
    $ordenes = $ordenCabeceraModelo->obtenerTodos();
    

	#carga en el menu en la página principal del administrador
	require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/template/menuAdministrador.php'; 
?>

<div class="container">
	<div class="row">
		<div class="col" style="margin-top: 50px;">
			<h1>Ordenes</h1>

			<table id="listadoClientes" class="table table-striped table-responseive">
				<thead>
					<tr>
					  	<th scope="col">#</th>
						<th scope="col">Usuario</th>
						<th scope="col">Nombre</th>
						<th scope="col">Cantidad</th>
					  	<th scope="col">Precio</th>
					  	<th scope="col">Importe</th>
					  	<th scope="col">Fecha</th>
					</tr>
				</thead>
  				
  				<tbody>
  					<?php if($ordenes != null) foreach ($ordenes as $orden): ?>
	    				<tr>
	      					<th scope="row">
	      						<?php echo $orden->id; ?>
	      					</th>

							<td>
								<?php echo utf8_encode($orden->usuario); ?>
				      		</td>

					      	<td>
					      		<?php echo utf8_encode($orden->nombre); ?>
				      		</td>

					      	<td>
					      		<?php echo $orden->cantidad; ?>
					      	</td>

					      	<td>
					      		$<?php echo $orden->precio; ?>
					      	</td>

					      	<td>
					      		$<?php echo $orden->importe; ?>
					      	</td>

							<td>
					      		$<?php echo $orden->fecha; ?>
					      	</td>
	    				</tr>
	    			<?php endforeach; ?>
  				</tbody>
			</table>
		</div>
	</div>
</div>

<?php require_once 'template/footer.php'; ?>