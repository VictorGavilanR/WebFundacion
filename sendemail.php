<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar archivos de PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    // Validar que todos los campos estén presentes
    if (empty($name) || empty($email) || empty($message)) {
        die("Por favor completa todos los campos.");
    }

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contactofundacionvita@gmail.com'; // poner correo
        $mail->Password = 'jwnjxwojpnlcrdnv'; //  contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Configurar UTF-8 para caracteres especiales
        $mail->CharSet = 'UTF-8';

        // Configurar el correo
        $mail->setFrom($email, $name); // Quien envía el correo
        $mail->addAddress('contactofundacionvita@gmail.com'); // Destinatario

        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje desde el formulario de contacto Vita';
        $mail->Body = "
            <h1>Nuevo mensaje recibido</h1>
            <p><strong>Nombre:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Mensaje:</strong></p>
            <p>{$message}</p>
        ";

        // Enviar correo
        $mail->send();
        echo "Correo enviado correctamente.";
    } catch (Exception $e) {
        echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>