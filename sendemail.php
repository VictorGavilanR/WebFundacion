<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validar los datos
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Correo de destino (tu correo)
        $to = "luismatiasmg07@gmail.com";  // Cambia a tu correo real aquí
        $subject = "Nuevo mensaje de contacto";

        // Encabezados del correo
        $headers = "From: $name <$email>\r\n";  
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Cuerpo del correo
        $body = "
            <html>
            <head>
                <title>$subject</title>
            </head>
            <body>
                <h2>Nuevo mensaje de contacto</h2>
                <p><strong>Nombre:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Mensaje:</strong> $message</p>
            </body>
            </html>
        ";

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "El correo ha sido enviado exitosamente.";
        } else {
            echo "Error al enviar el correo.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>