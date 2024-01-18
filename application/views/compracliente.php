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

<div class="container">
      <br />
      <h3 align="center">Subir Productos por medio de Excel</h3>
      <br />
      <div class="table-responsive">
       <span id="message"></span>
          <form method="post" id="load_excel_form" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td width="25%" align="right">Buscar Excel: </td>
                <td width="50%"><input type="file" name="select_excel" /></td>
                <td width="25%"><input type="submit" name="load" value="Importar" class="btn btn-primary" /></td>
              </tr>
            </table>
          </form>
      </div>
     </div>
 

<form action="<?php echo base_url() ?>/admin/service_export" method="post">
    <select name="tipocliente" class="form-control" required>
      <option value="">Seleccionar</option>
      <option value="productos">Productos</option>
      <option value="1">Clientes</option>
      <option value="2">Proveedores</option>
      <option value="3">Usuario</option>
    </select>
    <button type="submit">Exportar</button>
</form>