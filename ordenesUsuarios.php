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
					  	<th scope="col">Fecha</th>
					  	<th scope="col">Subtotal</th>
					  	<th scope="col">IVA</th>
					  	<th scope="col">Total</th>
					</tr>
				</thead>
  				
  				<tbody>
  					<?php foreach ($ordenes as $orden): ?>
	    				<tr>
	      					<th scope="row">
	      						<?php echo $orden->getId(); ?>
	      					</th>

							<td>
					      		<?php echo utf8_encode($orden->usuario); ?>
				      		</td>

					      	<td>
					      		<?php echo utf8_encode($orden->getFecha()); ?>
				      		</td>

					      	<td>
					      		$<?php echo $orden->getTotal() - $orden->getIva(); ?>
					      	</td>

					      	<td>
					      		$<?php echo $orden->getIva(); ?>
					      	</td>

					      	<td>
					      		$<?php echo $orden->getTotal(); ?>
					      	</td>
	    				</tr>
	    			<?php endforeach; ?>
  				</tbody>
			</table>
		</div>
	</div>
</div>

<?php require_once 'template/footer.php'; ?>