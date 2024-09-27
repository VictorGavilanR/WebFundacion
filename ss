        <?php
        // Recorremos cada fila obtenida de la consulta
        while ($row = mysqli_fetch_assoc($query)) {
            // Asignamos cada campo a una variable para simplificar el acceso
            $id = $row['id'];
            $nombres = $row['nombres'];
            $apellido = $row['apellido'];
            $profesion = $row['profesion'];
            $imagen = $row['imagen']; // La ruta de la imagen debe ser relativa a la carpeta "uploads"
            $servicios = $row['servicios'];

            // Generamos la ruta completa a la imagen
            $imagen_url = "admin/" . $imagen;

            
            // Generamos el bloque HTML para cada miembro del equipo
            ?>