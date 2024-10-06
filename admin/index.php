<?php
// Conectar a la base de datos
include('connection.php');
$con = connection();

// Consulta SQL para obtener usuarios con su rol correspondiente
$sql = "SELECT usuarios.id, usuarios.nombre, usuarios.profesion, usuarios.servicios, usuarios.imagen, usuarios.n_identificacion, roles.nombre AS rol
        FROM usuarios 
        JOIN roles ON usuarios.rol_id = roles.id";
$query = mysqli_query($con, $sql);

// Verifica si la consulta fue exitosa
if (!$query) {
    // Muestra un mensaje de error si la consulta falla
    die("Error en la consulta: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="admin.css" rel="stylesheet">
</head>
<body>
    <!-- Sección de formulario de equipo -->
    <div class="team-form">
        <h2>Crear Usuario</h2>
        <form action="insert_user.php" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese Nombre" required>

            <label for="n_identificacion">N° Identificación:</label>
            <input type="text" id="n_identificacion" name="n_identificacion" placeholder="Ingrese número de identificación" >

            <label for="profesion">Profesión:</label>
            <input type="text" id="profesion" name="profesion" placeholder="Profesión del miembro" required>
            
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>

            <label for="servicios">Servicios:</label>
            <textarea id="servicios" name="servicios" placeholder="Servicios que ofrece" required></textarea>
            
            <label for="rol_id">Rol:</label>
            <select id="rol_id" name="rol_id" required>
                <?php
                // Consulta para obtener todos los roles
                $roles_query = "SELECT * FROM roles";
                $roles_result = mysqli_query($con, $roles_query);
                
                // Verifica si la consulta fue exitosa
                if (!$roles_result) {
                    die("Error en la consulta de roles: " . mysqli_error($con));
                }
                
                while ($role = mysqli_fetch_array($roles_result)) {
                    echo "<option value='" . $role['id'] . "'>" . $role['nombre'] . "</option>";
                }
                ?>
            </select>

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
                    <th>Nombre</th>
                    <th>N° Identificación</th>
                    <th>Profesión</th>
                    <th>Imagen</th>
                    <th>Servicios</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['n_identificacion'] ?></td>
                    <td><?= $row['profesion'] ?></td>
                    <td><img src="<?= $row['imagen'] ?>" alt="<?= $row['nombre'] ?>" width="50"></td>
                    <td><?= $row['servicios'] ?></td>
                    <td><?= $row['rol'] ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a>
                        <a href="delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete">Eliminar</a>
                        </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
