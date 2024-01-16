<!doctype html>
<html>
<body>
    <table style="width:100%;">
        <tr>
            <td align="center">
                <img src="public/uploads/lc.png" style="width:100px;" />
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center"><br>
                <p style="font-family:poppins;color:#444446; text-align:center;font-size:14px;"><b>Tienda Mayan</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 8px;font-family:poppins">
                <p>Torre Pradera Xela, 7-62 zona 3 Quetzaltenango Noveno Nivel, Oficina 908.</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 8px;padding-bottom: 5px;font-family:poppins">
                <p>7930 4300</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 14px;font-family:poppins">
                <b>FACTURA ORIGINAL</b>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                <p style="font-size: 18px;font-family:poppins">----------------------------------------</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 8px;font-family:poppins">
                <p>Nit: <span style="color:#444446;">
                <?php echo $encabezado[0]['nit'];  ?>
                    </b></span>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 8px;font-family:poppins">
                <p>No. Factura: <span style="color:#444446;">
                <?php echo $encabezado[0]['id_encabezado'];  ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                 <p style="font-size: 18px;font-family:poppins">----------------------------------------</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 8px;padding-bottom: 3px;font-family:poppins">
                <p>Direccion: <span style="color:#444446;">
                <?php print_r(date("d/m/Y", strtotime($encabezado[0]['fecha'])));  ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 8px;padding-bottom: 3px;font-family:poppins">
                <p>Cliente: <span style="color:#444446;">
                        <?php print_r(strtoupper($encabezado[0]['nombre'].' '.$encabezado[0]['apellido'])); ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 8px;padding-bottom: 3px;font-family:poppins">
                <p>Telefono: <span style="color:#444446;">
                <?php print_r($encabezado[0]['telefono']); ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 8px;padding-bottom: 3px;font-family:poppins">
                <p>Direccion de Factuarción: <span style="color:#444446;">
                <?php print_r($encabezado[0]['direccionfacturacion']); ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 8px;padding-bottom: 3px;font-family:poppins">
                <p>Direccion de envío: <span style="color:#444446;">
                <?php print_r($encabezado[0]['direccionenvio']); ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                 <p style="font-size: 18px;font-family:poppins">----------------------------------------</p>
            </td>
        </tr>
    </table>
    <table align="center" class="mt-2 "  style="width:90%;">
        <thead>
            <tr>
                <th  style="font-size:8px;padding-bottom: 3px;  font-family:poppins" scope="col">CANT </th>
                <th align="start" style="font-size:8px;padding-bottom: 3px;font-family:poppins; width:50%;">CONCEPTO</th>
                <th  style="font-size:8px;padding-bottom: 3px; padding-rigth: 20px;font-family:poppins; width:20%;" scope="col">P.U.</th>
                <th  style="font-size:8px;padding-bottom: 3px;font-family:poppins; width:20%;" scope="col">IMPORTE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalle as $fila): ?>
                <tr>
                    <th style="font-size: 7px;font-family:poppins;color:#444446; font-weight:normal;">
                        <?php echo $fila['cantidad']; ?>
                    </th>
                    <th align="start"  style="font-size: 7px;font-family:poppins;color:#444446;  font-weight:normal;">
                    <?php echo $fila['nombre'];  ?>
                    </th>
                    <th style="font-size: 7px;font-family:poppins;color:#444446;  font-weight:normal;">Q.
                        <?php echo number_format($fila['precio'], 2, ".", ","); ?>
                    </th>
                    <th style="font-size: 7px;font-family:poppins;color:#444446;  font-weight:normal;">Q.
                        <?php echo number_format($fila['subtotal'], 2, ".", ","); ?>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                <p style="font-size: 18px;font-family:poppins">----------------------------------------</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="right" style="font-size: 10px;padding-bottom: 5px;font-family:poppins; padding-right:10px;">
                <p>Total: <span style="color:#444446;">
                <?php echo "Q. ".number_format($encabezado[0]['total'],1,".",",");?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center">
                <p style="font-size: 12px;font-family:poppins;color:#444446;padding-top:50px"> ..::::::
                    Gracias por su Compra ::::::..</p>
                <p style="font-size: 10px;font-family:poppins;color:#444446;">https://tienda.com</p>
            </td>
        </tr>
    </table>
</body>

</html>