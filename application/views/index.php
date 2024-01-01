<!DOCTYPE html>
<html lang="es">
<head>
	<?php include 'estilos.php';?>
	<title><?php echo $title;?></title>
</head>
<body>
	<div>
		<a style="font-size: 40px;" href="<?php echo base_url() ;?>admin"><i class="bi bi-house-door-fill"></i></a>
	</div>
	<div class="container">
		<?php include $page_name.'.php';?>
	</div>
	<?php include 'scripts.php';?>
</body>
</html>
