<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
	<link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
	<title>Iniciar Sesion</title>
</head>

<body>
	<div class="container mt-5 mb-5">
		<form action="<?php echo base_url(); ?>login/auth" method="POST">
			<h2>Iniciar sesion</h2>

			<?php if ($this->session->flashdata("Error") == "1"): ?>
				<div class="alert alert-warning">
					correo o contraseña incorrectos
				</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata("alerta") == "1"): ?>
				<div class="alert alert-success">
					cuenta verificada con exito.
				</div>
			<?php endif; ?>
			<?php if ($this->session->flashdata("alerta") == "3"): ?>
				<div class="alert alert-warning">
					Tiempo de espera excedido, por favor vuelva a ingrear sus datos.
				</div>
			<?php endif; ?>

			<div class="form-group mb-5">
				<label class="col-sm-2 col-form-label">Correo:</label>
				<input type="text" name="correo" class="form-control-plaintext" required
					style="border:1px solid white; border-radius:5px;">
			</div>
			<div class="form-group mb-5">
				<label for="staticEmail" class="col-sm-2 col-form-label">Clave:</label>
				<input type="password" name="password" autocomplete="new-password" class="form-control-plaintext"
					required style="border:1px solid white; border-radius:5px;">
			</div>
			<button type="submit" class="btn btn-primary">Ingresar</button>
			<a href="<?php echo base_url() ?>login/registrar" class="btn btn-success">Registrarse</a>
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>