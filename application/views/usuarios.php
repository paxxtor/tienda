<a href="<?php echo base_url(); ?>admin/tablero" class="btn btn-danger">Regresar</a>
<a href="<?php echo base_url(); ?>admin/tablero" class="btn btn-success">Registrar Administrador</a>
<table class="table table-bordered mt-2">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col"> Estado</th>
      <th scope="col"> Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $row) : ?>
      <tr>
        <th scope="row"><?php echo $row['id_usuario']; ?></th>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['apellido']; ?></td>
        <td><?php echo $row['correo']; ?></td>
        <td><?php echo $row['direccion']; ?></td>
        <td><?php echo $row['telefono']; ?></td>
        <td>
          <?php
          if ($row['estado'] == 1) :
          ?>
            <span class="badge badge-success">Activo</span>
          <?php
          elseif ($row['estado'] == 0) :
          ?>
            <span class="badge badge-warning ">Inactivo</span>
          <?php
          else:
          ?>
            <span class="badge badge-danger">Eliminado</span>
          <?php endif; ?>
        </td>
        <td>

          <?php 
          if($row['estado']==1):
          ?>
          <a href="<?php echo base_url(); ?>admin/editar/<?php echo base64_encode($row['id_usuario']); ?>" style=" font-size: 24px;" ><i class="bi bi-pencil-square"></i></a>
          <a href="<?php echo base_url()?>admin/usuarios/eliminar/<?php echo $row['id_usuario']?>" class="text-danger fs-1" style=" font-size: 24px;" onclick="return confirm('Eliminar usuario ¡Esa acción no se puede deshacer!')"><i class="bi bi-x-circle"></i></a>
          <a href="<?php echo base_url()?>admin/usuarios/desactivar/<?php echo $row['id_usuario']?>" class="text-success" style=" font-size: 30px;" onclick="return confirm('Desactivar Usuario')"><i class="bi bi-toggle2-on"></i></a>
          <?php 
          elseif($row['estado']==0):
          ?>
          <a href="<?php echo base_url(); ?>admin/editar/<?php echo base64_encode($row['id_usuario']); ?>" style=" font-size: 24px;" ><i class="bi bi-pencil-square"></i></a>
          <a href="<?php echo base_url()?>admin/usuarios/eliminar/<?php echo $row['id_usuario']?>" class="text-danger fs-1" style=" font-size: 24px;" onclick="return confirm('Eliminar usuario ¡Esa acción no se puede deshacer!')"><i class="bi bi-x-circle"></i></a>
          <a href="<?php echo base_url()?>admin/usuarios/activar/<?php echo $row['id_usuario']?>"  class="text-warning" style=" font-size: 30px;" onclick="return confirm('Activar Usuario')"><i class="bi bi-toggle2-off"></i></a>
          <?php 
          else:
          ?>
          <p>Sin Acciones</p>
          <?php
          endif;
          ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
