<?php
    include 'bancoCon.php';

    $curp = $_POST['curp'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];

    echo "curp: " . $curp . "<br>";
    echo "nombre: " . $nombre . "<br>";
    echo "apellido: " . $apellidos . "<br>";    

    $stmt = $con->prepare("INSERT INTO cliente (curp, nombre, apellidos) VALUES (?, ?, ?)");

if ($stmt === false){
    die("Error al preparar la consulta: " .$con->error);
}

$stmt->bind_param("sss", $curp, $nombre, $apellidos);

if($stmt->execute()){
echo "Nuevo registro creado correctamente con la CURP: " . $curp;
} else{
    echo "Error al ejecutar la consulta" . $stmt->error;
}
?>
<br><br>
<a href="index.php">Volver al Inicio</a>