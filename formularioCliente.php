<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/template/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/ClienteModelo.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/venta-libros/modelos/UsuarioModelo.php'; ?>

<?php 
	$clienteModelo = new ClienteModelo(); 
	$cliente = $clienteModelo->obtenerPorId((int) $_GET['id']);
	$usuarioModelo = new UsuarioModelo();
	$usuario = $usuarioModelo->obtenerPorid((int) $cliente->getIdUsuario());
?>

<div class="container mt-3">
	<div class="row justify-content-center">
		<div class="col col-md-6">
			<form method="post" action="controladores/ActualizarCliente.php">
				<div class="form-group text-center">
                    <a class="navbar-brand" href="panelAdministrador.php">
                        <img src="assets/img/book-logo.png" alt="" style="height: 7vh; width: 7vh;">
                    </a>

                    <h2>Actualizar Cliente</h2>
                </div>

				<div class="form-group">
					<label> Nombre </label>
					<input type="text" class="form-control" 
						required
						minlength=3
						maxlength=15
						id="nombre"
						name="nombre"
						placeholder="Escriba su nombre" 
						value="<?php echo $cliente->getNombre(); ?>"
					>
				</div>

				<div class="form-group">
					<label> Apellidos </label>
					<input type="text" class="form-control" 
						required
						minlength=3
						maxlength=15
						id="apellidos"
						name="apellidos"
						placeholder="Escriba sus apellidos"
						value="<?php echo $cliente->getApellido(); ?>"
					>
				</div>

				<div class="form-group">
					<label> Correo Electrónico </label>
					<input type="email" class="form-control"
						required
						minlength=3
						maxlength=15
						id="correoElectronico"
						name="correoElectronico"
						placeholder="Escriba su correo electrónico"
						value="<?php echo $cliente->getCorreoelectronico(); ?>"
					>					
				</div>

				<div class="form-group">
					<label> Usuario </label>
					<input type="text" class="form-control"
						required
						minlength=5
						maxlength=15
						id="usuario"
						name="usuario"
						placeholder="Escriba su usuario"
						value="<?php echo $usuario->getUsuario(); ?>"
					>
				</div>

				<div class="form-group">
					<label> Contraseña </label>
					<input type="password" class="form-control" 
						required
						minlength=5
						maxlength=15
						id="password"
						name="password"
						placeholder="Escriba su Contraseña"
						value="<?php echo $usuario->getContrasenia(); ?>"
					>
				</div>

				<div class="form-group">
					<label for="">Rol</label>
					<select name="rol" class="form-control">
						<option value="1" <?php if($usuario->getRol()) echo "selected"; ?>>Administrador</option>
						<option value="0"<?php if($usuario->getRol() == 0) echo "selected"; ?>>Cliente</option>
					</select>
				</div>

				<input type="submit" class="btn btn-info" 
					id="btnRegistro" 
					value="Actualizar"
				>

				<?php  echo '<a href="panelAdministrador.php" class="btn btn-danger">Cancelar</a>'; ?>

				<input type="hidden" name="idUsuario" value="<?php echo $usuario->getId(); ?>" />
				<input type="hidden" name="idCliente" value="<?php echo $cliente->getId(); ?>" />
			</form>
		</div>
	</div>
</div>

<?php #require_once 'template/footer.php'; ?>