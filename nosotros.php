<?php
include('admin/connection.php'); // Asegúrate de que la ruta sea correcta
$con = connection();

// Consulta para obtener la información de los usuarios
$sql = "SELECT * FROM users"; // Cambia "users" por la tabla que necesites
$query = mysqli_query($con, $sql);

// Verificar conexión
if ($con->connect_error) {
    die("Conexión fallida: " . $con->connect_error);
} else {
    echo "Conexión exitosa a la base de datos.";
}


// Consultar los registros de la tabla 'users'
$sql = "SELECT id, nombres, apellido, profesion, imagen, servicios FROM users";
$result = $con->query($sql);

if (!$result) {
    die("Error en la consulta: " . $con->error);
}
//muestra errores
error_reporting(E_ALL);
ini_set('display_errors', 1);
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



<!-- Nueva Sección -->
<div class="decoration"></div>
<div class="container">
    <h3 id="nueva-seccion"><span class="morado">Fundadora</h3>
    <div class="team-grid">
        <div class="team-member" onclick="openModal('fotos fundacion/miembro1.jpg', 'Miembro 1', 'Información detallada de Miembro 1...')">
            <img src="fotos fundacion/miembro1.jpg" alt="Miembro 1">
            <h3>Miembro 1</h3>
            <p>Texto</p>
        </div>
    </div>
</div>


<!-- Tercera Sección -->
<div class="decoration"></div>
<div class="container">
    <h3 id="tercera-seccion"><span class="morado">Directorio</h3>
    <div class="team-grid">
        <div class="team-member" onclick="openModal('fotos fundacion/miembro7.jpg', 'Miembro 7', 'Información detallada de Miembro 7...')">
            <img src="fotos fundacion/miembro7.jpg" alt="Miembro 7">
            <h3>Miembro 7</h3>
            <p>Texto</p>
        </div>
    </div>
</div>

<div class="decoration"></div>
<div class="container">
    <h3 id="tercera-seccion"><span class="morado">Equipo</h3>
    <div class="team-grid">
        <div class="team-member" onclick="openModal('fotos fundacion/miembro7.jpg', 'Miembro 7', 'Información detallada de Miembro 7...')">
            <img src="fotos fundacion/miembro7.jpg" alt="Miembro 7">
            <h3>Miembro 7</h3>
            <p>Texto</p>
        </div>
    </div>
</div>


    <!--Footer-->
    <footer class="footer-area">
    <div class="main">
        <div class="footer">
            <div class="single-footer">
                <h4>About Us</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, adipisci alias non laboriosam deserunt reprehenderit provident ab earum vero tempore dolorem facere eveniet fugit quo sequi magnam necessitatibus sapiente magni.</p>
                <div class="footer-social">
                    <a href=""><i class='bx bxl-facebook'></i></a>
                    <a href=""><i class='bx bxl-instagram'></i></a>
                    <a href=""><i class='bx bxl-tiktok'></i></a>
                </div>
            </div>
            <div class="single-footer">
                <h4>Main Menu</h4>
                <ul>
                    <li><a href=""><i class='bx bx-chevron-right'></i>Home</a></li>
                    <li><a href=""><i class='bx bx-chevron-right'></i>Nosotros</a></li>
                    <li><a href=""><i class='bx bx-chevron-right'></i>Galería</a></li>
                    <li><a href=""><i class='bx bx-chevron-right'></i>Contacto</a></li>
                </ul>
            </div>
            <div class="single-footer">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href=""><i class='bx bx-chevron-right'></i>Privacy Policy</a></li>
                    <li><a href=""><i class='bx bx-chevron-right'></i>Terms & Condition</a></li>
                    <li><a href=""><i class='bx bx-chevron-right'></i>Disclaimer</a></li>
                </ul>
            </div>
            <div class="single-footer">
                <h4>Contact Us</h4>
                <ul>
                    <li><a href=""><i class='bx bx-map'></i> Dirección #3432</a></li>
                    <li><a href=""><i class='bx bx-mobile'></i> +56999999</a></li>
                    <li><a href=""><i class='bx bx-envelope'></i> vita@gmail.com</a></li>
                    <li><a href=""><i class='bx bx-globe'></i> www.vita.com</a></li>
                </ul>
            </div>
        </div>
        <!-- Cerrar correctamente la etiqueta 'div.copy' -->
        <div class="copy">
            <p>&copy; 2024 Todos los derechos reservados</p>
        </div>
    </div>
</footer>

<!-- Cerrar correctamente la etiqueta 'body' -->
</body>
