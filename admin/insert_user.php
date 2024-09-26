<?php
// Incluye el archivo de conexión
include('connection.php');
$con = connection();

// Recibir los datos del formulario
$nombres = $_POST['nombres'];
$apellido = $_POST['apellido'];
$profesion = $_POST['profesion'];
$servicios = $_POST['servicios'];

// Manejar la imagen subida
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    // Configura el directorio donde se subirá la imagen
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_temporal = $_FILES['imagen']['tmp_name'];
    $imagen_destino = 'uploads/' . $imagen_nombre;  // Directorio donde guardarás la imagen
    
    // Verifica si el directorio existe y mueve la imagen al directorio de destino
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);  // Crea el directorio si no existe
    }

    // Mueve el archivo
    if (move_uploaded_file($imagen_temporal, $imagen_destino)) {
        // Si se subió correctamente, guarda la ruta de la imagen
        $imagen = $imagen_destino;
    } else {
        // Si no se pudo mover la imagen, muestra un error
        die("Error al subir la imagen.");
    }
} else {
    // Si no se subió ninguna imagen o hubo un error, puedes manejar el error aquí
    die("Error al procesar la imagen.");
}

// Inserta los datos en la base de datos
$sql = "INSERT INTO users (id, nombres, apellido, profesion, imagen, servicios) 
        VALUES (NULL, '$nombres', '$apellido', '$profesion', '$imagen', '$servicios')";

$query = mysqli_query($con, $sql);

if ($query) {
    // Redirecciona a la página principal si todo va bien
    header("Location: index.php");
} else {
    // Muestra un error si la consulta falla
    die("Error al insertar los datos.");
}

?>
