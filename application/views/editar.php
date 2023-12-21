<?php
foreach($users as $row):
?>

<form method="POST" action="<?php echo base_url()?>admin/usuarios/update/<?php echo $row['id_usuario']?>">
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Nombre</label>
      <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputtext1" class="form-label mt-4">Apellido</label>
      <input type="text" name="apellido" class="form-control" value="<?php echo $row['apellido'] ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputtext1" class="form-label mt-4">Usuario</label>
      <input type="text" name="usuario" class="form-control" value="<?php echo $row['usuario'] ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputtext1" class="form-label mt-4">Contraseña</label>
      <input type="password" name="clave" class="form-control">
    </div>
    <div class="form-group">
      <label for="exampleInputtext1" class="form-label mt-4">Correo</label>
      <input type="text" name="correo" class="form-control" value="<?php echo $row['correo'] ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputtext1" class="form-label mt-4">Telefono</label>
      <input type="text" name="telefono" class="form-control" value="<?php echo $row['telefono'] ?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputtext1" class="form-label mt-4">Direccion</label>
      <input type="text" name="direccion" class="form-control" value="<?php echo $row['direccion'] ?>" required>
    </div>

    <button type="submit" class="btn btn-success" onclick="return confirm('Editar Usuario')">Editar</button>
    <a href="<?php echo base_url()?>/admin/usuarios" class="btn btn-danger" onclick="return confirm('Cancelar cambios')">Cancelar</a>
<?php endforeach; ?>
</form>