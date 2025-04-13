<?php
require 'bd.php';

if (!isset($_GET['token']) || !isset($_GET['correo'])) {
    die('Token no válido.');
}

$token = $_GET['token'];
$correo = $_GET['correo'];

$stmt = $pdo->prepare("SELECT * FROM usuario WHERE usu_token = :token AND usu_correo = :correo");
$stmt->execute(['token' => $token, 'correo' => $correo]);
$usuario = $stmt->fetch();

if (!$usuario) {
    die('Token inválido.');
}

// Verificar expiración
if (strtotime($usuario['usu_token_expira']) < time()) {
    die('El token ha expirado. Solicita otro enlace.');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva contraseña</title>
</head>
<body>
    <h2>Establecer nueva contraseña para <?php echo htmlspecialchars($usuario['usu_id']); ?></h2>
    <form action="guardar_nueva_contraseña.php" method="POST">
        <input type="hidden" name="correo" value="<?php echo htmlspecialchars($correo); ?>">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <input type="password" name="nueva_pass" placeholder="Nueva contraseña" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
