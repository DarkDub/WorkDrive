{{-- <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Servicio</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .card {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            width: 400px;
            padding: 24px;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .status {
            position: absolute;
            top: 16px;
            right: 16px;
            background-color: #e0f3e0;
            color: #2e7d32;
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 0.85em;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info img {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-details .name {
            font-size: 1.2em;
            font-weight: bold;
        }

        .user-details .date {
            font-size: 0.9em;
            color: #666;
        }

        .service-info .category {
            font-weight: 600;
            color: #007bff;
            margin-bottom: 6px;
        }

        .service-info .description {
            color: #333;
            line-height: 1.5;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="status">Pendiente</div>

        <div class="user-info">
            <img src="https://via.placeholder.com/64" alt="Foto de perfil">
            <div class="user-details">
                <div class="name">María López</div>
                <div class="date">Solicitado hace 2 días</div>
            </div>
        </div>

        <div class="service-info">
            <div class="category">Servicio: Electricista</div>
            <div class="description">
                Necesito ayuda urgente para revisar el sistema eléctrico en mi cocina. Hay un cortocircuito que
                desconecta la luz constantemente.
            </div>
        </div>
    </div>

</body>

</html> --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Detalle</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            height: 100vh;
            overflow: hidden;
        }

        .panel-overlay {
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            justify-content: flex-end;
            z-index: 1000;
        }

        .detail-panel {
            background: #fff;
            width: 400px;
            height: 100%;
            padding: 32px;
            box-shadow: -4px 0 12px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
            gap: 20px;
            overflow-y: auto;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .panel-header h2 {
            margin: 0;
            font-size: 1.4em;
        }

        .close-btn {
            font-size: 1.5em;
            background: none;
            border: none;
            cursor: pointer;
            color: #999;
        }

        .user-info {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .user-info img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .user-details .name {
            font-weight: bold;
            font-size: 1.1em;
        }

        .user-details .time {
            font-size: 0.9em;
            color: #777;
        }

        .status {
            background: #fff3cd;
            color: #856404;
            padding: 6px 12px;
            border-radius: 12px;
            display: inline-block;
            font-size: 0.9em;
            font-weight: 600;
        }

        .info-block {
            margin-top: 10px;
        }

        .info-block label {
            font-weight: bold;
            color: #333;
            font-size: 0.95em;
        }

        .info-block p {
            margin: 4px 0 0 0;
            color: #555;
        }
    </style>
</head>

<body>

    <!-- Panel que aparece al hacer clic en la solicitud -->
    <div class="panel-overlay">
        <div class="detail-panel">
            <div class="panel-header">
                <h2>Detalle del Servicio</h2>
                <button class="close-btn">&times;</button>
            </div>

            <div class="user-info">
                <img src="https://via.placeholder.com/60" alt="Foto de perfil">
                <div class="user-details">
                    <div class="name">María López</div>
                    <div class="time">Solicitado hace 2 días</div>
                </div>
            </div>

            <div class="status">Pendiente</div>

            <div class="info-block">
                <label>Categoría:</label>
                <p>Electricista</p>
            </div>

            <div class="info-block">
                <label>Descripción del servicio:</label>
                <p>
                    Necesito ayuda urgente con un cortocircuito en mi cocina. La luz se apaga constantemente y necesito
                    una solución lo antes posible.
                </p>
            </div>

            <div class="info-block">
                <label>Dirección aproximada:</label>
                <p>Calle 123 #45-67, Bogotá</p>
            </div>

        </div>
    </div>

</body>

</html>
