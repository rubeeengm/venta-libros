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
						minlength=3
						maxlength=15
						value="<?php if(isset($_GET['nombre'])){ echo $_GET['nombre']; }?>"
					>
				</div>

				<div class="form-group">
					<label> Apellidos </label>
					<input type="text" class="form-control" 
						required
						id="apellidos"
						name="apellidos"
						minlength=3
						maxlength=15
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
						maxlength=30
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
						minlength=5
						maxlength=15
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
						minlength=5
						maxlength=15
						placeholder="Escriba su Contraseña"
					>
				</div>
				
				<div class="form-group">
					<label>
						<input type="checkbox" required>
						<a href="#">
							Aceptar términos y condiciones
						</a>
					</label>
				</div>

				<input type="submit" class="btn btn-info" 
					id="btnRegistro" 
					value="Registrarse"
				>
			</form>
		</div>
	</div>
</div>

<?php #require_once 'template/footer.php'; ?>