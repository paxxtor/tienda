
<div class="container ">
<form action="<?php echo base_url() ?>/admin/ventas/actualizarcarrito" id="formulario" method="post">
    <table class="table  mt-2 " id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No. Recibo</th>
                <th scope="col">Fecha   </th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Total</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($encabezado as $fila): ?>
                <?php if($fila['id_persona']==$this->session->userdata('id_cliente')): ?>
                <tr class="font-text-tables">
                    <th  style="">
                        <?php echo $fila['id_encabezado']; ?>
                    </th>
                    <!-- <th>
                        <?php echo $fila['nombre'].' '.$fila['apellido']; ?>
                    </th> -->
                    <th class="font-text-tables">
                        <?php echo date("d/m/Y", strtotime($fila['fecha'])); ?>
                    </th>
                    <th class="font-text-tables">
                        <?php echo $fila['direccionenvio']; ?>
                    </th>
                    <th class="font-text-tables">
                        <?php echo $fila['telefono']; ?>
                    </th>
                    <th class="font-text-tables">
                        <?php echo "Q. ".number_format($fila['total'],2,".",","); ?>
                    </th>
                    <th class="font-text-tables">
                        <a href="" style="font-size: 23px; line-height: 0px;"><i class="bi bi-trash3-fill"></i></a>
                        <a href="<?php echo base_url();?>admin/detallecompra/<?php echo $fila['id_encabezado'];?>" style="font-size: 23px; line-height: 0px;"><i class="bi bi-arrow-up-right"></i></a>
                    </th>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>
</form>