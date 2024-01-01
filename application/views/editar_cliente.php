<?php
foreach ($clientes as $row) :
?>

    <form method="POST" action="<?php echo base_url() ?>admin/clientes/actualizar/<?php echo $row['id_cliente'] ?>">
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?php echo $row['apellido'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Telefono</label>
            <input type="text" name="telefono" class="form-control" value="<?php echo $row['telefono'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Nit</label>
            <input type="text" name="nit" class="form-control" value="<?php echo $row['nit'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Correo</label>
            <input type="text" name="correo" class="form-control" value="<?php echo $row['correo'] ?>" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Contraseña</label>
            <input type="text" name="clave" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Tipo de Cliente</label>
            <select name="tipocliente" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="0" <?php if($row['tipocliente']==0) echo 'selected';?>>Minorista</option>
                <option value="1" <?php if($row['tipocliente']==1) echo 'selected';?>>Mayorista</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1" class="form-label mt-4">Direccion</label>
            <input type="text" name="direccion" class="form-control" value="<?php echo $row['direccion'] ?>" required>
        </div>

        <button type="submit" class="btn btn-success" onclick="return confirm('Editar Cliente')">Editar</button>
        <a href="<?php echo base_url() ?>/admin/clientes/" class="btn btn-danger" onclick="return confirm('Cancelar cambios')">Cancelar</a>
    <?php endforeach; ?>
    </form>