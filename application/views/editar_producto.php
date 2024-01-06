<div class="container">
<?php
foreach ($producto as $row):
    ?>
    <form method="POST" enctype="multipart/form-data"
        action="<?php echo base_url() ?>admin/producto/actualizar/<?php echo $row['id_producto'] ?>">
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-2">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-2">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" value="<?php echo $row['cantidad'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-2">Codigo</label>
            <input type="number" name="codigo" class="form-control" value="<?php echo $row['codigo'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-2">Precio Venta</label>
            <input type="number" name="precioventa" class="form-control" value="<?php echo $row['precioventa'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-2">Precio Costo</label>
            <input type="number" name="preciocosto" class="form-control" value="<?php echo $row['preciocosto'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-2">Descripción</label>
            <textarea name="descripcion" rows="4" cols="50" class="form-control"
                required><?php echo $row['descripcion'] ?></textarea>
        </div>
        <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">Fotografia:</label>
            <input autocomplete="off" type="file" name="fotografia"
                class="form-control-plaintext border border-primary  w-75 "
                style="border:1px solid white; border-radius:5px;">
        </div>

        <div class="form-group ">
            <label for="exampleInputtext1" class="form-label mt-2">Proveedor:</label>
            <select name="id_proveedor" class="form-control" required>
                <?php foreach ($empresa as $fila): ?>
                    <option value="<?php echo $fila['id_proveedor']; ?>" <?php if ($fila['id_proveedor'] == $row['id_proveedor'])
                           echo 'selected'; ?>>
                        <?php echo $fila['nombreempresa'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-5">
            <label class="mx-3">categoria:</label>
            <select name="id_categoria" class="form-control" required>
                <?php foreach ($categoria as $fila): ?>
                    <option value="<?php echo $fila['id_categoria'] ?>" <?php if($fila['id_categoria'] == $row['id_categoria']) echo 'selected'?>>
                        <?php echo $fila['nombre'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success" onclick="return confirm('Editar Producto')">Editar</button>
        <a href="<?php echo base_url() ?>/admin/producto/" class="btn btn-danger"
            onclick="return confirm('Cancelar cambios')">Cancelar</a>
    <?php endforeach;
?>

</form>
</div>