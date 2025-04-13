<?php
session_start();
require_once "bd.php";

// Redirigir si no hay sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: views/login.php");
    exit();
}

// Obtener datos del usuario (nombre y apellido)
$usu_id = $_SESSION['usuario'];

$stmt = $pdo->prepare("SELECT usu_nom1, usu_ape1 FROM usuario WHERE usu_id = :id");
$stmt->execute(['id' => $usu_id]);
$usuario_data = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f4f4f9;
        }

        header {
            background-color: rgb(45, 11, 67);
            color: white;
            padding: 20px 50px;
            text-align: left;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            height: 60px;
            display: flex;
            align-items: center;
        }

        header h4 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }

        .sidebar {
            width: 250px;
            background-color: rgb(35, 20, 53);
            color: white;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            padding-top: 80px;
            display: flex;
            flex-direction: column;
            width: 15%;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            color: white;
            font-size: 16px;
            font-weight: 500;
            display: block;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #ce93d8;
        }

        .sidebar a.active {
            background-color: #9c4d97;
        }

        .main-content {
            margin-left: 250px;
            margin-top: 80px;
            padding: 30px;
            width: 100%;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .content-header h3 {
            font-size: 32px;
            font-weight: 600;
            color: #4a148c;
        }

        footer {
            background-color: #6a1b9a;
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            left: 195px;
            width: calc(100% - 200px);
        }

        footer p {
            margin: 0;
            font-size: 10px;
            text-align: center ; 
        }

        p {
            text-align: left;
        }

        /* Animación y estilo personalizado para el mensaje */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .love-text {
            animation: fadeInUp 1.5s ease;
            background: linear-gradient(to right, #f3e5f5, #ede7f6);
            border-radius: 15px;
            color: #4a148c;
            font-size: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.-3s;
        }

        .love-text:hover {
            transform: scale(1.01);
        }

        @media screen and (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding-top: 0;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            header h2 {
                font-size: 13px;
            }

            footer {
                left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<header>
    <h4 class="mb-0">¡Bienvenida, <?php echo htmlspecialchars($usuario_data['usu_nom1'] . ' ' . $usuario_data['usu_ape1']); ?> 👋</h4>
</header>

<div class="sidebar">
    <a href="main.php?seccion=seccion_1" class="<?php echo (isset($_GET['seccion']) && $_GET['seccion'] == 'seccion_1') ? 'active' : ''; ?>">💌 Carta de Amor</a>
    <a href="main.php?seccion=seccion_2" class="<?php echo (isset($_GET['seccion']) && $_GET['seccion'] == 'seccion_2') ? 'active' : ''; ?>">💌 Seccion 1 </a>
    <a href="main.php?seccion=seccion_3" class="<?php echo (isset($_GET['seccion']) && $_GET['seccion'] == 'sesion_3') ? 'active' : ''; ?>">💌  Seccion 2</a>
    <a href="index.php">❌ Cerrar sesión</a>
</div>

<div class="main-content">
    <div class="content-header">
        <h3></h3>
        <p>¡Estás logueada!</p>
    </div>

    <?php
    if (isset($_GET['seccion'])) {
        switch ($_GET['seccion']) {
            case 'seccion_1':
                echo "<h4 class='mb-3 text-danger'>¡Mi Amor Hermoso! 💖</h4>
                      <div class='love-text'>
                      <p>A veces me pregunto si tú sabes todo lo que significas para mí. Si logras ver lo que yo siento cada vez que sonríes, cuando me miras o simplemente estás presente.</p>
                      <p>Eres la calma en mis días agitados, el abrazo silencioso que necesito cuando todo va mal. En tu risa encontré mi refugio, y en tu mirada, el lugar al que siempre quiero volver.</p>
                      <p>Te amo cuando ríes sin razón, cuando te enojas con ternura, cuando me abrazas sin decir una palabra.<br>
                      Te amo cuando sueñas, cuando luchas, cuando eres tú.</p>
                      <p>No hay día que pase sin que me sienta afortunado de tenerte. No hay noche en la que no cierre los ojos pensando en ti.<br>
                      No hay futuro que imagine sin ti a mi lado.</p>
                      <p>Si alguna vez dudas de lo que siento, recuérdalo:<br>
                      <strong>te amo con cada parte de mí, con cada pensamiento, con cada latido.</strong></p>
                      <p>Porque contigo, todo tiene sentido.<br>
                      Porque tú, amor mío, eres mi todo. ❤️</p>
                      </div>";
                break;
                case 'seccion_2':
                    echo '
                        <h4 class="mb-3 text-primary">💖 Dime tu nombre</h4>
                        <div class="love-text">
                            <form id="loveForm">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Ingresa tu nombre:</label>
                                    <input type="text" class="form-control" id="nombre" placeholder="Ej: Nombre ">
                                </div>
                                <button type="submit" class="btn btn-gradient">Enviar 💌</button>
                            </form>
                        </div>
                
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.getElementById("loveForm").addEventListener("submit", function(e) {
                                e.preventDefault();
                                const nombre = document.getElementById("nombre").value.trim();
                                if (nombre === "") {
                                    Swal.fire({
                                        icon: "warning",
                                        title: "Ups 😅",
                                        text: "Por favor, ingresa tu nombre para poder amarte ❤️",
                                        confirmButtonText: "Ok"
                                    });
                                } else {
                                    Swal.fire({
                                        title: "❤️ Te amo, " + nombre + " ❤️",
                                        text: "No sé en qué momento entraste a mi vida, pero desde entonces todo tiene más sentido. Tu presencia calma, tu voz abraza y tu amor me hace sentir que todo es posible. Si tuviera que elegir de nuevo, te elegiría a ti, mil veces, sin pensarlo",
                                        icon: "success",
                                        confirmButtonColor: "#a678de",
                                        confirmButtonText: "Yo también te amo ❤️"
                                    });
                                }
                            });
                        </script>
                
                        <style>
                            .btn-gradient {
                                background-image: linear-gradient(to right, #9d50bb, #6e48aa);
                                color: white;
                                border: none;
                                padding: 10px 20px;
                                border-radius: 5px;
                                font-weight: bold;
                                transition: all 0.3s ease;
                            }
                
                            .btn-gradient:hover {
                                background-image: linear-gradient(to right, #6e48aa, #9d50bb);
                                transform: scale(1.05);
                            }
                        </style>
                    ';
                    break;
                
            case 'seccion_3':
                echo "<h4>Seccion 3</h4><p>Estara disponible lo mas pronto posible.</p>";
                break;
            default:
                echo "<h4>Sección no encontrada</h4>";
                break;
        }
    } else {
        echo "<h4>Bienvenido</h4><p>Selecciona una opción en el menú lateral para empezar.</p>";
    }
    ?>
</div>

<footer>
    <p>&copy; <?php echo date('Y'); ?> Mi Aplicación Web. Todos los derechos reservados.</p>
</footer>

</body>
</html>
