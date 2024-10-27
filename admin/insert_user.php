<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include('connection.php');
$con = connection();

$nombre = $_POST['nombre'];
$n_identificacion = $_POST['n_identificacion'];
$profesion = $_POST['profesion'];
$imagen = $_FILES['imagen']['name'];
$servicios = $_POST['servicios'];
$rol_id = $_POST['rol_id'];

// Subir la imagen al servidor
$target_dir = "uploads/";
$target_file = $target_dir . basename($imagen);
move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);

// Insertar usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre, n_identificacion, profesion, imagen, servicios, rol_id) 
        VALUES ('$nombre', '$n_identificacion', '$profesion', '$target_file', '$servicios', '$rol_id')";
$query = mysqli_query($con, $sql);

if ($query) {
    Header("Location: index.php");
} else {
    echo "Error al insertar usuario";
}
?>
