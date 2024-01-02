<a href="#" data-bs-toggle="modal" data-bs-target="#registrarproveedor" class="btn btn-success">Registrar Proveedor</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Empresa</th>
      <th scope="col">NIT</th>
      <th scope="col">Dirección</th>
      <th scope="col">Télefono</th>
      <th scope="col">Celular</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($proveedores as $row) : ?>
      <tr>
        <th scope="row"><?php echo $row['id_proveedor']; ?></th>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['apellido']; ?></td>
        <td><?php echo $row['nombreempresa']; ?></td>
        <td><?php echo $row['nit']; ?></td>
        <td><?php echo $row['direccion']; ?></td>
        <td><?php echo $row['telefono']; ?></td>
        <td><?php echo $row['celular']; ?></td>
        <td>
          <?php
          if ($row['estado'] == 1) :
          ?>
            <span class="badge badge-success">Activo</span>
          <?php
          elseif ($row['estado'] == 0) :
          ?>
            <span class="badge badge-warning">Inactivo</span>
          <?php
          else :
          ?>
            <span class="badge badge-danger">Eliminado</span>
          <?php endif; ?>
        </td>
        <td>
          <?php
          if ($row['estado'] == 1) :
          ?>
            <a href="<?php echo base_url(); ?>admin/proveedores/update/<?php echo $row['id_proveedor']; ?>" style=" font-size: 24px;" ><i class="bi bi-pencil-square"></i></a>
            <a href="<?php echo base_url() ?>admin/proveedores/eliminar/<?php echo $row['id_proveedor']; ?>" class="text-danger fs-1" style=" font-size: 24px;" onclick="return confirm('Eliminar Proveedor ¡Esa acción no se puede deshacer!')"><i class="bi bi-x-circle"></i></a>
            <a href="<?php echo base_url() ?>admin/proveedores/desactivar/<?php echo $row['id_proveedor']; ?>" class="text-success" style=" font-size: 30px;" onclick="return confirm('Desactivar Proveedor')"><i class="bi bi-toggle2-on"></i></a>
          <?php
          elseif ($row['estado'] == 0) :
          ?>
            <a href="<?php echo base_url(); ?>admin/proveedores/update/<?php echo $row['id_proveedor'];  ?>" style=" font-size: 24px;" ><i class="bi bi-pencil-square"></i></a>
            <a href="<?php echo base_url() ?>admin/proveedores/eliminar/<?php echo $row['id_proveedor']; ?>" class="text-danger fs-1" style=" font-size: 24px;" onclick="return confirm('Eliminar Proveedor ¡Esa acción no se puede deshacer!')"><i class="bi bi-x-circle"></i></a>
            <a href="<?php echo base_url() ?>admin/proveedores/activar/<?php echo $row['id_proveedor']; ?>" class="text-warning" style=" font-size: 30px;" onclick="return confirm('Activar Proveedor')"><i class="bi bi-toggle2-off"></i></a>
          <?php
          else :
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


<div class="modal fade" id="registrarproveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form method="POST" action="<?php echo base_url() ?>admin/proveedores/guardar/<?php echo $row['id_proveedor'] ?>">
        <div class="modal-body">

          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">Nombre:</label>
            <input type="text" name="nombre" class="form-control-plaintext border border-primary w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">Apellido:</label>
            <input type="text" name="apellido" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          
          <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">Celular:</label>
            <input type="number" name="celular" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">Empresa:</label>
            <input type="text" name="nombreempresa" class="form-control-plaintext border border-primary w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">NIT:</label>
            <input type="number" name="nit" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">Dirección:</label>
            <input type="text" name="direccion" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">Telefono:</label>
            <input type="number" name="telefono" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
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