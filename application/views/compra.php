<div class=" container d-flex justify-content-center align-items-center mt-2 ">
    <div class="bg-white p-5 rounded-5 text-secondary-emphasis border border-black "
		style="width: 25rem">
        <form class="col-md-6 ">
            <fieldset>
                <legend>Datos del cliente</legend>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre: <span>
                        <?php echo strtoupper($this->session->userdata('nombre')); ?>
                    </span></label>
                        <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div> -->
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido: <span>
                    <?php echo strtoupper($this->session->userdata('apellido')); ?>
                </span></label>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefono: <span>
                    <?php echo strtoupper($this->session->userdata('telefono')); ?>
                </span></label>
            </div>
            <div class="mb-3">
                <label class="form-label">Dirección: <input
                value="<?php echo strtoupper($this->session->userdata('direccion')); ?>"> </label>
            </div>
            <div class="mb-3">
                <label class="form-label">Notas:</label>
            </div>
            <div>
                <textarea name="" id="" cols="40" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-1 ">Comprar</button>
        </fieldset>
    </form>
    </div>
</div>