<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Register </title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Iconify for animated icons -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Public Sans font -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <!-- Custom CSS -->
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
            padding-top: 130px; 
        }

        .verification-card {
            background: #fff;
            border-radius: 16px;
            /* box-shadow: 0 12px 24px rgb(0 0 0 / 0.1); */
            padding: 2.5rem 2rem;
            transition: transform 0.3s ease;
            text-align: center;
            margin-top: 40px; 
        }

        .verification-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 35px rgb(0 0 0 / 0.15);
        }

        /* Icon container */
        .verification-card .icon-wrapper {
            margin-bottom: 1.5rem;
        }

        /* Animated icon style */
        iconify-icon {
            font-size: 3.5rem;
            color: #1C252E; /* azul primario */
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        h5 {
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 2rem;
            color: #111827;
        }

        p {
            color: #4b5563;
            font-size: 1rem;
            line-height: 1.5;
            margin-top: 1rem;
        }

        .btn-primary {
            background-color: #1C252E;
            border: none;
            padding: 0.65rem 1.5rem;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            margin-top: 1.5rem;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #262f37;
        }

        .alert {
            font-size: 0.9rem;
            margin-top: 1rem;
        }
    </style>

    <script defer src="{{ asset('js/trabajadores-js/registro.js') }}"></script>
    <script defer src="{{ asset('js/eyes-pass.js') }}"></script>
</head>

<body>

    <x-header></x-header>

    <div class="content">
        <div class="verification-card">
            <div class="icon-wrapper">
                <!-- Iconify animated email icon -->
                <iconify-icon icon="mdi:email-check-outline" inline></iconify-icon>
            </div>

            <h5>¡Por favor revise su correo electrónico!</h5>

            <p>Hemos enviado un enlace de verificación a tu correo. Haz clic en él para activar tu cuenta.</p>

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <p>¿No recibiste el correo? Puedes solicitar otro a continuación:</p>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Reenviar correo</button>
            </form>
        </div>
    </div>

</body>

</html>
