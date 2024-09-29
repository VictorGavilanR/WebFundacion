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
            <a href="#" style="--i:5;">Donar</a>
        </nav>

        <div class="social-media">
            <a href="https://www.instagram.com/fundacionvitalosangeles/" target="_blank" style="--i:1;"><i class='bx bxl-instagram'></i></a>
            <a href="#" target="_blank" style="--i:2;"><i class='bx bxl-whatsapp'></i></a>
            <a href="#" target="_blank" style="--i:3;"><i class='bx bx-cart'></i></a>
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
    <h3 id="tercera-seccion"><span class="morado">Fundadora</span></h3>
    <div class="team-grid">
        <?php
        // Mostrar los usuarios con rol 'Directiva'
        while ($row = mysqli_fetch_assoc($resultDirectiva)) {
            // Crear la ruta a partir de la base de datos
            $imagePath = 'admin/' . $row['imagen'];

            // Mostrar el contenedor del miembro del equipo
            echo "<div class='team-member' onclick=\"openModal('" . $imagePath . "', '" . $row['nombre'] . "', '" . $row['profesion'] . "')\">";

            // Mostrar la imagen con la ruta correcta
            echo "<img src='" . $imagePath . "' alt='" . $row['nombre'] . "'>";

            // Mostrar el nombre y la profesión del usuario
            echo "<h3>" . $row['nombre'] . "</h3>";
            echo "<p>" . $row['profesion'] . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>





<div class="decoration"></div>
    <div class="container">
        <h3 id="tercera-seccion"><span class="morado">Equipo</span></h3>
        <div class="team-grid" id="teamGrid">
            <?php
            // Mostrar los usuarios con rol 'Directiva'
            while ($row = mysqli_fetch_assoc($resultEquipo)) {
                // Crear la ruta a partir de la base de datos
                $imagePath = 'admin/' . $row['imagen'];

                // Mostrar el contenedor del miembro del equipo
                echo "<div class='team-member' data-image='" . $imagePath . "' data-name='" . $row['nombre'] . "' data-profession='" . $row['profesion'] . "'>";

                // Mostrar la imagen con la ruta correcta
                echo "<img src='" . $imagePath . "' alt='" . $row['nombre'] . "'>";

                // Mostrar el nombre y la profesión del usuario
                echo "<h3>" . $row['nombre'] . "</h3>";
                echo "<p>" . $row['profesion'] . "</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <!-- Modal -->
    <div id="teamModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modalImage" src="" alt="">
            <h3 id="modalName"></h3>
            <p id="modalProfession"></p>
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
                <a href=""><i class='bx bxl-facebook'></i></a>
                <a href=""><i class='bx bxl-instagram' ></i></a>
                <a href=""><i class='bx bxl-tiktok' ></i></a>

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
            <h4>quick links</h4>
            <ul>
                <li><a href=""><i class='bx bx-chevron-right' ></i>privacy policy</a></li>
                <li><a href=""><i class='bx bx-chevron-right' ></i>terms & condition</a></li>
                <li><a href=""><i class='bx bx-chevron-right' ></i>disclame</a></li>
            </ul>
        </div>
        <div class="single-footer">
            <h4>Contáctanos</h4>
            <ul>
                <li><a href=""><i class='bx bx-map' ></i>Orompello #0120, Los Ángeles, Chile</a></li>
                <li><a href=""><i class='bx bx-mobile' ></i>+56 9 8244 0812</a></li>
                <li><a href=""><i class='bx bx-envelope' ></i>vita@gmail.com</a></li>
                <li><a href=""><i class='bx bx-globe' ></i>www.vita.com</a></li>
            </ul>
        </div>
    </div>
    <div class="copy"
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
