<a class="btn btn-danger mb-3 " onclick="return confirm('Eliminar todo el carrito?')"
    href="<?php echo base_url(); ?>admin/eliminarcarrito"><i class="bi bi-trash"></i>&nbsp;Eliminar Carrito</a>
<?php if ($this->session->flashdata("Error") != ""): ?>

    <div class="alert alert-warning">
        Uno o más productos no pudieron agregarse por falta de stock
    </div>
<?php endif; ?>
<form action="<?php echo base_url() ?>/admin/actualizarcarrito" id="formulario" method="post">
    <table class="table  mt-2 ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Agregados</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->cart->contents() as $fila): ?>
                <tr>
                    <th>
                        <?php echo $fila['id']; ?>
                    </th>
                    <th>
                        <?php echo substr($fila['name'], 0, 25) . '' ?>
                    </th>
                    <th>Q.
                        <?php echo number_format($fila['price'], 2, ".", ","); ?>
                    </th>
                    <th><input type="number" value="<?php echo $fila['qty']; ?>"
                            name="cantidad_<?php echo $fila['rowid']; ?>"></th>
                    <th>Q.
                        <?php echo number_format($fila['subtotal'], 2, ".", ","); ?>
                    </th>
                    <th><a class="text-decoration-none"
                            href="<?php echo base_url() ?>/admin/eliminar_item/<?php echo $fila['rowid'] ?>">Eliminar</a>
                    </th>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p class="font-weight-bold h4 text-danger">Total: Q.
        <?php echo number_format($this->cart->total(), 2, ".", ","); ?>
    </p>
    <button type="button" class="btn btn-primary" onclick="enviar();"><i
            class="bi bi-bag"></i>&nbsp;Comprar</button>
    <button type="submit" class="btn btn-success" onclick="return confirm('Actualizar?')"
        href="<?php echo base_url(); ?>admin/eliminarcarrito"><i
            class="bi bi-arrow-clockwise"></i>&nbsp;Actualizar</button>
</form>

<script>
    function enviar() {
        let datos = document.getElementById("formulario");
        let form = new FormData(datos);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>admin/comprar",
            data: form,
            processData: false,
            contentType:false,
            success:function(data){
                // console.log(data);
                if(data == "200")
                {
                    window.location = "<?php echo base_url(); ?>admin/mostrar_carrito";
                }
            }
        });
    }
</script>