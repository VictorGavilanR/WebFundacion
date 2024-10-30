<?php

function connection() {
    $host = "localhost";
    $user = "fundac43_vitadbfundacion";
    $pass = "vidafundacion1234";
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