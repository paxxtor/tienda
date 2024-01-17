<!doctype html>
<html>
<head>
    <style>
        body{
            margin: 0;
            padding: 0;
            box-sizing: content-box;
        }

        @page {
        margin-top: 0cm;
        }
    </style>
</head>
<body>
    <table style="width:100%;">
        <tr>
            <td align="center">
                <img src="public/uploads/mayan.png" style="width:100px; " />
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center"><br>
                <p style="font-family:freesans;color:#000; text-align:center;font-size:14px;"><b>Tienda Mayan</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 9px;font-family:freesans">
                <p>Torre Pradera Xela, 7-62 zona 3 Quetzaltenango Noveno Nivel, Oficina 908.</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 10px;padding-bottom: 5px;font-family:freesans">
                <p>7930 4300</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 14px;font-family:freesans">
                <b>FACTURA ORIGINAL</b>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                <p style="font-size: 18px;font-family:freesans">----------------------------------------</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 10px;font-family:freesans">
                <p>Nit: <span style="color:#000;">
                <?php echo $encabezado[0]['nit'];  ?>
                    </b></span>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 10px;font-family:freesans">
                <p>No. Factura: <span style="color:#000;">
                <?php echo $encabezado[0]['id_encabezado'];  ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                 <p style="font-size: 18px;font-family:freesans">----------------------------------------</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 10px;padding-bottom: 3px;font-family:freesans">
                <p>Dirección: <span style="color:#000;">
                <?php print_r(date("d/m/Y", strtotime($encabezado[0]['fecha'])));  ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 10px;padding-bottom: 3px;font-family:freesans">
                <p>Cliente: <span style="color:#000;">
                        <?php print_r(strtoupper($encabezado[0]['nombre'].' '.$encabezado[0]['apellido'])); ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 10px;padding-bottom: 3px;font-family:freesans">
                <p>Teléfono: <span style="color:#000;">
                <?php print_r($encabezado[0]['telefono']); ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 10px;padding-bottom: 3px;font-family:freesans">
                <p>Dirección de Factuarción: <span style="color:#000;">
                <?php print_r($encabezado[0]['direccionfacturacion']); ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="center" style="font-size: 10px;padding-bottom: 3px;font-family:freesans">
                <p>Dirección de envío: <span style="color:#000;">
                <?php print_r($encabezado[0]['direccionenvio']); ?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                 <p style="font-size: 18px;font-family:freesans">----------------------------------------</p>
            </td>
        </tr>
    </table>
    <table align="center" class="mt-2 "  style="width:100%;">
        <thead>
            <tr>
                <th  style="font-size:6px;padding-bottom: 3px;  font-family:freesans; width:5%;" scope="col" >C </th>
                <th align="start" style="font-size:6px;padding-bottom: 3px;font-family:freesans; width:45%;">CONCEPTO</th>
                <th  style="font-size:6px;padding-bottom: 3px; padding-rigth: 20px;font-family:freesans; width:20%;" scope="col">P.U.</th>
                <th  style="font-size:6px;padding-bottom: 3px;font-family:freesans; width:20%;" scope="col">SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalle as $fila): ?>
                <tr>
                    <th style="font-size: 8px;font-family:freesans;color:#000; font-weight: normal; ">
                        <?php echo $fila['cantidad']; ?>
                    </th>
                    <th align="start"  style="font-size: 8px;font-family:freesans;color:#000; font-weight: normal;">
                    <?php echo $fila['nombre'];  ?>
                    </th>
                    <th style="font-size: 8px;font-family:freesans;color:#000; font-weight: normal;">
                        <?php echo number_format($fila['precio'], 2, ".", ","); ?>
                    </th>
                    <th style="font-size: 8px;font-family:freesans;color:#000; font-weight: normal;">
                        <?php echo number_format($fila['subtotal'], 2, ".", ","); ?>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <table style="width:100%;">
        <tr>
            <td >
                <p style="font-size: 18px;font-family:freesans">----------------------------------------</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
        <td align="right" style="font-size: 12px;padding-bottom: 5px;font-family:freesans; padding-right:10px; font-weight: bold;">
                <p>Total: <span style="color:#000;">
                <?php echo "Q. ".number_format($encabezado[0]['total'],2,".",",");?>
                    </span></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center">
                <p style="font-size: 11px;font-family:freesans;color:#000;padding-top:50px"> ..::::::
                    Gracias por su Compra ::::::..</p>
                <p style="font-size: 10px;font-family:freesans;color:#000;">https://tienda.com</p>
            </td>
        </tr>
    </table>
</body>

</html>