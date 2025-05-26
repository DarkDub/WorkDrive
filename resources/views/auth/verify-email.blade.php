<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Verificar correo electrónico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">

        <h1>Verifica tu correo electrónico</h1>

        <p>Antes de continuar, por favor revisa tu correo y haz clic en el enlace de verificación que te enviamos.</p>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <p>Si no recibiste el correo, puedes solicitar otro haciendo clic en el botón de abajo.</p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Reenviar correo de verificación</button>
        </form>

    </div>
</body>

</html>
