<div class=" container d-flex justify-content-center align-items-center mt-2 ">
    <div class="bg-white p-5 rounded-5 text-secondary-emphasis border border-black "
		style="width: 25rem">
        <form class="" id="formcomprar" method="post">
            <fieldset>
                <legend>Datos de envio</legend>
                <div class="mb-3">
                    <label  name="nombre" class="form-label">Nombre: <span>
                        <?php echo strtoupper($this->session->userdata('nombre')); ?>
                    </span></label>
                        <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div> -->
            </div>
            <div class="mb-3">
                <label class="form-label"  name="apellido">Apellido: <span>
                    <?php echo strtoupper($this->session->userdata('apellido')); ?>
                </span></label>
            </div>
            <div class="mb-3">
                <label class="form-label" name="telefono">Telefono: <span>
                    <?php echo strtoupper($this->session->userdata('telefono')); ?>
                </span></label>
            </div>
            <div class="mb-3">
                <label class="form-label" name="direccion">Dirección: <?php echo strtoupper($this->session->userdata('direccion')); ?> </label>
            </div> 
            <div class="mb-3">
                <label class="form-label" >Dirección de envio: <input name="direccionenvio"
                value="<?php echo strtoupper($this->session->userdata('direccion')); ?>"> </label>
            </div>
            <div class="mb-3">
                <label class="form-label">Notas:</label>
            </div>
            <div>
                <textarea id="" cols="40" rows="5"  name="notas"></textarea>
            </div>
            <button type="button" onclick="comprar();" class="btn btn-primary mt-1 ">Comprar</button>
        </fieldset>
    </form>
    </div>
</div>