<?php

include('connection.php');
$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Vinculando correctamente el archivo CSS -->
    <link href="admin.css" rel="stylesheet">
</head>
<body>
    <!-- Sección de formulario de equipo -->
    <div class="team-form">
        <h2>Crear Usuario</h2>
        <form action="insert_user.php" method="POST" enctype="multipart/form-data">
            <label for="name">Nombres:</label>
            <input type="text" id="nombres" name="nombres" placeholder="Ingrese Nombes" required>

            <label for="name">Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Ingrese Apellido" required>

            <label for="profession">Profesión:</label>
            <input type="text" id="profesion" name="profesion" placeholder="Profesión del miembro" required>
            
            <label for="team-image">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>

            <label for="services">Servicios:</label>
            <textarea id="servicios" name="servicios" placeholder="Servicios que ofrece" required></textarea>



            <input type="submit" value="Agregar Usuario">
        </form>
    </div>

    <!-- Sección de la tabla de usuarios -->
    <div class="users-table">
        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellido</th>
                    <th>Profesion</th>
                    <th>Imagen</th>
                    <th>Servicios</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)):?>
                <tr>
                    <th><?= $row['id'] ?></th>
                    <th><?= $row['nombres'] ?></th>
                    <th><?= $row['apellido'] ?></th>
                    <th><?= $row['profesion'] ?></th>
                    <th><?= $row['imagen'] ?></th>
                    <th><?= $row['servicios'] ?></th>



                    <th><a href="update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th>

                    <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete">Eliminar</a></th>
                    </tr>
                    <?php endwhile; ?>

            </tbody>
        </table>
    </div>
</body>
</html>
