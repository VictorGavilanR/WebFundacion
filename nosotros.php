<?php
// Incluir el archivo que contiene la función de conexión
include 'admin/connection.php'; // Cambia 'ruta/al/archivo/connection.php' por la ruta correcta a tu archivo

// Llamar a la función para obtener la conexión
$conexion = connection();

// Verificar si la conexión se realizó correctamente
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
} else {
    echo "Conexión exitosa a la base de datos<br>";
}

// Consultas para obtener los usuarios por rol
$queryDirectiva = "SELECT * FROM usuarios WHERE rol_id = 1"; // Rol de Directiva (Fundadora)
$queryEquipo = "SELECT * FROM usuarios WHERE rol_id = 2"; // Rol de Equipo

// Ejecutar las consultas y verificar si se ejecutaron correctamente
$resultDirectiva = mysqli_query($conexion, $queryDirectiva);
if (!$resultDirectiva) {
    die("Error en la consulta Directiva: " . mysqli_error($conexion));
} else {
    echo "Consulta de Directiva ejecutada correctamente<br>";
}

$resultEquipo = mysqli_query($conexion, $queryEquipo);
if (!$resultEquipo) {
    die("Error en la consulta Equipo: " . mysqli_error($conexion));
} else {
    echo "Consulta de Equipo ejecutada correctamente<br>";
}

// Verificar si hay resultados y mostrarlos
if (mysqli_num_rows($resultDirectiva) > 0) {
    echo "Usuarios con rol 'Directiva' encontrados: " . mysqli_num_rows($resultDirectiva) . "<br>";
} else {
    echo "No se encontraron usuarios con rol 'Directiva'<br>";
}

if (mysqli_num_rows($resultEquipo) > 0) {
    echo "Usuarios con rol 'Equipo' encontrados: " . mysqli_num_rows($resultEquipo) . "<br>";
} else {
    echo "No se encontraron usuarios con rol 'Equipo'<br>";
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundación | Vita</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="/img/logo.png">

</head>
<body>

    <header class="header">
        <a href="index.html" class="logo">
            <img src="img/logo.png">
        </a>

        <nav class="navbar">
            <a href="index.html" style="--i:1;" class="active">Home</a>
            <a href="index.html#nosotros" style="--i:4;">Nosotros</a>
            <a href="index.html#galeria" style="--i:2;">Galería</a>
            <a href="index.html#contacto" style="--i:3;">Contacto</a>
            <a href="donar.html" style="--i:5;">Donar</a>
        </nav>

        <div class="social-media">
            <a href="https://www.instagram.com/fundacionvitalosangeles/" target="_blank" style="--i:1;"><i class='bx bxl-instagram'></i></a>
            <a href="https://wa.me/+56982440812" target="_blank" style="--i:2;"><i class='bx bxl-whatsapp'></i></a>
            <a href="https://www.tiktok.com/@Fundacion.vita" target="_blank" style="--i:3;"><i class='bx bxl-tiktok' ></i></a>
        </div>

        <div class="hamburger">
            <i class='bx bx-menu'></i>
        </div>
        <div class="close hidden">
            <i class='bx bx-x'></i>
        </div>
    </header>




        <!--IMAGEN NOSOTROS-->

    <div class="pagina-nosotros-img">
        <img src="img/2492244.jpg">
    </div>


    <!--TEXTO NOSOTROS-->
    <div class="pagina-nosotros-texto">
        <h4><span class="rosado">PROMOVEMOS LA INCLUSIÓN Y EL DESARROLLO INTEGRAL</span> DE PERSONAS <br>NEURODIVERGENTES A TRAVÉS DE SERVICIOS TERAPÉUTICOS Y ESPACIOS ARTÍSTICOS.</h4><hr class="pagina-nosotros-texto-hr">
    </div>


        <!--Section vision mision-->

    <div class="section-mision-vision">
        <div class="mision-vision">
                <img src="img/5.png" class="circulo-img">

            <div class="section-texto">
                <h2>Visión</h2>
                <hr>
                <p>Aspiramos a una sociedad inclusiva donde las personas neurodivergentes vivan plenamente, con acceso equitativo a oportunidades que valoren su diversidad y fomenten su bienestar integral.</p>
            </div>
        </div>
        <div class="mision-vision">
            <div class="circle">
                <img src="img/7.png" class="circulo-img">
            </div>
            <div class="section-texto">
                <h2>Misión</h2>
                <hr>
                <p>Promovemos acciones para mejorar la calidad de vida de las personas neurodivergentes mediante servicios terapéuticos y espacios formativos que fomentan su inclusión y participación comunitaria.</p>
            </div>
        </div>
        <div class="mision-vision">
            <div class="circle">
                <img src="img/6.png" class="circulo-img">
            </div>
            <div class="section-texto">
                <h2>Valores</h2>
                <hr>
                <p>
                    <li>Inclusión</li>
                    <li>Diversidad</li>
                    <li>Respeto</li>
                    <li>Equidad</li>
                    <li>Desarrollo integral</li>
                    <li>Colaboración</li>
                    <li>Anticapacitismo</li>
                </p>
            </div>
        </div>
    </div>
    <!-- Equipo -->
<div class="decoration"></div>
    <div class="container">
        <h3 id="inicio"><span class="morado">Equipo comprometido</span> con la inclusión y desarrollo de personas neurodivergentes.</h3>
    </div>


<!-- Sección Directiva/Fundadora -->
<div class="decoration"></div>
<div class="container">
    <h3 id="tercera-seccion"><span class="morado">Directiva</span></h3>
    <div class="team-grid">
        <?php
        while ($row = mysqli_fetch_assoc($resultDirectiva)) {
            // Escapar y formatear los datos para evitar problemas en el modal
            $nombre = addslashes($row['nombre']); // Escapar comillas simples
            $profesion = addslashes($row['profesion']); // Escapar comillas simples
            $servicios = addslashes($row['servicios']); // Escapar comillas simples
            $n_identificacion = addslashes($row['n_identificacion']); // Escapar comillas simples

            // Reemplazar saltos de línea con espacios para evitar problemas en el onclick
            $servicios = preg_replace('/\r|\n/', ' ', $servicios);

            // Definir la ruta de la imagen escapada
            $imagePath = 'admin/' . htmlspecialchars($row['imagen'], ENT_QUOTES, 'UTF-8');

            // Generar HTML con datos escapados y formateados
            echo "<div class='team-member' onclick=\"openModal('$imagePath', '$nombre', '$profesion', '$servicios', )\">";
            echo "<img src='$imagePath' alt='" . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') . "'>";
            echo "<h3>" . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') . "</h3>";
            echo "<p>" . htmlspecialchars($profesion, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "</div>"; // Cerrar el div 'team-member'
        }
        ?>
    </div>
</div>


    <div id="myModal" class="modal">
    <div class="modal-content">
        <i class='bx bx-x close-icon' onclick="closeModal()"></i>
        <img id="modalImage" src="" alt="Imagen del miembro del equipo">
        <div class="info">
            <h3 id="modalName"></h3>
            <br>
            <p id="modalProfession"></p>
            <br>
            <p id="modalServices"></p>
        </div>
    </div>
</div>



<div class="decoration"></div>
    <div class="container">
        <h3 id="tercera-seccion"><span class="morado">Equipo</span></h3>
        <div class="team-grid" id="teamGrid">
            <?php
            // Mostrar los usuarios con rol 'Directiva'
            while ($row = mysqli_fetch_assoc($resultEquipo)) {
              // Escapar y formatear los datos para evitar problemas en el modal
            $nombre = addslashes($row['nombre']); // Escapar comillas simples
            $profesion = addslashes($row['profesion']); // Escapar comillas simples
            $servicios = addslashes($row['servicios']); // Escapar comillas simples
            $n_identificacion = addslashes($row['n_identificacion']); // Escapar comillas simples

            // Reemplazar saltos de línea con espacios para evitar problemas en el onclick
            $servicios = preg_replace('/\r|\n/', ' ', $servicios);

            // Definir la ruta de la imagen escapada
            $imagePath = 'admin/' . htmlspecialchars($row['imagen'], ENT_QUOTES, 'UTF-8');

            // Generar HTML con datos escapados y formateados
            echo "<div class='team-member' onclick=\"openModal('$imagePath', '$nombre', '$profesion', '$servicios', )\">";
            echo "<img src='$imagePath' alt='" . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') . "'>";
            echo "<h3>" . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') . "</h3>";
            echo "<p>" . htmlspecialchars($profesion, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "</div>"; // Cerrar el div 'team-member'
        }
        ?>
        </div>
    </div>
    


    <!--Footer-->
    <footer class="footer-area">

    <div class="main">
        <div class="footer">
            <div class="single-footer">
                
                <h4>Fundación Vita</h4>
                <p>"Promoviendo la inclusión y el bienestar de todos"</p>
                <div class="footer-social">
                    <a href="https://www.instagram.com/fundacionvitalosangeles/"><i class='bx bxl-instagram' ></i></a>
                    <a href="https://wa.me/+56982440812" target="_blank" style="--i:2;"><i class='bx bxl-whatsapp'></i></a>
                    <a href="https://www.tiktok.com/@Fundacion.vita" target="_blank" style="--i:3;"><i class='bx bxl-tiktok' ></i></a>
    
                </div>
            </div>
        <div class="single-footer">
            <h4>Menú</h4>
            <ul>
                <li><a href="index.html"><i class='bx bx-chevron-right' ></i>Home</a></li>
                <li><a href="index.html#nosotros"><i class='bx bx-chevron-right' ></i>Nosotros</a></li>
                <li><a href="index.html#galeria"><i class='bx bx-chevron-right' ></i>Galería</a></li>
                <li><a href="index.html#contacto"><i class='bx bx-chevron-right' ></i>Contacto</a></li>
            </ul>
        </div>
        <div class="single-footer">
            <h4>Contáctanos</h4>
            <ul>
                <li><a   target="_blank" href="https://www.google.com/maps/place/Caupolicán+104,+2º+piso,+Los+Angeles,+Los+Ángeles,+Bío+Bío/data=!4m2!3m1!1s0x966bdd4ec1a6dabb:0x75545f0ec7ceb550?sa=X&ved=1t:242&ictx=111"> <i class='bx bx-map'  ></i>Caupolican #104 2º piso, Los Ángeles, Chile</a></li>
                <li><a href="index.html"><i target="_blank" class='bx bx-mobile' ></i>+56 9 8244 0812</a></li>
                <li><a href="mailto:vita@gmail.com" target="_blank"><i class='bx bx-envelope'></i> vita@gmail.com</a></li>
                <li><a href="#menu"><i class='bx bx-globe' ></i> www.vita.com</a></li>
            </ul>
        </div>
    </div>
    <div class="copy">
    <p>&copy; 2024 todos los derechos reservados</p>
</div>
</footer>


<!-- Botón flotante para abrir el menú de accesibilidad -->
<div class="accessibility-button" onclick="toggleAccessibilityMenu()">
  <i class='bx bx-universal-access' style='color:#ffffff'></i>
</div>

<!-- Menú de accesibilidad -->
<div class="accessibility-menu" id="accessibility-menu">
  <div class="close-button" onclick="toggleAccessibilityMenu()"><i class='bx bx-x'></i></div>
  <div class="menu-options">
    <div class="option">
      <button onclick="adjustTextSize('increase')">A+</button>
      <p>Agrandar</p>
    </div>
    <div class="option">
      <button onclick="adjustTextSize('decrease')">A-</button>
      <p>Disminuir</p>
    </div>
    <div class="option">
      <button onclick="toggleContrast()"><i class='bx bxs-paint'></i></button>
      <p>Contraste</p>
    </div>
    <div class="option">
      <button onclick="highlightInteractiveElements()"><i class='bx bx-highlight'></i></button>
      <p>Resaltar</p>
    </div>
    <div class="option">
      <button onclick="activateReading()"><i class='bx bx-volume-full'></i></button>
      <p>Audio Lectura</p>
    </div>
  </div>
</div>

<script src="script.js"></script>


<!-- Cerrar correctamente la etiqueta 'body' -->
</body>
