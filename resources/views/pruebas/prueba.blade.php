<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Notificaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-light p-4">

    <div class="container">
        <h2 class="mb-4">🔔 Panel de Notificaciones</h2>
        
        <ul class="list-group" id="notificacionesList">
            <!-- Aquí se llenan las notificaciones -->
        </ul>
        
        <button class="btn btn-primary mt-3" onclick="cargarNotificaciones()">🔄 Recargar Manual</button>
    </div>

<script>

    </script>