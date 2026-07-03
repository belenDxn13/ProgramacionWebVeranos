<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'registrobancario';

    //
    $con = new mysqli($host, $user, $pass, $database);

    if ($con->connect_error){
        die("Conexion fallida: " . $con->connect_error);
    }

    $con->set_charset("utf8mb4");

echo "Concected successfully";

?>