<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Verifica tu correo electrónico | WorkDrive</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #212b36;
            color: white;
            text-align: center;
            padding: 30px 20px 20px;
        }
        .header img {
            width: 80px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px 40px;
        }
        .content h2 {
            color: #333333;
            margin-bottom: 15px;
            font-size: 22px;
        }
        .content p {
            color: #555555;
            font-size: 16px;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background-color: #212b36;
            color: #ffffff;
            padding: 14px 28px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            margin: 30px 0;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #2c343c;
        }
        .footer {
            color: #999999;
            font-size: 12px;
            text-align: center;
            background-color: #f0f2f5;
            padding: 15px 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Email Icon">
            <h1>WorkDrive</h1>
        </div>
        <div class="content">
            <h2>¡Hola! {{$user->name}}</h2>
            <p>
                Por favor haz clic en el siguiente botón para verificar tu dirección de correo electrónico.
            </p>
            <p style="text-align: center;">
                <a href="{{ $url }}" class="btn">Verificar correo</a>
            </p>
            <p>
                Si no solicitaste esta verificación, simplemente ignora este mensaje.
            </p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
        </div>
    </div>

</body>
</html>
