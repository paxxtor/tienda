<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">
	<title>Ejemplo de Codeigniter</title>
</head>
<body>
	<div class="container mt-5 mb-5">
		<form action="<?php echo base_url();?>login/auth" method="POST">
			<h2>Accede a tu cuenta</h2>
			<div class="form-group mb-5">
				<label class="col-sm-2 col-form-label">Usuario:</label>
				<input type="text" name="usuario" class="form-control-plaintext" required style="border:1px solid white; border-radius:5px;">
			</div>
			 <div class="form-group mb-5">
				<label for="staticEmail" class="col-sm-2 col-form-label">Clave:</label>
				<input type="password" name="password" autocomplete="new-password" class="form-control-plaintext" required style="border:1px solid white; border-radius:5px;">
			</div>
			<button type="submit" class="btn btn-success">Ingresar</button>
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
