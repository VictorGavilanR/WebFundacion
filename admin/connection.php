<?php

function connection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $bd = "fundac43_user_crud_fundacion";

    // Crear conexi��n
    $connect = mysqli_connect($host, $user, $pass, $bd);

    // Verificar la conexi��n
    if (!$connect) {
        die("Error de conexi��n: " . mysqli_connect_error());
    }

    return $connect;
}

?>