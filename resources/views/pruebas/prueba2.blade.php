<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba Toastify</title>

    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <h1>Página de prueba con Toastify</h1>

    <button onclick="mostrarToast()">Mostrar alerta</button>

    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        function mostrarToast() {
            Toastify({
                text: "Este es un mensaje de prueba ✨",
                duration: 3000,
                gravity: "top", // top o bottom
                position: "right", // left, center o right
                backgroundColor: "#4f46e5", // Indigo-600
                close: true
            }).showToast();
        }
    </script>
</body>
</html>
