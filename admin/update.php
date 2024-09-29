<?php
// Conexión a la base de datos
include('connection.php');
$con = connection();

// Obtener los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$n_identificacion = $_POST['n_identificacion'];
$profesion = $_POST['profesion'];
$servicios = $_POST['servicios'];
$rol_id = $_POST['rol_id'];

// Manejo de la imagen
$imagen = $_FILES['imagen']['name'];

// Asegúrate de que $target_dir apunte siempre a la carpeta 'uploads' en la raíz de tu proyecto
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/"; // Esto apunta a la carpeta 'uploads' en la raíz de tu proyecto
$target_file = $target_dir . basename($imagen);

// Verificar si se subió una nueva imagen
if ($imagen) {
    // Mover la nueva imagen a la carpeta de destino
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file)) {
        // Guardar solo la ruta relativa para almacenar en la base de datos
        $relative_path = "uploads/" . basename($imagen);

        // Actualizar consulta con la nueva imagen (ruta relativa)
        $sql = "UPDATE usuarios SET nombre='$nombre', n_identificacion='$n_identificacion', profesion='$profesion', servicios='$servicios', imagen='$relative_path', rol_id='$rol_id' WHERE id='$id'";
    } else {
        die("Error al subir la imagen");
    }
} else {
    // Consulta SQL sin cambiar la imagen
    $sql = "UPDATE usuarios SET nombre='$nombre', n_identificacion='$n_identificacion', profesion='$profesion', servicios='$servicios', rol_id='$rol_id' WHERE id='$id'";
}

// Ejecutar la consulta
$query = mysqli_query($con, $sql);

// Verificar si la consulta fue exitosa
if ($query) {
    // Redirigir a la página de lista de usuarios
    header("Location: index.php");
} else {
    die("Error en la actualización: " . mysqli_error($con));
}
?>

