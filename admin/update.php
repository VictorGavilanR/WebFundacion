<?php

include('connection.php');
$con = connection();

$id=$_GET['id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <!-- Vinculando correctamente el archivo CSS -->
    <link href="admin.css" rel="stylesheet">
</head>
<body>
    <!-- Sección de formulario de equipo -->
    <div class="team-form">
        <h2>Editar Usuario</h2>
        <form action="edit_user.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $row['id']?>">

            <label for="name">Nombre:</label>
            <input type="text"  name="nombres" placeholder="Nombre del miembro" value="<?= $row['nombres']?>" required>

            <label for="name">Apellido:</label>
            <input type="text"  name="apellido" placeholder="Ingrese Apellido" value="<?= $row['apellido']?> " required>

            <label for="profession">Profesión:</label>
            <input type="text"  name="profesion" placeholder="Profesión del miembro" value="<?= $row['profesion']?>" required>

            <label for="team-image">Imagen:</label>
            <input type="file"  name="imagen" accept="image/*" value="<?= $row['imagen']?>" required>

            <label for="services">Servicios:</label>
            <textarea name="servicios" placeholder="Servicios que ofrece" value="<?= $row['servicios']?>" required></textarea>



            <input type="submit" value="Actualizar Usuario">
        </form>
    </div>