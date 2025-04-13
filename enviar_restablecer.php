<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Requiere los archivos de PHPMailer
require 'envio_corres/PHPMailer/Exception.php';
require 'envio_corres/PHPMailer/PHPMailer.php';
require 'envio_corres/PHPMailer/SMTP.php';

// Conexión a base de datos
require_once "bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];

    // Verifica si el correo existe
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE usu_correo = :correo");
    $stmt->execute(['correo' => $correo]);
    $user = $stmt->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(20));
        $expira = date("Y-m-d H:i:s", strtotime('+30 minutes'));

        $update = $pdo->prepare("UPDATE usuario SET usu_token = :token, usu_token_expira = :expira WHERE usu_correo = :correo");
        $update->execute([
            'token' => $token,
            'expira' => $expira,
            'correo' => $correo
        ]);

        $reset_link = "http://localhost/JS/nueva_contraseña.php?token=$token&correo=" . urlencode($correo);

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'dominguezalex287@gmail.com';
            $mail->Password   = 'onqy vzup thhr aoyt';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('dominguezalex287@gmail.com', 'Soporte');
            $mail->addAddress($correo, $user['usu_nom1']);

            $mail->isHTML(true);
            $mail->Subject = 'reset password';
            $mail->Body    = "Hola <strong>{$user['usu_nom1']}</strong>,<br><br>
                             Haz clic en el siguiente enlace para restablecer tu contraseña:<br><br>
                             <a href='$reset_link'>$reset_link</a><br><br>
                             Este enlace expirará en 30 minutos.";

            $mail->send();

            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Correo enviado',
                    text: 'Correo de recuperación enviado correctamente.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>
            ";

        } catch (Exception $e) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al enviar el correo: {$mail->ErrorInfo}',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>
            ";
        }

    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Correo no encontrado',
                text: 'El correo no está registrado.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'index.php';
            });
        </script>
        ";
    }
}
?>
