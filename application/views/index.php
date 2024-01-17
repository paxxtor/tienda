<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include 'estilos.php';?>
		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php echo $title;?></title>
	</head>
	<body>
		<div class="login-color-bg sticky-top">
			<nav class="navbar container navbar-expand-lg" data-bs-theme="dark">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?= base_url();?>">Tienda</a>
					<button
						class="navbar-toggler"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#navbarColor02"
						aria-controls="navbarColor02"
						aria-expanded="false"
						aria-label="Toggle navigation"
					>
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarColor02">
						<ul class="navbar-nav me-auto">
							<li class="nav-item">
								<a class="nav-link active" href="<?= base_url(); ?>"
									>Inicio
									<span class="visually-hidden">(current)</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url(); ?>productos"
									>Productos</a
								>
							</li>
							<?php  if ($this->session->userdata('nivel') ==1) :?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url();?>admin/historial">Historial</a>
							</li>
							<?php elseif($this->session->userdata('nivel') ==2) :?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url();?>admin/producto">Lista Productos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url();?>admin/usuarios">Administradores</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url();?>admin/proveedores">Proveedores</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url();?>admin/clientes">Clientes</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url();?>admin/historial">Historial</a>
								</li>
								<?php  endif;?>
						</ul>
						<form class="d-flex">
							<a class="btn btn-warning mx-1" href="<?php echo base_url(); ?>login">
								<i class="bi bi-person-circle"></i> Mi cuenta</a
							>
							<a class="btn btn-success mx-1" href="<?php echo base_url(); ?>carrito">
								<i class="bi bi-cart"></i> Carrito</a
							>
              <?php if($this->session->userdata('nivel')=='1' || $this->session->userdata('nivel')=='2'):?>
							<a class="btn btn-danger mx-1" href="<?php echo base_url();?>cerrar">
								<i class="bi bi-x-circle"></i> Cerrar Sesión</a
							>
              <?php endif; ?>
						</form>
					</div>
				</div>
			</nav>
		</div>
		<?php include $page_name.'.php';?>

		<script>
			let base_url = "<?php echo base_url(); ?>";
      let nombreadmin = "<?php echo $this->session->userdata('nombre'); ?>";
      let nivel = "<?php echo $this->session->userdata('nivel'); ?>";
      sessionStorage.setItem("verificacion", "<?php echo $this->session->flashdata('verificacion'); ?>");
		</script>
		<?php include 'modal.php'; ?>
		<?php include 'scripts.php';?>

	</body> 
</html>
