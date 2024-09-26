<?php
include('connection.php');
$con = connection();


$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellido = $_POST['apellido'];
$profesion = $_POST['profesion'];
$servicios = $_POST['servicios'];
$imagen = $_FILES['imagen'];


$sql = "UPDATE users SET nombres='$nombres', apellido='$apellido', profesion='$profesion', servicios='$servicios', imagen='$imagen' WHERE id='$id'"; 
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
};

?>