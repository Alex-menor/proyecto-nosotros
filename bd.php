<?php
$host = "localhost"; // o el host de tu base de datos
$dbname = "nuevaeradb"; // cambia esto
$username = "root"; // o tu usuario de la BD
$password = ""; // tu contraseña

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
