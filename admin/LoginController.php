
<?php
session_start();
class LoginController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($username, $password) {
        $query = "SELECT * FROM admins WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    return true;
                } else {
                    return false;  // Contraseña incorrecta
                }
            } else {
                return false;  // Usuario no encontrado
            }
        }
    }
}
?>