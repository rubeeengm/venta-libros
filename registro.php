<?php require_once 'template/header.php'; ?>

<div class="container mt-3">
	<div class="row justify-content-center">
		<div class="col col-md-6">
			<h1>Registro</h1>

			<form method="post" action="">
				<div class="form-group">
					<label> Nombre </label>
					<input type="text" class="form-control" 
						required
						id="nombre"
						placeholder="Escriba su nombre" 
					>
				</div>

				<div class="form-group">
					<label> Apellidos </label>
					<input type="text" class="form-control" 
						required
						id="apellidos"
						placeholder="Escriba sus apellidos"
					>
				</div>

				<div class="form-group">
					<label> Correo Electrónico </label>
					<input type="email" class="form-control"
						required
						id="correoElectronico"
						placeholder="Escriba su correo electrónico"
					>					
				</div>

				<div class="form-group">
					<label> Usuario </label>
					<input type="text" class="form-control" 
						required
						id="usuario"
						placeholder="Escriba su usuario"
					>
				</div>

				<div class="form-group">
					<label> Contraseña </label>
					<input type="password" class="form-control" 
						required
						id="password"
						placeholder="Escriba su Contraseña"
					>
				</div>
				
				<div class="form-group">
					<label>
						<input type="checkbox" checked="checked">
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

<?php require_once 'template/footer.php'; ?>