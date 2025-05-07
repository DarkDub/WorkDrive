<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Profesiones</title>

    <!-- Bootstrap y estilos opcionales -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Iconify -->
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

    <style>
        .list-group-item {
            display: flex;
            align-items: center;
            gap: 16px;
            background-color: #ffffff;
            padding: 16px 20px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-bottom: 16px;
            cursor: pointer;
        }

        .list-group-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }

        /* Icono de la profesión con fondo */
        .icono-profesion {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #eef2f7;
            color: #3b82f6;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            font-size: 20px;
            flex-shrink: 0;
        }

        /* Info de la profesión */
        .profesion-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .profesion-nombre {
            font-size: 16px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 4px;
        }

        .profesion-desc {
            font-size: 13px;
            color: #6b7280;
            line-height: 1.4;
        }
    </style>
</head>

<body>
    <li class="list-group-item">
        <div class="icono-profesion"><i class="fas fa-tools"></i></div>
        <div class="profesion-info">
            <div class="profesion-nombre">Técnico en Reparación</div>
            <div class="profesion-desc">Solución rápida a problemas técnicos de hogar y oficina.</div>
        </div>
    </li>

</body>

</html>
