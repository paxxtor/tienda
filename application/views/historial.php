
<?php print_r($encabezado) ?>

<form action="<?php echo base_url() ?>/admin/ventas/actualizarcarrito" id="formulario" method="post">
    <table class="table  mt-2 ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Fecha   </th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Total</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($encabezado as $fila): ?>
                <tr>
                    <th>
                        <?php echo $fila['id_encabezado']; ?>
                    </th>
                    <th>
                        <?php echo $fila['nombre'].' '.$fila['apellido']; ?>
                    </th>
                    <th>
                        <?php echo date("d/m/Y", strtotime($fila['fecha'])); ?>
                    </th>
                    <th>
                        <?php echo $fila['direccionenvio']; ?>
                    </th>
                    <th>
                        <?php echo $fila['telefono']; ?>
                    </th>
                    <th>
                        <?php echo $fila['total']; ?>
                    </th>
                    <th>
                        <a href="" style="font-size: 23px; line-height: 0px;"><i class="bi bi-trash3-fill"></i></a>
                        <a href="<?php echo base_url();?>admin/detallecompra/<?php echo $fila['id_encabezado'];?>" style="font-size: 23px; line-height: 0px;"><i class="bi bi-arrow-up-right"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>