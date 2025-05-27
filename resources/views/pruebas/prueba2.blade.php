<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Chat en Vivo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">
    <div class="flex h-screen mx-auto max-w-5xl border border-gray-200 rounded-lg shadow-md overflow-hidden mt-6">
        <!-- Sidebar con un solo contacto -->
        <aside class="w-72 bg-white border-r border-gray-200 flex flex-col">
            <div class="p-[1.26rem] border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Trabajador</h2>
            </div>
            <div class="p-4">
                <div class="flex items-center space-x-4 hover:bg-gray-100 p-3 rounded-lg cursor-pointer transition">
                    <div class="relative">
                        <img src="https://storage.googleapis.com/a1aa/image/26495065-8054-4f7f-2c5d-26166b0df9a9.jpg"
                            alt="Avatar" class="w-12 h-12 rounded-full" />
                        <span
                            class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Lucian Obrien</p>
                        <p class="text-xs text-gray-500">Disponible para trabajar</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Área de chat -->
        <main class="flex-1 flex flex-col bg-white">
            <!-- Encabezado del chat -->
            <div class="flex items-center justify-between p-[0.9rem] border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <img src="https://storage.googleapis.com/a1aa/image/26495065-8054-4f7f-2c5d-26166b0df9a9.jpg"
                        alt="Avatar" class="w-10 h-10 rounded-full" />
                    <div>
                        <h3 class="text-sm font-semibold text-gray-800">Lucian Obrien</h3>
                        <span class="text-xs text-gray-500">Activo ahora</span>
                    </div>
                </div>
            </div>

            <!-- Mensajes -->
            <div class="flex-1 p-6 space-y-4 overflow-y-auto">
                <div class="flex flex-col items-start">
                    <div class="bg-gray-100 text-sm p-3 rounded-xl max-w-xs">
                        ¡Hola! ¿En qué puedo ayudarte?
                    </div>
                </div>
                <div class="flex flex-col items-end">
                    <div class="bg-blue-500 text-white text-sm p-3 rounded-xl max-w-xs">
                        Necesito ayuda con una instalación eléctrica.
                    </div>
                </div>
            </div>

            <!-- Input de mensaje -->
            <div class="p-4 border-t border-gray-200">
                <div class="flex items-center space-x-2">
                    <input type="text" placeholder="Escribe un mensaje..."
                        class="flex-1 px-4 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                        Enviar
                    </button>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
