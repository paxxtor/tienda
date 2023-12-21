<!DOCTYPE html>
<html lang="es">
<head>
	<?php include 'estilos.php';?>
	<title><?php echo $title;?></title>
</head>
<body>
	<div>
		<a href="<?php echo base_url() ;?>admin">Inicio</a>
	</div>
	<div class="container mt-5 mb-5">
		<?php include $page_name.'.php';?>
	</div>
	<?php include 'scripts.php';?>
</body>
</html>
