
<div class="container mt-3  ">
    <a href="<?php echo base_url();?>admin/historial" class="btn btn-danger">Regresar</a>
    <a href="<?php echo base_url();?>admin/descargarpdf/<?php echo $encabezado[0]["id_encabezado"] ?>" class="btn btn-success">Descargar</a>
    <form action="<?php echo base_url() ?>/admin/ventas/actualizarcarrito" id="formulario" method="post">
        <div class="d-flex justify-content-between  flex-wrap ">
        <p><span class="fw-bold ">No. Factura:</span> <?php echo $encabezado[0]['id_encabezado']; ?></p>
        <p> <span class="fw-bold ">Cliente:</span>  <?php echo strtoupper( $encabezado[0]['nombre']." ".$encabezado[0]['apellido']); ?></p>
        <p> <span class="fw-bold ">Nit:</span> <?php  echo $encabezado[0]['nit']  ?></p>
        </div>
        <div class="d-flex justify-content-between flex-wrap ">  
        <p> <span class="fw-bold ">Dirección de envio:</span> <?php  echo $encabezado[0]['direccionenvio']  ?> </p>
        <p> <span class="fw-bold ">No. Telefono:</span> <?php  echo $encabezado[0]['telefono']  ?></p>
        </div>
        <table class="table  mt-2 ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalle as $fila): ?>
                    <tr>
                    <th><?php echo $fila['nombre']; ?></th>
                    <th>Q.<?php echo number_format($fila['precio'],2,".",","); ?></th>
                    <th><?php echo $fila['cantidad']; ?></th>
                    <th>Q.<?php echo number_format($fila['subtotal'],2,".",",");?></th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>