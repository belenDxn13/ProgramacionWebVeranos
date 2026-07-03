<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Cliente</title>
</head>
<body>
    <h2>Formulario de Registro de Clientes</h2>
    <form action="registroCliente.php" method="POST">
        <label>CURP:</label><br>
        <input type="text" name="curp" required><br><br>

        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" required><br><br>

        <input type="submit" value="Registrar Cliente">
    </form>
    <br>
    <a href="index.php">Volver al Inicio</a>
</body>
</html>