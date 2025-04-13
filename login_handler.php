<?php
session_start();
require_once "bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usu_id'];
    $password = $_POST['usu_pass'];

    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE usu_id = :usuario");
    $stmt->execute(['usuario' => $usuario]);
    $user = $stmt->fetch();

    if ($user && $password === $user['usu_pass']) {
        $_SESSION['usuario'] = $user['usu_id'];

        // Aquí generamos el código HTML con el script SweetAlert2 para mostrar el mensaje de éxito
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <title>Login Exitoso</title>
        </head>
        <body>
            <script>
              Swal.fire({
    title: 'Cargando...',
    icon: 'info',
    showConfirmButton: false,
    didOpen: () => {
        Swal.showLoading();
    },
    width: '330px', // Establece el tamaño del cuadro de alerta
    padding: '24px', // Ajusta el padding para hacer la alerta más compacta
    heightAuto: false // Evita que la altura del modal se ajuste automáticamente
}).then(() => {
    window.location.href = 'main.php'; // Redirigir a la página principal
});


                // Es importante colocar la redirección en un setTimeout por si el alert necesita tiempo para mostrarse.
                setTimeout(function() {
                    window.location.href = 'main.php'; // Redirigir a la página principal después de 2 segundos
                }, 2000); // Puedes ajustar el tiempo según sea necesario
            </script>
        </body>
        </html>
        ";
        exit(); // Detiene la ejecución del script para que no se siga procesando.
    } else {
        // Si las credenciales son incorrectas, se muestra el mensaje de error
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <title>Error de Login</title>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Datos incorrectos',
                    text: 'El usuario o la contraseña son incorrectos.',
                    confirmButtonText: 'Intentar de nuevo'
                }).then(() => {
                    window.location.href = 'index.php'; // Redirigir al formulario de login
                });
            </script>
        </body>
        </html>
        ";
        exit(); // Detiene la ejecución para que no siga procesando.
    }
}
?>
