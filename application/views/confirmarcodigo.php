<div
	class="login-color-bg d-flex justify-content-center align-items-center vh-100 altura"
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
		<div class="text-center fs-1 fw-bold">Verificar Código</div>
        
		<form action="<?php echo base_url(); ?>login/validarcuenta/verificar" method="post">
			<div class="input-group mt-4">
				<div class="input-group-text login-color-bg">
					<i style="font-size: 1.2rem" class="text-white  bi bi-file-check-fill"></i>
				</div>
				<input
					class="form-control bg-light"
					autocomplete="off" type="text" name='codigo'
                    placeholder="Ingresa el código"
					required
				/>
			</div>
			
			<button
				type="submit"
				onclick="enviar();"
				class="btn login-color-bg text-white w-100 mt-4 fw-semibold shadow-sm">
				Verificar
			</button>            
            <button
				type="button"
				onclick="btnreenviocodigo();"
                class="btn btn-warning mt-3 w-100 fw-semibold shadow-sm" href="<?php echo base_url();?>login/enviarcodigo"><i class="bi bi-arrow-clockwise"></i>
				Volver a enviar el codigo
			</button>
		</form>
	</div>
</div>