<h1>Tablero</h1>
<?php echo $variable;?>
<?php  if ($this->session->userdata('nivel') ==1) :?>
<a class="btn btn-danger" href="<?php echo base_url();?>login/salir">Cerrar sesión</a>
<a class="btn btn-success" href="<?php echo base_url();?>admin/ventas">Ventas</a>
<a class="btn btn-secondary" href="<?php echo base_url();?>admin/historial">Historial</a>
<a class="btn btn-success" href="<?php echo base_url();?>admin/recibo">Recibo</a>
<?php elseif($this->session->userdata('nivel') ==2) :?>
<a class="btn btn-danger" href="<?php echo base_url();?>login/salir">Cerrar sesión</a>
<a class="btn btn-success" href="<?php echo base_url();?>admin/ventas">Ventas</a>
<a class="btn btn-primary" href="<?php echo base_url();?>admin/usuarios">Administradores</a>
<a class="btn btn-warning" href="<?php echo base_url();?>admin/producto">Productos</a>
<a class="btn btn-info" href="<?php echo base_url();?>admin/proveedores">Proveedores</a>
<a class="btn btn-secondary" href="<?php echo base_url();?>admin/clientes">Clientes</a>
<a class="btn btn-secondary" href="<?php echo base_url();?>admin/historial">Historial</a>
<a class="btn btn-secondary" href="<?php echo base_url();?>admin/recibo">Recbio</a>
<?php else: redirect(base_url(), 'refresh');  endif;?>