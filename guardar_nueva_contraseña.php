<?php
require 'bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $token = $_POST['token'];
    $nueva_pass = $_POST['nueva_pass'] ;

    // Verificar token y correo
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE usu_correo = :correo AND usu_token = :token");
    $stmt->execute(['correo' => $correo, 'token' => $token]);
    $user = $stmt->fetch();

    if ($user && strtotime($user['usu_token_expira']) > time()) {
        // Actualizar contraseña
        $update = $pdo->prepare("UPDATE usuario SET usu_pass = :nueva_pass, usu_token = NULL, usu_token_expira = NULL WHERE usu_correo = :correo");
        $update->execute([
            'nueva_pass' => $nueva_pass,
            'correo' => $correo
        ]);
        echo "Contraseña actualizada correctamente.";
    } else {
        echo "Token inválido o expirado.";
    }
}
?>
