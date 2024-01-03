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
                <p style="font-family:poppins;color:#444446; text-align:center;font-size:11px"><b>Tienda Mayan</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 6px;font-family:poppins">
                <p>Torre Pradera Xela, 7-62 zona 3 Quetzaltenango Noveno Nivel, Oficina 908.</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 6px;padding-bottom: 5px;font-family:poppins">
                <p>7930 4300</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 8px;font-family:poppins">
                <b>FACTURA ORIGINAL</b>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                <p>---------------------------------------------------------------------------</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 7px;font-family:poppins">
                <p>Nit: <b style="color:#444446;">
                <?php echo $encabezado[0]['nit'];  ?>
                    </b></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 7px;font-family:poppins">
                <p>No. Factura: <b style="color:#444446;">
                <?php echo $encabezado[0]['id_encabezado'];  ?>
                    </b></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                <p>---------------------------------------------------------------------------</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 7px;padding-bottom: 3px;font-family:poppins">
                <p>Direccion: <b style="color:#444446;">
                <?php print_r(date("d/m/Y", strtotime($encabezado[0]['fecha'])));  ?>
                    </b></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 7px;padding-bottom: 3px;font-family:poppins">
                <p>Cliente: <b style="color:#444446;">
                        <?php print_r($encabezado[0]['nombre'].' '.$encabezado[0]['apellido']); ?>
                    </b></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 7px;padding-bottom: 3px;font-family:poppins">
                <p>Telefono: <b style="color:#444446;">
                <?php print_r($encabezado[0]['telefono']); ?>
                    </b></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 7px;padding-bottom: 3px;font-family:poppins">
                <p>Direccion: <b style="color:#444446;">
                <?php print_r($encabezado[0]['direccionenvio']); ?>
                    </b></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                <p>---------------------------------------------------------------------------</p>
            </td>
        </tr>
    </table>
    <table align="center" class="mt-2 "  style="width:90%;">
        <thead>
            <tr>
                <th  style="font-size:7px;padding-bottom: 5px;  font-family:poppins" scope="col">CANT </th>
                <th align="start" style="font-size:7px;padding-bottom: 5px;font-family:poppins" scope="col">CONCEPTO</th>
                <th  style="font-size:7px;padding-bottom: 5px; padding-rigth: 20px;font-family:poppins" scope="col">P.U.</th>
                <th  style="font-size:7px;padding-bottom: 5px;font-family:poppins" scope="col">IMPORTE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalle as $fila): ?>
                <tr>
                    <th style="font-size: 6px;font-family:poppins;color:#444446;">
                        <?php echo $fila['cantidad']; ?>
                    </th>
                    <th align="start" style="font-size: 6px;font-family:poppins;color:#444446;">
                    <?php echo $fila['nombre']; ?>
                    </th>
                    <th style="font-size: 6px;font-family:poppins;color:#444446;">Q.
                        <?php echo number_format($fila['precio'], 2, ".", ","); ?>
                    </th>
                    <th style="font-size: 6px;font-family:poppins;color:#444446;">Q.
                        <?php echo number_format($fila['subtotal'], 2, ".", ","); ?>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                <p>---------------------------------------------------------------------------</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 8px;padding-bottom: 5px;font-family:poppins">
                <p>Total: <b style="color:#444446;">
                <?php echo number_format($encabezado[0]['total'],1,".",",");?>
                    </b></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center">
                <p style="font-size: 6px;font-family:poppins;color:#444446;font-weight:bold;padding-top:50px"> ..::::::
                    Gracias por su Compra ::::::..</p>
                <p style="font-size: 4px;font-family:poppins;color:#444446;">https://tienda.com</p>
            </td>
        </tr>
    </table>
</body>

</html>