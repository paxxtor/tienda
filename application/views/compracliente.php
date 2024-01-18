<button class="btn btn-info " onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_product_import/');">Importar</button>

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
      <h3 align="center">Load Excel Sheet in Browser using PHPSpreadsheet</h3>
      <br />
      <div class="table-responsive">
       <span id="message"></span>
          <form method="post" id="load_excel_form" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td width="25%" align="right">Select Excel File</td>
                <td width="50%"><input type="file" name="select_excel" /></td>
                <td width="25%"><input type="submit" name="load" class="btn btn-primary" /></td>
              </tr>
            </table>
          </form>
       <br />
          <div id="excel_area"></div>
      </div>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 