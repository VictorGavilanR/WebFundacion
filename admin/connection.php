<?php

function connection() {
    $host = "localhost";
    $user = "fundac43_vitadbfundacion";
    $pass = "vidafundacion1234";
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