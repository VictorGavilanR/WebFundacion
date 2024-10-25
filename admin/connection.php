<?php

function connection(){
    $host = "localhost:3307";
    $user = "root";
    $pass = "";
    $bd = "fundac43_user_crud_fundacion";

    $connect = mysqli_connect($host, $user, $pass, );

    mysqli_select_db($connect, $bd);

    return $connect;
};

?>