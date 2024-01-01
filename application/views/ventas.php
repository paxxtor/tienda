<div class="container mb-1 d-flex justify-content-between align-items-center ">
  <h1>productos</h1>
  <a class="btn btn-success " href="<?php echo base_url()?>admin/ventas/mostrar_carrito"><i class="bi bi-bag-fill"></i>&nbsp; Mostrar Carrito</a>
</div>
<div class="container d-flex flex-wrap justify-content-between">
  <?php foreach ($listaproductos as $row): ?>
    <?php if($row['estado'] == 1): ?>
    <form action="<?php echo base_url(); ?>admin/ventas/agregarcarrito" method="post">
      <div class="card" style="width: 16rem; margin-bottom: 5px; height: 490px;"> <img class="card-img-top"
          src="<?php echo base_url(); ?>public/uploads/productos/<?php echo $row['fotografia'] ?>" alt="Card image cap"
          style="width: auto; height: 170px; max-width: 200px; margin: 0 auto 1em auto; ">
        <div class="card-body d-flex flex-column justify-content-between">
          <h6 class="card-title">
            <?php echo $row['nombre'] ?>
          </h6>
          <p class="card-text">
            <?php
            echo substr($row['descripcion'], 0, 100) . '...';
            ?>
          </p>
          <span class=" font-weight-bold ">Precio:
            <?php echo 'Q.'.$row['precioventa'] ?>
            </span>
          <?php if ($row['cantidad'] > 0): ?>
            <span class="text-success font-weight-bold ">Stock:
              <?php echo $row['cantidad'] ?>
            </span>
          <?php else: ?>
            <span class="text-danger font-weight-bold ">Stock:
              <?php echo $row['cantidad'] ?>
            </span>
          <?php endif; ?>
          <?php if($row['cantidad'] >0): ?>
          <button class="btn btn-primary">Agregar al carrito</button>
          <input type="hidden" name="id_producto" value="<?php echo $row['id_producto'] ?>">
          <input type="hidden" name="nombre" value="<?php echo $row['nombre'] ?>">
          <input type="hidden" name="precioventa" value="<?php echo $row['precioventa'] ?>">
          <input type="hidden" name="cantidadcompra" value="1">
          <?php endif; ?>
        </div>
      </div>
    </form>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

