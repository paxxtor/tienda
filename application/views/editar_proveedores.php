<?php
foreach ($proveedores as $row) :
?>

    <form method="POST" action="<?php echo base_url() ?>admin/proveedores/actualizar/<?php echo $row['id_proveedor'] ?>">
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?php echo $row['apellido'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Empresa</label>
            <input type="text" name="nombreempresa" class="form-control" value="<?php echo $row['nombreempresa'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">NIT</label>
            <input type="number" name="nit" class="form-control" value="<?php echo $row['nit'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="<?php echo $row['direccion'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Télefono</label>
            <input type="number" name="telefono" class="form-control" value="<?php echo $row['telefono'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Celular</label>
            <input type="number" name="celular" class="form-control" value="<?php echo $row['celular'] ?>" required>
        </div>

        <button type="submit" class="btn btn-success" onclick="return confirm('Editar Proveedor')">Editar</button>
        <a href="<?php echo base_url() ?>/admin/proveedores/" class="btn btn-danger" onclick="return confirm('Cancelar cambios')">Cancelar</a>
    <?php endforeach; ?>
    </form>