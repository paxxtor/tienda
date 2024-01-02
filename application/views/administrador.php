<div
	class="login-admincolor-bg d-flex justify-content-center align-items-center vh-100 altura"
>
	<div
		class="bg-white p-5 rounded-5 text-secondary-emphasis"
		style="width: 25rem"
	>
		<div class="d-flex justify-content-center">
			<img
				src="<?php echo base_url(); ?>public/assets/login-icon.svg"
				alt="login-icon"
				style="height: 7rem"
			/>
		</div>
		<div class="text-center fs-1 fw-bold">Administrador</div>



		<form action="" id="formularioadmin" method="post">
			<div class="input-group mt-4">
				<div class="input-group-text login-color-bg">
					<img
						src="<?php echo base_url(); ?>public/assets/username-icon.svg"
						alt="username-icon"
						style="height: 1rem"
					/>
				</div>
				<input
					class="form-control bg-light"
					type="text"
					placeholder="Usuario"
					name='usuario';
					required
				/>
			</div>
			<div class="input-group mt-1">
				<div class="input-group-text login-color-bg">
					<img
						src="<?php echo base_url(); ?>public/assets/password-icon.svg"
						alt="password-icon"
						style="height: 1rem"
					/>
				</div>
				<input
					class="form-control bg-light"
					type="password"
					placeholder="Contraseña"
					name='clave';
					required
				/>
			</div>
			<button
				type="button"
				onclick="enviaradmin();"
				class="btn login-color-bg text-white w-100 mt-4 fw-semibold shadow-sm"
			>
				Iniciar Sesión
			</button>
            <div class="d-flex gap-1 justify-content-center mt-1">
			<div>Eres Cliente?</div>
			<a
				href="#"
				id="btniniciarsesion"
				class="text-decoration-none login-color-bg-tx fw-semibold"
				>Iniciar Sesión</a
			>
		</div>
	</div>
		</form>
	</div>
</div>
