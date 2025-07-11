@extends('layouts.app')

@section('title', 'Detalles del Servicio')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuActive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/servicios-details.css') }}">
    <style>
        .user-panel {
            display: flex;
            justify-content: center;
            /* centra horizontal */
            align-items: center;
            /* centra vertical */
            text-align: center;
            flex-direction: column;
        }

        .waiting-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #ff9800;
            font-family: 'Public Sans', sans-serif;
            padding: 1rem 0;
        }

        .waiting-icon {
            font-size: 3rem;
            /* tamaño grande del reloj */
            margin-bottom: 0.5rem;
            animation: pulse 2s infinite ease-in-out;
            color: #ff9800;
        }

        .waiting-message {
            font-weight: bold;
            font-size: 1.2em;
            display: inline-flex;
            align-items: center;
        }

        .dot {
            animation-name: blink;
            animation-duration: 1.4s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
            margin-left: 2px;
            font-weight: bold;
            font-size: 1.4em;
        }

        .dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes blink {

            0%,
            20% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.7;
            }
        }

        .custom-orange {
            background-color: #fcd34d;
            /* Un naranja pastel */
            color: #92400e;
            /* Un marrón oscuro para contraste */
        }

        .custom-green {
            background-color: #86efac;
            /* Un verde claro */
            color: #166534;
        }

        .custom-blue {
            background-color: #93c5fd;
            /* Azul pastel */
            color: #1e3a8a;
        }

        .custom-gray {
            background-color: #e5e7eb;
            /* Gris claro */
            color: #374151;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            margin-top: 1rem;
            justify-content: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            padding: 10px 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
        }

        .btn i {
            font-size: 18px;
        }

        /* Botón Contactar */
        .btn-contact {
            background-color: #2563eb;
            color: white;
        }

        .btn-contact:hover {
            background-color: #1d4ed8;
        }

        /* Botón Chat estilo solo ícono redondo */
        .btn-chat {
            background-color: #22c55e;
            color: white;
            border-radius: 50%;
            padding: 12px;
            width: 45px;
            height: 45px;
            font-size: 20px;
        }

        .btn-chat:hover {
            background-color: #16a34a;
            transform: scale(1.1);
        }

        /* Botón Rechazar */
        .btn-reject {
            background-color: #f3f4f6;
            color: #dc2626;
            border: 1px solid #dc2626;
        }

        .btn-reject:hover {
            background-color: #fee2e2;
        }
    </style>
@endsection

@section('content')
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
                <li><a href="{{ route('servicio.misSolicitudes') }}"><i class="bi bi-briefcase icon-lg"></i> Servicios</a>
                </li>
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
    <div class="container">

        {{-- Panel central con datos del servicio --}}
        <section class="service-details" role="region" aria-labelledby="service-title">

            <h3 id="service-title">Servicio de Plomería</h3>

            <div class="info-row">
                <i class="fas fa-calendar-alt mr-2" aria-hidden="true"></i>
                Fecha: <strong style="margin-left: 7px;">{{ ' ' . $servicio->created_at->format('d M Y g:i a') }}</strong>
            </div>

            <div class="info-row">
                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                Lugar: <strong style="margin-left: 7px;">Calle 40 #123, Bogotá, fake</strong>
            </div>

            <div class="info-row">
                <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                Tarifa: <strong style="margin-left: 7px;">$ {{ number_format($servicio->tarifa, 2) }}</strong>
            </div>

            <div class="info-row">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                Estado:
                @if ($servicio->estado->nombre == 'pendiente')
                    <span class="badge custom-orange m-2">pendiente</span>
                @elseif($servicio->estado->nombre == 'completado')
                    <span class="badge custom-green m-2">completado</span>
                @elseif($servicio->estado->nombre == 'Activo')
                    <span class="badge custom-blue m-2">Activo</span>
                @else
                    <span class="badge custom-gray m-2">Draft</span>
                @endif


            </div>

            <div class="info-row" style="margin-bottom: 2rem;">
                <i class="fas fa-align-left" aria-hidden="true"></i>
                Descripción:
            </div>
            <p class="description">
                Reparación de tuberías y desagües en baño principal. Incluye cambio de válvulas y limpieza de cañerías.
            </p>
        </section>

        {{-- Panel derecho con datos del usuario --}}
        <aside class="user-panel" role="complementary" aria-label="Información del proveedor del servicio"
            style="text-align: center; padding: 1rem;">
            @if ($servicio->trabajador)
                <img src="{{ asset('storage/' . $servicio->trabajador->avatar) }}" alt="Foto del proveedor"
                    class="user-photo" />

                <div class="user-name">{{ $servicio->trabajador->nombre . ' ' . $servicio->trabajador->apellido }}</div>
                <div class="user-role">{{ $servicio->trabajador->datosTrabajador->profesion->nombre }}</div>

                <div class="user-contact">
                    <i class="fas fa-envelope" aria-hidden="true"></i>
                    <a href="{{ $servicio->trabajador->email }}" style="color: inherit; text-decoration: none;"
                        aria-label="Correo electrónico">{{ $servicio->trabajador->email }}</a>
                </div>

                <div class="user-phone">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    <a href="tel:+573001112233" style="color: inherit; text-decoration: none;"
                        aria-label="Número de teléfono">+57 {{ $servicio->trabajador->telefono }}
                        {{ $servicio->trabajador->id }}
                    </a>
                </div>

                <div class="user-location">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    {{-- {{ $servicio->trabajador->pais->nombre }} --}}
                </div>

                <div class="user-rating" aria-label="Calificación del usuario: 4.5 de 5 estrellas">
                    <i class="fas fa-star"></i> 4.5
                </div>

                <!-- Asegúrate de tener Font Awesome incluido -->

                <div class="action-buttons">
                    @if ($servicio->estado->nombre === 'pendiente' && $servicio->trabajador)
                        <!-- Aceptar trabajador -->
                        <form action="{{ route('servicio.cliente.aceptar', $servicio->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-contact" title="Aceptar al trabajador"
                                aria-label="Aceptar al proveedor">
                                <i class="fas fa-check-circle"></i> Aceptar
                            </button>
                        </form>

                        <!-- Rechazar trabajador -->
                        <form action="{{ route('servicio.cliente.rechazar', $servicio->id) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de rechazar al trabajador? Esta acción no se puede deshacer.');">
                            @csrf
                            <button type="submit" class="btn btn-reject" title="Rechazar al trabajador"
                                aria-label="Rechazar al proveedor">
                                <i class="fas fa-times-circle"></i> Rechazar
                            </button>
                        </form>
                    @endif

                    @if (in_array($servicio->estado->nombre, ['pendiente', 'en proceso']) && $servicio->trabajador)
                        <a href="{{ route('chat.view', ['trabajadorId' => $servicio->trabajador->id, 'clienteId' => $user->registro->id]) }}"
                            class="btn btn-chat" title="Abrir chat">
                            <i class="fas fa-comments"></i>
                        </a>
                    @endif

                </div>
            @else
                <div class="waiting-container" aria-live="polite" aria-atomic="true">
                    <i class="fas fa-clock waiting-icon" aria-hidden="true"></i>
                    <p class="waiting-message">
                        Aún no aceptan tu solicitud<span class="dot">.</span><span class="dot">.</span><span
                            class="dot">.</span>
                    </p>
                </div>
            @endif
        </aside>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endsection
