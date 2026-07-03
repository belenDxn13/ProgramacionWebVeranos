<?php
include 'bancoCon.php';

// 1. Recibir la CURP enviada desde el formulario
$curp = $_POST['curp'];

// 2. Cambiar la consulta para traer los datos del cliente y sus cuentas usando un INNER JOIN filtrado por CURP
$sql = "SELECT cliente.curp, cliente.nombre, cliente.apellidos, cuenta.id_cuenta, cuenta.monto 
        FROM cliente 
        INNER JOIN cuenta ON cliente.curp = cuenta.curp 
        WHERE cliente.curp = ?";

$stmt = $con->prepare($sql);

if ($stmt === false) {
    die("Error en la consulta: " . $con->error);
}

// 3. Unir el parámetro de la CURP
$stmt->bind_param("s", $curp);
$stmt->execute();

// 4. Obtener el resultado de la consulta preparada
$rConsultaCl = $stmt->get_result();

// Verificar si devolvió resultados
if ($rConsultaCl->num_rows === 0) {
    echo "No se encontraron cuentas registradas para la CURP ingresada.";
} else {
    // Recorrer los resultados y mostrarlos
    ?>
    <table border="1">
        <tr>
            <th>CURP</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Número de Cuenta</th>
            <th>Monto</th>
        </tr>
        
        <?php
        while ($row = $rConsultaCl->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row["curp"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["apellidos"]; ?></td>
                <td><?php echo $row["id_cuenta"]; ?></td>
                <td>$<?php echo $row["monto"]; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}

$stmt->close();
?>

<br><br>
<a href="index.php">Volver al Inicio</a>