<div
	class="login-color-bg d-flex justify-content-center align-items-center vh-100"
>
	<div
		class="bg-white p-5 rounded-5 text-secondary-emphasis"
		style="width: 25rem"
	>
		<div class="d-flex justify-content-center">
			<img
				src="<?php echo base_url();?>public/assets/login-icon.svg"
				alt="login-icon"
				style="height: 7rem"
			/>
		</div>
		<div class="text-center fs-1 fw-bold">Iniciar Sesión</div>

		<?php if ($this->session->flashdata("Error") == "1"): ?>
				<div class="alert alert-warning">
					correo o contraseña incorrectos
				</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata("alerta") == "3"): ?>
				<div class="alert alert-warning">
					Tiempo de espera excedido, por favor vuelva a ingrear sus datos.
				</div>
			<?php endif; ?>

		<form action="" id="formulario" method="post">
			<div class="input-group mt-4">
				<div class="input-group-text login-color-bg">
					<img
						src="<?php echo base_url();?>public/assets/username-icon.svg"
						alt="username-icon"
						style="height: 1rem"
					/>
				</div>
				<input
					class="form-control bg-light"
					type="email"
					id="emailusuario"
					placeholder="Correo"
					name='correo'
					required
				/>
			</div>
			<div class="input-group mt-1">
				<div class="input-group-text login-color-bg">
					<img
						src="<?php echo base_url();?>public/assets/password-icon.svg"
						alt="password-icon"
						style="height: 1rem"
						/>
					</div>
					<input
					class="form-control bg-light"
					type="password"
					placeholder="Contraseña"
					id="claveusuario"
					name='clave'
					required
				/>
			</div>
			<button
				type="button"
				onclick="enviar();"
				class="btn login-color-bg text-white w-100 mt-4 fw-semibold shadow-sm">
				Iniciar Sesión
			</button>
		</form>
		<div class="d-flex gap-1 justify-content-center mt-1">
			<div>No tienes una cuenta?</div>
			<a
				href="#"
				id="btnregistrarse"
				class="text-decoration-none login-color-bg-tx fw-semibold"
				>Registrarse</a
			>
		</div>
		<div class="d-flex gap-1 justify-content-center mt-1">
			<div>Eres administrador?</div>
			<a
				href="#"
				id="btnadminlogin"
				class="text-decoration-none login-color-bg-tx fw-semibold"
				>Administrador</a
			>
		</div>
	</div>
</div>
