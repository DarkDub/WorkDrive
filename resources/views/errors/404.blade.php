<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>404 - Página no encontrada</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- LottiePlayer -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">
    <div class="text-center">
        <lottie-player 
            src="https://assets6.lottiefiles.com/packages/lf20_myejiggj.json"  
            background="transparent"  
            speed="1"  
            style="width: 300px; height: 300px; margin: auto;"  
            loop  
            autoplay>
        </lottie-player>

        <h1 class="text-5xl font-bold text-gray-800 mt-4">404</h1>
        <p class="text-xl text-gray-600 mt-2">¡Oh no! Parece que este robot no encuentra lo que buscas.</p>
        <p class="text-gray-500 mt-1">La página que intentas ver no existe o fue movida.</p>
        <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">
            Volver al inicio
        </a>
    </div>
</body>
</html>
