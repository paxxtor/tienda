<a href="#" data-bs-toggle="modal" data-bs-target="#registraradmin" class="btn btn-success ">Registrar Administrador</a>
<table class="table table-bordered mt-2">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Usuario</th>
      <th scope="col">Correo</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col"> Estado</th>
      <th scope="col"> Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $row) : ?>
      <?php if($row['estado'] == 0 || $row['estado'] == 1) :?>
      <tr>
        <th scope="row"><?php echo $row['id_usuario']; ?></th>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['apellido']; ?></td>
        <td><?php echo $row['usuario']; ?></td>
        <td><?php echo $row['correo']; ?></td>
        <td><?php echo $row['direccion']; ?></td>
        <td><?php echo $row['telefono']; ?></td>
        <td>
          <?php
          if ($row['estado'] == 1) :
          ?>
            <span class="badge rounded-pill text-bg-success">Activo</span>
          <?php
          elseif ($row['estado'] == 0) :
          ?>
            <span class="badge rounded-pill text-bg-warning ">Inactivo</span>
          <?php
          else:
          ?>
            <span class="badge rounded-pill text-bg-danger">Eliminado</span>
          <?php endif; ?>
        </td>
        <td>

          <?php 
          if($row['estado']==1):
          ?>
          <a href="<?php echo base_url(); ?>admin/editar/<?php echo base64_encode($row['id_usuario']); ?>" style=" font-size: 24px;" ><i class="bi bi-pencil-square"></i></a>
          <a href="<?php echo base_url()?>admin/usuarios/eliminar/<?php echo $row['id_usuario']?>" class="text-danger" style=" font-size: 24px;" onclick="return confirm('Eliminar usuario ¡Esa acción no se puede deshacer!')"><i class="bi bi-x-circle"></i></a>
          <a href="<?php echo base_url()?>admin/usuarios/desactivar/<?php echo $row['id_usuario']?>" class="text-success" style=" font-size: 30px;" onclick="return confirm('Desactivar Usuario')"><i class="bi bi-toggle2-on"></i></a>
          <?php 
          elseif($row['estado']==0):
          ?>
          <a href="<?php echo base_url(); ?>admin/editar/<?php echo base64_encode($row['id_usuario']); ?>" style=" font-size: 24px;" ><i class="bi bi-pencil-square"></i></a>
          <a href="<?php echo base_url()?>admin/usuarios/eliminar/<?php echo $row['id_usuario']?>" class="text-danger" style=" font-size: 24px;" onclick="return confirm('Eliminar usuario ¡Esa acción no se puede deshacer!')"><i class="bi bi-x-circle"></i></a>
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
      <?php endif;?>
    <?php endforeach; ?>
  </tbody>
</table>





<div class="modal fade" id="registraradmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Administrador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form method="POST" action="<?php echo base_url() ?>admin/usuarios/guardar/?>">
        <div class="modal-body">

          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">Nombre:</label>
            <input type="text" name="nombre" class="form-control-plaintext border border-primary w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">Apellido:</label>
            <input type="text" name="apellido" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">usuario:</label>
            <input type="text" name="usuario" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">Clave:</label>
            <input type="password" name="clave" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">Correo:</label>
            <input type="text" name="correo" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">Teléfono:</label>
            <input type="number" name="telefono" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">Dirección:</label>
            <input type="text" name="direccion" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Registrar</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>