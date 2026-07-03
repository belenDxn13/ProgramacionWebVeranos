<?php
include 'bancoCon.php';

$id_cuenta = $_POST['id_cuenta'];
$monto = $_POST['monto'];
$curp = $_POST['curp'];

echo "ID Cuenta: " . $id_cuenta . "<br>";
echo "Monto: " . $monto . "<br>";
echo "CURP: " . $curp . "<br>";

$stmt = $con->prepare("INSERT INTO cuenta (id_cuenta, monto, curp) VALUES (?, ?, ?)");

if ($stmt === false){
    die("Error al preparar la consulta: " . $con->error);
}

// "sds" -> string para id_cuenta, double para monto, string para curp
$stmt->bind_param("sds", $id_cuenta, $monto, $curp);

if($stmt->execute()){
    echo "Nueva cuenta creada correctamente con el ID: " . $id_cuenta;
} else {
    echo "Error al ejecutar la consulta " . $stmt->error;
}
?>
<br><br>
<a href="index.php">Volver al Inicio</a>