<?php require_once 'template/header.php'; ?>

<div class="container mt-3">
	<div class="row justify-content-center">
		<div class="col col-md-6">
			<form method="post" action="controladores/RegistroController.php">
				<div class="form-group text-center">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/book-logo.png" alt="" style="height: 7vh; width: 7vh;">
                    </a>

                    <h2>Registro</h2>
                </div>

				<div class="form-group">
					<label> Nombre </label>
					<input type="text" class="form-control" 
						required
						id="nombre"
						name="nombre"
						placeholder="Escriba su nombre" 
						value="<?php if(isset($_GET['nombre'])){ echo $_GET['nombre']; }?>"
					>
				</div>

				<div class="form-group">
					<label> Apellidos </label>
					<input type="text" class="form-control" 
						required
						id="apellidos"
						name="apellidos"
						placeholder="Escriba sus apellidos"
						value="<?php if(isset($_GET['apellidos'])){ echo $_GET['apellidos']; }?>"
					>
				</div>

				<div class="form-group">
					<label> Correo Electrónico </label>
					<input type="email" class="form-control"
						required
						id="correoElectronico"
						name="correoElectronico"
						placeholder="Escriba su correo electrónico"
						value="<?php if(isset($_GET['correoElectronico'])){ echo $_GET['correoElectronico']; }?>"
					>					
				</div>

				<div class="form-group">
					<label> Usuario </label>
					<input type="text" class="form-control"
						required
						id="usuario"
						name="usuario"
						placeholder="Escriba su usuario"
						value="<?php if(isset($_GET['usuario'])){ echo $_GET['usuario']; }?>"
					>
					<div class="" style="margin-top: 10px;">
					<?php
                    if(isset($_SESSION['error'])) {
                        if(isset($_SESSION['error']) != null) {
                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                            $_SESSION['error'] = null;
                        }
                    }
                	?>
					</div>
				</div>

				<div class="form-group">
					<label> Contraseña </label>
					<input type="password" class="form-control" 
						required
						id="password"
						name="password"
						placeholder="Escriba su Contraseña"
					>
				</div>

				<div class="form-group">
					<label for="">Rol</label>
					<select name="rol" class="form-control">
						<option value="1">Administrador</option>
						<option value="0">Cliente</option>
					</select>
				</div>

				<input type="submit" class="btn btn-info" 
					id="btnRegistro" 
					value="Crear"
				>

				<?php  echo '<a href="panelAdministrador.php" class="btn btn-danger">Cancelar</a>'; ?>
			</form>
		</div>
	</div>
</div>

<?php #require_once 'template/footer.php'; ?>