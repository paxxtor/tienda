<div class="mb-3 ">
  <a href="<?php echo base_url(); ?>admin/tablero" class="btn btn-danger">Regresar</a>
  <a href="#" data-bs-toggle="modal" data-bs-target="#registrarcliente" class="btn btn-success">Registrar Cliente</a>
</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Telefono</th>
      <th scope="col">NIT</th>
      <th scope="col">Correo</th>
      <th scope="col">Tipo de cliente</th>
      <th scope="col">Dirección</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($clientes as $row) : ?>
      <tr>
        <th scope="row"><?php echo $row['id_cliente']; ?></th>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['apellido']; ?></td>
        <td><?php echo $row['telefono']; ?></td>
        <td><?php echo $row['nit']; ?></td>
        <td><?php echo $row['correo']; ?></td>
        <td><?php if ($row['tipocliente'] == 0) : ?><p>Minorista</p>
          <?php elseif ($row['tipocliente'] == 1) : ?><p>Mayorista</p>
          <?php else : ?><p>No se ha establecido el tipo de cliente</p>
          <?php endif ?>
        </td>
        <td><?php echo $row['direccion']; ?></td>
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
          else :
          ?>
            <span class="badge badge-danger">Eliminado</span>
          <?php endif; ?>
        </td>
        <td>

          <?php
          if ($row['estado'] == 1) :
          ?>
            <a href="<?php echo base_url(); ?>admin/clientes/update/<?php echo $row['id_cliente']; ?>" style=" font-size: 24px;" ><i class="bi bi-pencil-square"></i></a>
            <a href="<?php echo base_url() ?>admin/clientes/eliminar/<?php echo $row['id_cliente']; ?>" class="text-danger fs-1" style=" font-size: 24px;" onclick="return confirm('Eliminar cliente ¡Esa acción no se puede deshacer!')"><i class="bi bi-x-circle"></i></a>
            <a href="<?php echo base_url() ?>admin/clientes/desactivar/<?php echo $row['id_cliente']; ?>" class="text-success" style=" font-size: 30px;" onclick="return confirm('Desactivar Cliente')"><i class="bi bi-toggle2-on"></i></a>
          <?php
          elseif ($row['estado'] == 0) :
          ?>
            <a href="<?php echo base_url(); ?>admin/clientes/update/<?php echo base64_encode($row['id_cliente']); ?>" style=" font-size: 24px;" ><i class="bi bi-pencil-square"></i></a>
            <a href="<?php echo base_url() ?>admin/clientes/eliminar/<?php echo $row['id_cliente'] ?>" class="text-danger fs-1" style=" font-size: 24px;" onclick="return confirm('Eliminar cliente ¡Esa acción no se puede deshacer!')"><i class="bi bi-x-circle"></i></a>
            <a href="<?php echo base_url() ?>admin/clientes/activar/<?php echo $row['id_cliente'] ?>" class="text-warning" style=" font-size: 30px;" onclick="return confirm('Activar Cliente')"><i class="bi bi-toggle2-off"></i></a>
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

<div class="modal fade" id="registrarcliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <form method="POST" action="<?php echo base_url() ?>admin/clientes/guardar/<?php echo $row['id_cliente'] ?>">
        <div class="modal-body">

          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">Nombre:</label>
            <input autocomplete="off" type="text" name="nombre" class="form-control-plaintext border border-primary w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5 d-flex justify-content-between ">
            <label class="mx-3">Apellido:</label>
            <input autocomplete="off" type="text" name="apellido" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">Telefono:</label>
            <input autocomplete="off" type="number" name="telefono" class="form-control-plaintext border border-primary w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">NIT:</label>
            <input autocomplete="off" type="number" name="nit" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">Correo:</label>
            <input autocomplete="off" type="email" name="correo" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
          </div>
          <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">Tipo de cliente:</label>
            <select name="tipocliente" class="form-control" required>
              <option value="">Seleccionar</option>
              <option value="0">Minorista</option>
              <option value="1">Mayorista</option>
            </select>
          </div>
          <div class="form-group mb-5  d-flex justify-content-between ">
            <label class="mx-3">Dirección:</label>
            <input autocomplete="off" type="text" name="direccion" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
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