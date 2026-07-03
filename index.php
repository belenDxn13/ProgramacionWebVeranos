<?php
include 'bancoCon.php';

// Consulta para unir las cuentas con sus respectivos clientes
$rConsultaCl = $con->query("SELECT cuenta.id_cuenta, cuenta.monto, cliente.nombre, cliente.apellidos, cuenta.curp 
                            FROM cuenta 
                            INNER JOIN cliente ON cuenta.curp = cliente.curp");

if ($rConsultaCl === false) {
    die("Error en la consulta: " . $con->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BancoLatte</title>
</head>
<body>
    <h1>Bienvenidos a BancoLatte <span>Tu banco y café favorito</span></h1>

    <nav>
        <a href="insertCliente.php">[ Registrar Cliente ]</a> | 
        <a href="insertCuenta.php">[ Registrar Cuenta ]</a>
    </nav>

    <br><br>
    <form action="consultaCl.php" method="POST">
    <label for="curp"><strong>Consultar mi Cuenta (Ingresa tu CURP):</strong></label>
    <input type="text" id="curp" name="curp" placeholder="Ej. 1ABC2" required>
    <input type="submit" value="Buscar">
    </form>
    <br>

    <h2>Clientes con acceso a sus cuentas</h2>

    <?php if ($rConsultaCl->num_rows === 0) {
        echo "No se encontraron resultados.";
    } else { ?>

        <table border="1">
            <tr>
                <th>ID Cuenta</th>
                <th>Monto</th>
                <th>Nombre del Cliente</th>
                <th>CURP</th>
            </tr>

            <?php while ($fila = $rConsultaCl->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $fila["id_cuenta"]; ?></td>
                    <td><?php echo $fila["monto"]; ?></td>
                    <td><?php echo $fila["nombre"] . " " . $fila["apellidos"]; ?></td>
                    <td><?php echo $fila["curp"]; ?></td>
                </tr>
            <?php } ?>
        </table>

    <?php } ?>
</body>
</html>