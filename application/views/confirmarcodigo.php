<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de código</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.css">

<body>
    <h1>Verificar tu cuenta</h1>
    <?php if ($this->session->flashdata("Error") == "1"): ?>
        <div class="alert alert-danger">
            Codigo invalido
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata("alerta") == "1"): ?>
        <div class="alert alert-success">
            Se ha enviado el codigo correctamente.
        </div>
    <?php endif; ?>

    <form action="<?php echo base_url(); ?>login/validarcuenta/verificar" method="post">

        <div class="code-input-container">
            <label for="code">Ingresa tu código:</label>
            <input autocomplete="off" type="text" name='codigo'>
        </div>
        <button class="btn btn-primary mt-3" id="validate-button">Verificar</button>
        <a class="btn btn-warning mt-3" href="<?php echo base_url();?>login/enviarcodigo"><i class="bi bi-arrow-clockwise"></i>Volver a enviar el codigo</a>
    </form>

    <div id="validation-results"></div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>