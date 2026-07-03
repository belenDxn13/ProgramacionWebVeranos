<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Cuenta</title>
</head>
<body>
    <h2>Formulario de Registro de Cuentas</h2>
    <form action="registroCuenta.php" method="POST">
        <label>ID Cuenta:</label><br>
        <input type="text" name="id_cuenta" required><br><br>

        <label>Monto:</label><br>
        <input type="number" step="0.01" name="monto" required><br><br>

        <label>CURP del Cliente:</label><br>
        <input type="text" name="curp" required><br><br>

        <input type="submit" value="Registrar Cuenta">
    </form>
    <br>
    <a href="index.php">Volver al Inicio</a>
</body>
</html>