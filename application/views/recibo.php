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
                <p style="font-family:poppins;color:#444446; text-align:center;font-size:11px"><b>CONSULTA DE
                        DISPOSITIVOS ROBADOS</p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 8px;padding-bottom: 30px;font-family:poppins">
                <p>Resultados para el IMEI: <b style="color:#444446;">
                        <!-- <?php echo $imei; ?>. -->
                    </b></p>
            </td>
        </tr>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center" style="font-size: 8px;padding-bottom: 30px;font-family:poppins">
                <p>Cliente: <b style="color:#444446;">
                        <?php print_r($encabezado[0]['nombre'].' '.$encabezado[0]['apellido']); ?>.
                    </b></p>
            </td>
            <td align="center" style="font-size: 8px;padding-bottom: 30px;font-family:poppins">
                <p>Direccion: <b style="color:#444446;">
                <?php print_r($encabezado[0]['direccionenvio']); ?>.
                    </b></p>
            </td>
        </tr>
    </table>

    <table class="mt-2 "  style="width:100%;">
        <thead>
            <tr>
                <th align="center" style="font-size:7px;padding-bottom: 30px;font-family:poppins" scope="col">Producto</th>
                <th align="center" style="font-size:7px;padding-bottom: 30px;font-family:poppins" scope="col">Precio</th>
                <th align="center" style="font-size:7px;padding-bottom: 30px;font-family:poppins" scope="col">Cantidad </th>
                <th align="center" style="font-size:7px;padding-bottom: 30px;font-family:poppins" scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalle as $fila): ?>
                <tr>
                    <th align="left" style="font-size:7px;padding-bottom: 30px;font-family:poppins">
                    <?php echo $fila['nombre']; ?>
                    </th>
                    <th align="left" style="font-size:7px;padding-bottom: 30px;font-family:poppins">Q.
                        <?php echo number_format($fila['precio'], 2, ".", ","); ?>
                    </th>
                    <th align="left" style="font-size:7px;padding-bottom: 30px;font-family:poppins col-3">
                        <?php echo $fila['cantidad']; ?>
                    </th>
                    <th align="left" style="font-size:7px;padding-bottom: 30px;font-family:poppins">Q.
                        <?php echo number_format($fila['subtotal'], 2, ".", ","); ?>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <table style="width:100%;">
        <tr>
            <td align="center">
                <p style="font-size: 6px;font-family:poppins;color:#444446;font-weight:bold;padding-top:50px"> ..::::::
                    Gracias por utilizar GSM.Tools ::::::..</p>
                <p style="font-size: 4px;font-family:poppins;color:#444446;">https://gsm.tools/</p>
            </td>
        </tr>
    </table>
</body>

</html>