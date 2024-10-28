<?php
$password = 'adminvita335';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo "Hash de la contraseña: " . $hash;
?>