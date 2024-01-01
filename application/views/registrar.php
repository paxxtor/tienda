<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
	<title>Registra</title>
</head>

<body>
	<div class="container mt-5 mb-5">
		<h2>Registrar</h2>

		<?php if ($this->session->flashdata("Error") != ""): ?>

			<div class="alert alert-warning">
				Correo electronico ya registrado
			</div>
		<?php endif; ?>
		<form action="<?php echo base_url(); ?>login/registrar/guardar" id="formulario" method="POST">

			<div class="form-group mb-5 d-flex justify-content-between ">
				<label class="mx-3">Nombre:</label>
				<input autocomplete="off" type="text" name="nombre"
					class="form-control-plaintext border border-primary w-75 " required
					style="border:1px solid white; border-radius:5px;">
			</div>
			<div class="form-group mb-5 d-flex justify-content-between ">
				<label class="mx-3">Apellido:</label>
				<input autocomplete="off" type="text" name="apellido"
					class="form-control-plaintext border border-primary  w-75 " required
					style="border:1px solid white; border-radius:5px;">
			</div>
			<div class="form-group mb-5  d-flex justify-content-between ">
				<label class="mx-3">Telefono:</label>
				<input autocomplete="off" type="number" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telefono"
       class="form-control-plaintext border border-primary w-75 " required
       style="border:1px solid white; border-radius:5px;">
			</div>
			<div class="form-group mb-5  d-flex justify-content-between ">
				<label class="mx-3">NIT:</label>
				<input autocomplete="off" type="number" name="nit"
					class="form-control-plaintext border border-primary  w-75 " required
					style="border:1px solid white; border-radius:5px;">
			</div>
			<div class="form-group mb-5  d-flex justify-content-between ">
				<label class="mx-3">Correo:</label>
				<input autocomplete="off" type="email" name="correo"
					class="form-control-plaintext border border-primary  w-75 " required
					style="border:1px solid white; border-radius:5px;">
			</div>
			<div class="form-group mb-5  d-flex justify-content-between ">
				<label class="mx-3">Contraseña:</label>
				<input autocomplete="off" type="password" name="clave"
					class="form-control-plaintext border border-primary  w-75 " required
					style="border:1px solid white; border-radius:5px;">
			</div>
			<div class="form-group mb-5  d-flex justify-content-between ">
				<label class="mx-3">Dirección:</label>
				<input autocomplete="off" type="text" name="direccion"
					class="form-control-plaintext border border-primary  w-75 " required
					style="border:1px solid white; border-radius:5px;">
			</div>
			<button type="submit" class="btn btn-success">Registrar</button>
			<a class="btn btn-primary" href="<?php echo base_url(); ?>login/">Iniciar Sesion</a>
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
