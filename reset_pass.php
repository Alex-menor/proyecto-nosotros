<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap & SweetAlert -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Poppins', cursive;
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h3 {
            color: #4a148c;
            margin-bottom: 20px;
        }

        .btn-purple {
            background-image: linear-gradient(to right, #6a1b9a, #4a148c);
            color: white;
            border: none;
        }

        .btn-purple:hover {
            background-color: #5e35b1;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h3>Recuperar Contraseña</h3>
    <form id="reset-form" method="POST" action="enviar_restablecer.php">
        <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="tucorreo@example.com" required>
        </div>
        <button type="submit" class="btn btn-purple w-100">Enviar enlace</button>
    </form>
</div>

<script>
    document.getElementById('reset-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const correo = document.getElementById('correo').value.trim();

        if (correo === '') {
            Swal.fire({
                icon: 'warning',
                title: 'Correo vacío',
                text: 'Por favor, introduce tu correo electrónico.',
                confirmButtonText: 'Entendido'
            });
            return;
        }

        // Aquí podrías agregar validación más estricta si deseas

        // Simulación de éxito (puedes quitarlo si el PHP ya responde con redirección)
        Swal.fire({
            icon: 'success',
            title: '¡Correo enviado!',
            text: 'Si el correo está registrado, recibirás un enlace para restablecer tu contraseña.',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            this.submit(); // Envía el formulario si todo está bien
        });
    });
</script>

</body>
</html>
