@extends('layouts.app')
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Chat en Vivo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/inicio.css')}}">
    <link rel="stylesheet" href="{{ asset('css/menuActive.css') }}">

    <style>
        body {
            font-family: 'Public Sans', sans-serif;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: rgba(100, 116, 139, 0.4);
            border-radius: 4px;
        }
        #center-info{
            padding: 1.3rem !important;
        }
        
        #content {
            height: 80% !important;
        }
        
        #text-name{
            margin-bottom: 3px !important;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 via-white to-gray-100 text-gray-800">

    <header class="header" id="header">
        <div class="menu-container">
            <div class="logo">
                <div class="menu-icon" id="menu-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="text-logo">Work Drive</div>
            </div>

            <!-- Navegación -->
            <x-menu-nav>
                <li><a href="{{ route('cliente.index') }}"><i class="bi bi-house-door icon-lg"></i> Inicio</a></li>
                <li><a href="{{ route('profile.index') }}"><i class="bi bi-person-circle"></i> Perfil</a></li>
                <li><a href="{{route('servicio.misSolicitudes')}}"><i class="bi bi-briefcase icon-lg"></i> Servicios</a></li>
                <li><a href="#"><i class="bi bi-telephone icon-lg"></i> Contacto</a></li>
                <li><a href="#"><i class="bi bi-info-circle icon-lg"></i> Acerca de</a></li>
            </x-menu-nav>
        </div>

        {{-- Enlaces secundarios --}}
        <div class="nav-left">
            <a href="#">
                <h5>Sobre nosotros</h5>
            </a>
            <a href="#">
                <h5>Contáctanos</h5>
            </a>
        </div>
    </header>

    <div class="flex h-screen max-w-6xl w-full mx-auto border border-gray-200 rounded-2xl overflow-hidden mt-8" id="content">


        <!-- Sidebar izquierdo -->
        <aside class="w-72 bg-white border-r border-gray-200 flex flex-col">
            <div class="p-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ $usuarioConElQueHablas->rol->nombre }}
                </h2>
            </div>
            <div class="p-4">
                <div
                    class="flex items-center space-x-4 hover:bg-blue-50 p-3 rounded-xl cursor-pointer transition shadow-sm">
                    <div class="relative">
                        <img src="{{ asset('storage/' . ($usuarioConElQueHablas->avatar ?? 'default-avatar.png')) }}"
                            alt="Avatar" class="w-12 h-12 rounded-full shadow-md" />
                        <span
                            class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full animate-pulse"></span>
                    </div>
                    <div>
                        <p class="text-sm font-medium" id="text-name">{{ $usuarioConElQueHablas->nombre }}</p>
                        <p class="text-xs text-gray-500" id="text-name">
                            {{ $usuarioConElQueHablas->rol === 'trabajador' ? 'Disponible' : 'Conectado' }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Área del chat -->
        <main class="flex-1 flex flex-col bg-white">
            <div class="flex items-center justify-between p-3 border-b border-gray-200 shadow-sm" id="center-info">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('storage/' . ($usuarioConElQueHablas->avatar ?? 'default-avatar.png')) }}"
                        alt="Avatar" class="w-10 h-10 rounded-full shadow-sm" />
                    <div>
                        <h3 class="text-sm font-semibold">{{ $usuarioConElQueHablas->nombre }}</h3>
                        <span class="text-xs text-gray-500">Activo ahora</span>
                    </div>
                </div>
            </div>

            <div id="chat-mensajes" class="flex-1 p-6 space-y-4 overflow-y-auto custom-scrollbar">
                <!-- Mensajes dinámicos -->
            </div>

            <div class="p-4 border-t border-gray-200 bg-gradient-to-r from-blue-50 to-white">
                <div class="flex items-center space-x-2">
                    <input id="input-mensaje" type="text" placeholder="Escribe un mensaje..."
                        class="flex-1 px-4 py-2 border rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm transition" />
                    <button id="btn-enviar"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full text-sm shadow-md transition">Enviar</button>
                    <input type="hidden" id="trabajador_id" value="{{ $trabajadorId }}">
                    <input type="hidden" id="cliente_id" value="{{ $clienteId }}">
                </div>
            </div>
        </main>

        <!-- Panel lateral derecho -->
        <aside class="w-80 bg-white border-l border-gray-200 flex flex-col">
            <div class="p-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold">Detalles del Usuario</h2>
            </div>
            <div class="flex-1 p-6 space-y-6">
                <div class="text-center">
                    <img src="{{ asset('storage/' . ($usuarioConElQueHablas->avatar ?? 'default-avatar.png')) }}"
                        alt="Avatar" class="w-24 h-24 rounded-full mx-auto shadow-lg" />
                    <h3 class="text-lg font-semibold mt-3">{{ $usuarioConElQueHablas->nombre }}</h3>
                    <p class="text-sm text-gray-500 capitalize">{{ $usuarioConElQueHablas->rol->nombre }}</p>
                </div>
                <div class="text-sm text-gray-700 space-y-3">
                    <p class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12H8m0 0l4-4m-4 4l4 4" />
                        </svg>
                        <span class="font-semibold">Correo:</span>
                        <span>{{ $usuarioConElQueHablas->email ?? 'No disponible' }}</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7-5 7 5v7a4 4 0 01-8 0v-7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 12v2a2 2 0 004 0v-2" />
                        </svg>
                        <span class="font-semibold">Teléfono:</span>
                        <span>{{ $usuarioConElQueHablas->telefono ?? 'No disponible' }}</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13 21.314l-4.657-4.657a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="font-semibold">Ubicación:</span>
                        <span>{{ $usuarioConElQueHablas->pais->nombre ?? 'No disponible' }}</span>
                    </p>
                </div>

                <button
                    class="w-full mt-4 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white py-2 rounded-xl text-sm shadow-md transition">Ver
                    Perfil Completo</button>
            </div>
        </aside>

    </div>

    <script>
        const userId = @json(auth()->user()->registro_id);
        const trabajadorId = $('#trabajador_id').val();
        const clienteId = $('#cliente_id').val();
        const soyTrabajador = userId == trabajadorId;
        const interlocutorId = soyTrabajador ? clienteId : trabajadorId;
        const interlocutorNombre = @json($usuarioConElQueHablas->nombre);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function formatHora(fechaStr) {
            const fecha = new Date(fechaStr);
            return `${fecha.getHours().toString().padStart(2, '0')}:${fecha.getMinutes().toString().padStart(2, '0')}`;
        }

        function cargarMensajes() {
            $.get("{{ route('chat.mensajes') }}", {
                    trabajador_id: trabajadorId,
                    cliente_id: clienteId
                })
                .done(function(data) {
                    const contenedor = $('#chat-mensajes').empty();
                    if (!data.mensajes || data.mensajes.length === 0) {
                        contenedor.append('<p class="text-gray-500 text-sm">No hay mensajes aún.</p>');
                        return;
                    }
                    data.mensajes.forEach(m => {
                        const esPropio = m.user_id === userId;
                        const alignClass = esPropio ? 'items-end' : 'items-start';
                        const bubbleClass = esPropio ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800';
                        const nombreUsuario = esPropio ? 'Tú' : interlocutorNombre;
                        const hora = formatHora(m.created_at);
                        contenedor.append(`
                            <div class="flex flex-col ${alignClass}">
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="text-xs font-semibold ${esPropio ? 'text-blue-600' : 'text-gray-700'}">${nombreUsuario}</span>
                                    <span class="text-xs text-gray-500">${hora}</span>
                                </div>
                                <div class="${bubbleClass} text-sm p-3 rounded-2xl max-w-xs whitespace-pre-wrap shadow-md">${m.contenido}</div>
                            </div>
                        `);
                    });
                    contenedor.scrollTop(contenedor[0].scrollHeight);
                })
                .fail(xhr => console.error('Error al cargar mensajes:', xhr.responseText));
        }

        $('#btn-enviar').click(() => {
            const mensaje = $('#input-mensaje').val().trim();
            if (!mensaje) return;
            $.post("{{ route('chat.enviar') }}", {
                    contenido: mensaje,
                    trabajador_id: trabajadorId,
                    cliente_id: clienteId
                })
                .done(() => {
                    $('#input-mensaje').val('');
                    cargarMensajes();
                })
                .fail(xhr => console.error('Error al enviar mensaje:', xhr.responseText));
        });

        $('#input-mensaje').keypress(e => {
            if (e.which === 13 && !e.shiftKey) {
                e.preventDefault();
                $('#btn-enviar').click();
            }
        });

        $(document).ready(() => {
            cargarMensajes();
            setInterval(cargarMensajes, 3000);
        });
    </script>
</body>

</html>
