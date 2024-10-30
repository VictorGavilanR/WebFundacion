<?php
session_start();
include('connection.php');
$con = connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Consulta para verificar el usuario y contraseña
    $sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password' AND rol_id='1'"; // Asegúrate que '1' sea el rol de administrador
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php"); // Redirige al área de administración
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-container label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #666;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-container button {
            width: 100%;
            padding: 12px;
            background-color: #6a11cb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .login-container button:hover {
            background-color: #2575fc;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesi贸n</h2>
        <?php if (!empty($error)) { echo "<p class='error-message'>$error</p>"; } ?>
        <form action="login.php" method="POST">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contrase帽a:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Iniciar Sesi贸n</button>
        </form>
    </div>
</body>
</html>