<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
// Conectar a la base de datos
include('connection.php');
$con = connection();

// Obtener el ID del usuario a editar desde la URL
$id = $_GET['id'] ?? null;

// Verificar si el ID está presente
if (!$id) {
    header("Location: index.php");
    exit();
}

// Consulta para obtener los datos del usuario con el ID recibido
$sql = "SELECT * FROM usuarios WHERE id='$id'";
$query = mysqli_query($con, $sql);
$user = mysqli_fetch_array($query);

// Verificar si se encontró el usuario
if (!$user) {
    die("Usuario no encontrado");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="admin.css" rel="stylesheet">
</head>
<body>
    <!-- Sección de formulario para editar el usuario -->
    <div class="team-form">
        <h2>Editar Usuario</h2>
        <form action="update.php" method="POST" enctype="multipart/form-data">
            <!-- Campo oculto para enviar el ID del usuario a actualizar -->
            <input type="hidden" name="id" value="<?= $user['id'] ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $user['nombre'] ?>" required>

            <label for="n_identificacion">N° Identificación:</label>
            <input type="text" id="n_identificacion" name="n_identificacion" value="<?= $user['n_identificacion'] ?>" >

            <label for="profesion">Profesión:</label>
            <input type="text" id="profesion" name="profesion" value="<?= $user['profesion'] ?>" required>
            
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">
            <br>
            <!-- Mostrar la imagen actual -->
            <img src="<?= $user['imagen'] ?>" alt="<?= $user['nombre'] ?>" width="100"><br>

            <label for="servicios">Servicios:</label>
            <textarea id="servicios" name="servicios" required><?= $user['servicios'] ?></textarea>
            
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

                // Generar opciones de roles
                while ($role = mysqli_fetch_array($roles_result)) {
                    $selected = $user['rol_id'] == $role['id'] ? 'selected' : '';
                    echo "<option value='" . $role['id'] . "' $selected>" . $role['nombre'] . "</option>";
                }
                ?>
            </select>

            <input type="submit" value="Actualizar Usuario">
        </form>
    </div>
</body>
</html>
