<<<<<<< HEAD
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   User Profile Form
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body class="bg-white p-6 sm:p-10">
  <main class="max-w-7xl mx-auto flex flex-col md:flex-row gap-8">
   <!-- Left panel -->
   <section class="bg-white rounded-xl border border-gray-100 p-8 w-full max-w-sm flex flex-col items-center relative">
    <span class="absolute top-6 right-6 bg-amber-200 text-amber-700 text-[10px] font-semibold px-3 py-1 rounded-md select-none">
     Pending
    </span>
    <img alt="Avatar image of a person with red hair wearing red glasses and a blue hat" class="w-28 h-28 rounded-full border border-gray-200 mb-4" height="120" src="https://storage.googleapis.com/a1aa/image/e1f083e1-ece7-405f-f7d2-0b5dff8c4cdd.jpg" width="120"/>
    <p class="text-center text-xs text-gray-400 mb-8 leading-tight">
     Allowed *.jpeg, *.jpg, *.png, *.gif
     <br/>
     max size of 3 Mb
    </p>
    <div class="w-full mb-6">
     <label class="block font-semibold text-gray-900 mb-1" for="bannedToggle">
      Banned
     </label>
     <p class="text-sm text-gray-500 mb-2">
      Apply disable account
     </p>
     <label class="inline-flex relative items-center cursor-pointer" for="bannedToggle">
      <input checked="" class="sr-only peer" id="bannedToggle" type="checkbox"/>
      <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all relative">
      </div>
     </label>
    </div>
    <div class="w-full mb-8">
     <label class="block font-semibold text-gray-900 mb-1" for="emailVerifiedToggle">
      Email verified
     </label>
     <p class="text-sm text-gray-500 mb-2 leading-tight">
      Disabling this will automatically send
      <br/>
      the user a verification
          email
     </p>
     <label class="inline-flex relative items-center cursor-pointer" for="emailVerifiedToggle">
      <input checked="" class="sr-only peer" id="emailVerifiedToggle" type="checkbox"/>
      <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all relative">
      </div>
     </label>
    </div>
    <button class="bg-red-200 text-red-700 text-sm font-semibold rounded-md px-6 py-2" type="button">
     Delete user
    </button>
   </section>
   <!-- Right panel -->
   <section class="bg-white rounded-xl border border-gray-100 p-8 flex-1 max-w-4xl">
    <form class="grid grid-cols-1 sm:grid-cols-2 gap-6">
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="fullName">
       Full name
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="fullName" type="text" value="Lucian Obrien"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="emailAddress">
       Email address
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="emailAddress" type="email" value="ashlynn.ohara62@gmail.com"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="phoneNumber">
       Phone number
      </label>
      <div class="flex items-center border border-gray-200 rounded-lg px-3 py-2 text-gray-900 text-sm focus-within:ring-2 focus-within:ring-blue-400">
       <span class="flex items-center gap-1 pr-2 border-r border-gray-300">
        <span aria-label="Canada flag" class="text-red-600 text-lg leading-none">
         🇨🇦
        </span>
        <svg class="w-3 h-3 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
         <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round">
         </path>
        </svg>
       </span>
       <input class="flex-1 border-none focus:ring-0 text-sm text-gray-900" id="phoneNumber" type="tel" value="(416) 555-0198"/>
       <button aria-label="Clear phone number" class="text-gray-400 hover:text-gray-600" type="button">
        <i class="fas fa-times">
        </i>
       </button>
      </div>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="country">
       Country
      </label>
      <select class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="country">
       <option selected="" value="ca">
        🇨🇦 Canada
       </option>
       <option value="us">
        United States
       </option>
       <option value="uk">
        United Kingdom
       </option>
      </select>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="stateRegion">
       State/region
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="stateRegion" type="text" value="Virginia"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="city">
       City
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="city" type="text" value="Rancho Cordova"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="address">
       Address
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="address" type="text" value="908 Jack Locks"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="zipCode">
       Zip/code
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="zipCode" type="text" value="85807"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="company">
       Company
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="company" type="text" value="Gleichner, Mueller and Tromp"/>
     </div>
     <div>
      <label class="block text-xs font-semibold text-gray-500 mb-1" for="role">
       Role
      </label>
      <input class="w-full rounded-lg border border-gray-200 px-4 py-2 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400" id="role" type="text" value="CTO"/>
     </div>
     <div class="sm:col-span-2 flex justify-end">
      <button class="bg-gray-900 text-white text-sm font-semibold rounded-md px-5 py-2" type="submit">
       Save changes
      </button>
     </div>
    </form>
   </section>
  </main>
 </body>
=======
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
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
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

        #center-info {
            padding: 1.3rem !important;
        }

        #content {
            height: 80% !important;
        }

        #text-name {
            margin-bottom: 3px !important;
        }

        .sidebar {
            width: 240px !important;
            background-color: #ffffff !important;
            border-right: 1px solid #e5e7eb !important;
            flex-direction: column !important;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-50 via-white to-gray-100 text-gray-800">

    @if ($usuarioConElQueHablas->rol->nombre === 'trabajador')
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
                    <li><a href="{{ route('servicio.misSolicitudes') }}"><i class="bi bi-briefcase icon-lg"></i>
                            Servicios</a></li>
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
    @elseif($usuarioConElQueHablas->rol->nombre === 'cliente')
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/principal.css') }}">

        <x-menuWork />
        @else
        <p>no hay header</p>
    @endif


    <div class="flex h-screen max-w-6xl w-full mx-auto border border-gray-200 rounded-2xl shadow-2xl overflow-hidden mt-8"
        id="content">


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
                            {{ $usuarioConElQueHablas->rol->nombre === 'trabajador' ? 'Disponible' : 'Conectado' }}</p>
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

>>>>>>> ae394c969ee4322ab69e278906c2471bdb5b4392
</html>
