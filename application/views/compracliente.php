<!-- <button class="btn btn-info " onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_product_import/');">Importar</button>
<input type="submit" name="load" class="btn btn-primary" /></div> -->
<div class="table-wrapper mt-3 ">
              <table id="producto_data" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Nombre</th>
                    <th class="wd-15p"></th>
                    <th class="wd-15p"></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
</div>

<div class="container mt-4 ">
  <h3>Subir Productos por medio de Excel</h3>
  <div class="table-responsive">
    <span id="message"></span>
      <form method="post" id="load_excel_form" enctype="multipart/form-data">
        <table class="table">
          <tr>
            <td width="25%" class="fs-6 col-1 ">Buscar Excel: </td>
            <td width="20%"><input type="file" class="form-control" name="select_excel"  /></td>
            <td width="25%"><input type="submit" name="load" value="Importar" class="btn btn-primary" /></td>
          </tr>
        </table>
      </form>
  </div>
  </div>
 

<form action="<?php echo base_url() ?>/admin/service_export" method="post">
    <div class =" container d-flex">
    <div class="col-2 mx-2"> 
    <select name="tipocliente" class="form-control" required>
      <option value="">Seleccionar</option>
      <option value="productos">Productos</option>
      <option value="1">Clientes</option>
      <option value="2">Proveedores</option>
      <option value="3">Usuario</option>
    </select>
    </div>
    <div class="col-5">
    <button type="submit" class="btn btn-warning mx-2 ">Exportar</button>
    </div>
    </div>
</form>