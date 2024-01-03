	<div
	class="login-color-bg d-flex justify-content-center align-items-center vh-100 altura"
>
	<div
		class="bg-white p-5 rounded-5 text-secondary-emphasis"
		style="width: 25rem"
	>
		<div class="d-flex justify-content-center">
			<img
				src="<?= base_url(); ?>public/assets/login-icon.svg"
				alt="login-icon"
				style="height: 7rem"
			/>
		</div>
		<div class="text-center fs-1 fw-bold">Registrarse</div>

		<?php if ($this->session->flashdata("Error") != ""): ?>
		<div class="alert alert-warning">
			Correo electronico ya registrado
		</div>
		<?php endif; ?>

		<form action="" id="formregistro" method="POST">
			<div class="input-group mt-4">
				<div class="input-group-text login-color-bg">
					<i style="font-size: 1.2rem" class="text-white bi bi-person-fill"></i>
				</div>
				<input
					class="form-control bg-light"
					type="text" name="nombre"
					placeholder="Nombre"
					required
				/>
			</div>
			<div class="input-group mt-1">
				<div class="input-group-text login-color-bg">
					<i style="font-size: 1.2rem" class="text-white bi bi-person-fill"></i>
				</div>
				<input
					class="form-control bg-light"
					type="text" name="apellido"
					placeholder="Apellido"
					required
				/>
			</div>
			<div class="input-group mt-1">
				<div class="input-group-text login-color-bg">
					<i
						style="font-size: 1.2rem"
						class="text-white bi bi-telephone-fill"
					></i>
				</div>
				<input
					class="form-control bg-light"
					type="number" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="telefono"
					placeholder="Telefono"
					required
				/>
			</div>
			<div class="input-group mt-1">
				<div class="input-group-text login-color-bg">
					<i style="font-size: 1.2rem" class="text-white bi bi-file-person"></i>
				</div>
				<input class="form-control bg-light" type="number" name="nit" placeholder="NIT" />
			</div>
			<div class="input-group mt-1">
				<div class="input-group-text login-color-bg">
					<i
						style="font-size: 1.2rem"
						class="text-white bi bi-geo-alt-fill"
					></i>
				</div>
				<input
					class="form-control bg-light"
					type="text" name="direccion"
					placeholder="Dirección"
					required
				/>
			</div>
			<div class="input-group mt-1">
				<div class="input-group-text login-color-bg">
					<i
						style="font-size: 1.2rem"
						class="text-white bi bi-envelope-at-fill"
					></i>
				</div>
				<input
					class="form-control bg-light"
					type="email"
					name="correo"
					id="correoregistro"
					placeholder="Correo"
					required
				/>
			</div>
			<div class="input-group mt-1">
				<div class="input-group-text login-color-bg">
					<i style="font-size: 1.2rem" class="text-white bi bi-key-fill"></i>
				</div>
				<input
					class="form-control bg-light"
					type="password" name="clave"
					placeholder="Contraseña"
					required
				/>
			</div>
			<button type="button"
				onclick="enviarregistro();" class="btn login-color-bg text-white w-100 mt-4 fw-semibold shadow-sm">
				Registrarme
			</button>
		</form>
		<div class="d-flex gap-1 justify-content-center mt-1">
			<div>Ya tienes una cuenta?</div>
			<a
				href="#"
                id="btniniciarsesion"
				class="text-decoration-none login-color-bg-tx fw-semibold"
				>Iniciar Sesión</a
			>
		</div>
	</div>
</div>
