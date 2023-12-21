<a href="<?php echo base_url(); ?>admin/tablero" class="btn btn-danger">Regresar</a>
<a href="#" data-bs-toggle="modal" data-bs-target="#registrarProducto" class="btn btn-success ">Registrar Producto</a>
<a href="#" data-bs-toggle="modal" data-bs-target="#registrarcategoria" class="btn btn-secondary ">Agregar categoria</a>

<table class="table table-bordered mt-3  ">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>CANTIDAD</th>
            <th>Categoria</th>
            <th>CODIGO</th>
            <th>PRECIO VENTA</th>
            <th>PRECIO COSTO</th>
            <th>PROVEEDOR</th>
            <th>STOCK</th>
            <th>ESTADO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($producto as $row) : ?>
            <tr>
                <td> <?php echo $row['id_producto'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['cantidad'] ?></td>
                <td><?php echo $row['nombrecategoria'] ?></td>
                <td><?php echo $row['codigo'] ?></td>
                <td><?php echo $row['precioventa'] ?></td>
                <td><?php echo $row['preciocosto'] ?></td>
                <td><?php echo $row['nombreempresa'] ?></td>
                <td><?php if ($row['cantidad'] >= 10) : ?><p class="badge badge-success">Hay Stock</p>
                    <?php elseif ($row['cantidad'] > 0 && $row['cantidad'] < 10) : ?><p class="badge badge-warning">Está por agotarse</p>
                    <?php elseif ($row['cantidad'] == 0) : ?><p class="badge badge-danger ">No hay stock</p>
                    <?php else : ?> <p>Error al leer la cantidad</p>
                    <?php endif; ?></td>
                <td>
                    <?php if ($row['estado'] == 1) : ?><p class="badge badge-success">Activo</p>
                    <?php elseif ($row['estado'] == 0) : ?><p class="badge badge-warning">Inactivo</p>
                    <?php else : ?> <p class="badge badge-danger">Eliminado</p>
                    <?php endif; ?>
                </td>
                <td>
                    <?php
                    if ($row['estado'] == 1) :
                    ?>
                        <a href="<?php echo base_url(); ?>admin/producto/update/<?php echo $row['id_producto']; ?> " style=" font-size: 24px;" ><i class="bi bi-pencil-square"></i></a>
                        <a href="<?php echo base_url() ?>admin/producto/eliminar/<?php echo $row['id_producto']; ?>" class="text-danger fs-1" style=" font-size: 24px;" onclick="return confirm('Eliminar Producto ¡Esa acción no se puede deshacer!')"><i class="bi bi-x-circle"></i></a>
                        <a href="<?php echo base_url() ?>admin/producto/desactivar/<?php echo $row['id_producto']; ?>" class="text-success" style=" font-size: 30px;"  onclick="return confirm('Desactivar Producto')"><i class="bi bi-toggle2-on"></i></a>
                    <?php
                    elseif ($row['estado'] == 0) :
                    ?>
                        <a href="<?php echo base_url(); ?>admin/producto/update/<?php echo $row['id_producto'];  ?>"  style=" font-size: 24px;" ><i class="bi bi-pencil-square"></i></a>
                        <a href="<?php echo base_url() ?>admin/producto/eliminar/<?php echo $row['id_producto']; ?>" class="text-danger fs-1" style=" font-size: 24px;"  onclick="return confirm('Eliminar Producto ¡Esa acción no se puede deshacer!')"><i class="bi bi-x-circle"></i></a>
                        <a href="<?php echo base_url() ?>admin/producto/activar/<?php echo $row['id_producto']; ?>" class="text-warning" style=" font-size: 30px;"  onclick="return confirm('Activar Producto')"><i class="bi bi-toggle2-off"></i></a>
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



<div class="modal fade" id="registrarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/producto/guardar/<?php echo $row['id_producto'] ?>">
                <div class="modal-body">
                    <div class="form-group mb-5 d-flex justify-content-between ">
                        <label class="mx-3">Nombre:</label>
                        <input autocomplete="off" type="text" name="nombre" class="form-control-plaintext border border-primary w-75 " required style="border:1px solid white; border-radius:5px;">
                    </div>
                    <div class="form-group mb-5 d-flex justify-content-between ">
                        <label class="mx-3">Cantidad:</label>
                        <input autocomplete="off" type="number" name="cantidad" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
                    </div>
                    <div class="form-group mb-5 d-flex justify-content-between ">
                        <label class="mx-3">Descripción:</label>
                        <textarea autocomplete="off" type="text" name="descripcion" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;"></textarea>
                    </div>

                    <div class="form-group mb-5  d-flex justify-content-between ">
                        <label class="mx-3">Codigo:</label>
                        <input autocomplete="off" type="number" name="codigo" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
                    </div>
                    <div class="form-group mb-5  d-flex justify-content-between ">
                        <label class="mx-3">Precio Venta:</label>
                        <input autocomplete="off" type="number" name="precioventa" class="form-control-plaintext border border-primary w-75 " required style="border:1px solid white; border-radius:5px;">
                    </div>
                    <div class="form-group mb-5  d-flex justify-content-between ">
                        <label class="mx-3">Precio Costo:</label>
                        <input autocomplete="off" type="number" name="preciocosto" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
                    </div>
                    
                    <div class="form-group mb-5  d-flex justify-content-between ">
                        <label class="mx-3">Fotografia:</label>
                        <input autocomplete="off" type="file" name="fotografia" class="form-control-plaintext border border-primary  w-75 " required style="border:1px solid white; border-radius:5px;">
                    </div>
                    <div class="form-group mb-5">
                        <label class="mx-3">Proveedor:</label>
                        <select  name="id_proveedor" class="form-control" required>
                            <?php foreach ($empresa as $fila) : 
                                ?>
                                <option value="<?php echo $fila['id_proveedor'] ?>"><?php echo $fila['nombreempresa'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label class="mx-3">categoria:</label>
                        <select  name="id_categoria" class="form-control" required>
                            <?php foreach ($categoria as $fila) : 
                                ?>
                                <option value="<?php echo $fila['id_categoria'] ?>"><?php echo $fila['nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
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


<div class="modal fade" id="registrarcategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>admin/producto/guardarcategoria">
                <div class="modal-body">
                    <div class="form-group mb-5 d-flex justify-content-between ">
                        <label class="mx-3">Nombre:</label>
                        <input autocomplete="off" type="text" name="nombre" class="form-control-plaintext border border-primary w-75 " required style="border:1px solid white; border-radius:5px;">
                    </div>
                    <div class="form-group mb-5 d-flex justify-content-between ">
                        <label class="mx-3">Nombre:</label>
                        <textarea autocomplete="off" rows="5" cols="33" name="descripcion" class="form-control-plaintext border border-primary w-75 " required style="border:1px solid white; border-radius:5px;"></textarea>
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