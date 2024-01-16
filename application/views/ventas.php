<?php
  if(!empty($_REQUEST["nume"])) {
    $_REQUEST["nume"];
  } else {
    $_REQUEST["nume"] = '1';
  }

  if($_REQUEST["nume"] == "") {
    $_REQUEST["nume"] = '1';
  }

  $registros = '2';
  $pagina = $_REQUEST["nume"];

  if(is_numeric($pagina))
  $inicio = (($pagina-1)*$registros);
  else
    $inicio = 0;
    $this->load->model('crud');
    $resultados = $this->crud->obtener_productos($inicio, $registros);
    $paginas=ceil($cantprodu/$registros);
?>
<h5 class="card-title "> Resultados (
  <?php echo $cantprodu; ?>)
</h5>

<div class="container d-flex flex-wrap justify-content-center ">
  <?php foreach ($resultados as $row): ?>
  <?php if($row['estado'] == 1): ?>
  <form action="<?php echo base_url(); ?>admin/ventas/agregarcarrito" method="post">
    <div class="card" style="width: 16rem; margin-bottom: 5px; height: 490px; margin: 0 10px;"> <img
        class="card-img-top" src="<?php echo base_url(); ?>public/uploads/productos/<?php echo $row['fotografia'] ?>"
        alt="Card image cap" style="width: auto; height: 170px; max-width: 200px; margin: 0 auto 1em auto; ">
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

<!-- paginacion  -->
<div class="container-fluid col-12">
  <ul class="pagination justify-content-center py-5 mb-0 " style="float: none;">
    <li class="page-item ">
      <?php if($_REQUEST['nume'] == "1"){$_REQUEST['nume'] == "0";
        echo "";} 
        else{
          if($pagina>1)
            $ant = $_REQUEST["nume"] - 1;
            echo "<a class='page-link' aria-label='Previous' href='" . base_url() . "productos?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Inicio</span></a>";
            echo "<li class='page-item'><a class='page-link' href='" . base_url() . "productos?nume=".($pagina-1)."'>".$ant."</a></li>"; }
            echo "<li class='page-item active'><a class='page-link'>".$_REQUEST["nume"]."</a> </li>";
            $sigui = $_REQUEST["nume"]+1;
            $ultima = $cantprodu / $registros;
            if($ultima == $_REQUEST["nume"]+1){
              
              $ultima == "";
            }
            if($pagina<$paginas && $paginas>1)
              echo "<li class='page-item'><a class='page-link' href='" . base_url() . "productos?nume=".($pagina+1)."'>".$sigui."</a></li>";
            if($pagina<$paginas && $paginas>1)
            echo "<li class='page-item'><a class='page-link' aria-label='Next' href='" . base_url() . "productos?nume=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr.only'>Fin</span></a></li>";
        ?>
    </li>
  </ul>
</div>