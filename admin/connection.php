<?php

function connection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "fundac43_user_crud_fundacion";

    // Crear conexiиоn
    $connect = mysqli_connect($host, $user, $pass, $bd);

    // Verificar la conexiиоn
    if (!$connect) {
        die("Error de conexiиоn: " . mysqli_connect_error());
    }

    return $connect;
}

?>