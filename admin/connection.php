<?php

function connection() {
    $host = "localhost";
    $user = "fundac43_vitadbfundacion";
    $pass = "vidafundacion1234";
    $bd = "fundac43_user_crud_fundacion";

    // Crear conexión
    $connect = mysqli_connect($host, $user, $pass, $bd);

    // Verificar la conexión
    if (!$connect) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $connect;
}

?>