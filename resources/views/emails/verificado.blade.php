<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Cuenta Activada </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Iconify for animated icons -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Public Sans font -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
<link rel="stylesheet" href="{{ asset('css/trabajador-style/registro.css') }}" />

    <style>
        body {
            font-family: 'Public Sans', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
        }

        .content {
            width: 100%;
            max-width: 420px;
            margin: auto;
            padding-top: 130px !important; 
        }

        .verification-card {
            border-radius: 16px;
            /* box-shadow: 0 12px 24px rgb(0 0 0 / 0.1); */
            padding: 2.5rem 0rem;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .verification-card:hover {
            /* transform: translateY(-5px); */
            /* box-shadow: 0 20px 35px rgb(0 0 0 / 0.15); */
        }

        .icon-wrapper {
            margin-bottom: 1.5rem;
        }

        iconify-icon {
            font-size: 4rem;
            color: #22c55e; /* verde éxito */
            animation: pulse 2.5s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        h1 {
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #166534; /* verde oscuro */
        }

        p {
            color: #4b5563;
            font-size: 1rem;
            line-height: 1.5;
            margin-top: 1rem;
        }

        .btn-primary {
            display: inline-block;
            margin-top: 2rem;
            background-color: #22c55e;
            border: none;
            padding: 0.65rem 1.5rem;
            font-size: 1.1rem;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-primary a{
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #16a34a;
            text-decoration: none;
        
        }
    </style>
</head>

<body>

    <x-header></x-header>

    <div class="content">
        <div class="verification-card">
            <div class="icon-wrapper">
                <!-- Icono de check-circle animado para cuenta activada -->
                <iconify-icon icon="mdi:check-circle-outline" inline></iconify-icon>
            </div>

            <h1>¡Cuenta activada con éxito!</h1>

            <p>Tu correo electrónico ha sido verificado y tu cuenta está ahora activa. ¡Gracias por unirte!</p>

            <a href="{{ route('login') }}" class="btn btn-primary">Ir a iniciar sesión</a>
        </div>
    </div>

</body>

</html>
