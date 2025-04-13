<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
    body {
        font-family: cursive;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f8f9fa;
        flex-wrap: wrap;
    }

    body.swal2-shown {
        overflow: hidden !important;
    }

    .login-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 350px;
    }

    input {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-image: linear-gradient(to left, rgb(114, 15, 160), rgb(47, 5, 75));
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    .link a {
        color: rgb(55, 16, 68); 
        font-size: 13px; 
    }

    .link {
        display: flex; 
        justify-content: start; 
    }
    </style>
</head>
<body class="bg-light">
    <div class="login_letter">
        <h1>¡Bienvenida, Valentina Guerrero!</h1>
    </div>

    <div class="login-container">
        <h3>Inicio de Sesión</h3> 
        <form id="login-form" method="POST" action="login_handler.php">
            <input type="text" id="usu_id" name="usu_id" placeholder="Ingrese su usuario">
            <input type="password" id="usu_pass" name="usu_pass" placeholder="Ingrese su contraseña">
            <div class="link">
                <a href="reset_pass.php">¿Se te olvidó la contraseña?</a>
            </div> <br> 
            <button type="submit">Ingresar</button> 
        </form>
    </div>

    <script>
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();

            let usuario = document.getElementById('usu_id').value;
            let password = document.getElementById('usu_pass').value;

            if (usuario === '' || password === '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Campos vacíos',
                    text: 'Por favor, ingresa tu usuario y contraseña.',
                    confirmButtonText: 'Aceptar'
                });
                return;
            }

            this.submit();
        });
    </script>
</body>
</html>
