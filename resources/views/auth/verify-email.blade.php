</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Register </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <!-- Fuente Public Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/trabajador-style/registro.css') }}">

    <script defer src="{{ asset('js/trabajadores-js/registro.js') }}"></script>
    <script defer src="{{ asset('js/eyes-pass.js') }}"></script>
</head>

<body>

    <x-header></x-header>

    <div class="content">
        <div class="card">

            <div class="verification-card text-center">
                <div class="mb-4">
                    <i class="bi bi-envelope-check-fill text-primary" style="font-size: 2.5rem;"></i>
                </div>

                <h1>Verifica tu correo electrónico</h1>

                <p class="mt-3">Hemos enviado un enlace de verificación a tu correo. Haz clic en él para
                    activar tu
                    cuenta.</p>

                @if (session('message'))
                    <div class="alert alert-success mt-3">
                        {{ session('message') }}
                    </div>
                @endif

                <p class="mt-3">¿No recibiste el correo? Puedes solicitar otro a continuación:</p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-3">Reenviar correo de
                        verificación</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
