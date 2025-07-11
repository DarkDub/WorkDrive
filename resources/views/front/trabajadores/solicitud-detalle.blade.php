@extends('layouts.app')

@section('title', 'Detalle de Solicitud #' . $solicitud->id)

@section('styles')
    {{-- Tipografías y librerías externas --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    {{-- Estilos locales --}}
    <link rel="stylesheet" href="{{ asset('css/porve.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/principal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/list-solicitudes.css') }}">

    {{-- Estilos adicionales --}}
    <style>
        #map {
            width: 100%;
            height: 300px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .content {
            display: flex;
            flex-wrap: wrap;
        }

        .left-side,
        .right-side {
            flex: 1 1 100%;
        }

        @media(min-width: 992px) {
            .left-side {
                flex: 2;
            }

            .right-side {
                flex: 1.3;
            }
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        .content {
            width: 90%;
            margin: auto;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-top: 1px solid #e5e7eb;
            font-weight: 500;
        }

        .badge {
            padding: 0.3rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .badge-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-completed {
            background-color: #d1fae5;
            color: #065f46;
        }

        .headers {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .order-title {
            font-size: 1.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .order-number {
            color: #2563eb;
        }

        .order-date {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .customer-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .customer-avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
        }

        .info-client {
            font-size: 0.95rem;
            margin: 0.2rem 0;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.95rem;
            margin: 0.5rem 0;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            padding: 0.4rem 0.7rem;
            background: #f3f4f6;
            border-radius: 0.4rem;
            color: #1f2937;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #e5e7eb;
        }
    </style>
@endsection

@section('content')
    <x-menuWork />

    <div class="headers">
        <a href="{{ route('solicitudes.estado') }}" class="btn-back" aria-label="Volver">
            <i class="fas fa-chevron-left"></i>
        </a>
        <h1 class="order-title">
            Solicitud <span class="order-number">#{{ $solicitud->id }}</span>
            @if ($solicitud->estado->nombre === 'pendiente')
                <span class="badge badge-pending">Pendiente</span>
            @elseif ($solicitud->estado->nombre === 'completado')
                <span class="badge badge-completed">Completado</span>
            @endif
        </h1>
    </div>

    <p class="order-date">Creada el {{ $solicitud->created_at->format('d M Y g:i a') }}</p>

    <div class="content">
        {{-- LADO IZQUIERDO --}}
        <div class="left-side">
            {{-- Información del servicio --}}
            <div class="card">
                <h2 class="card-title">Información del Servicio</h2>
                <p><strong>Descripción:</strong> {{ $solicitud->descripcion ?? 'No hay descripción' }}</p>
                <p><strong>ID Servicio:</strong> {{ $solicitud->id }}</p>
                <p><strong>Tarifa:</strong> ${{ number_format($solicitud->tarifa, 2) }}</p>

                @if ($solicitud->latitud && $solicitud->longitud)
                    <div id="map"></div>
                @endif

                <div class="summary">
                    <div class="summary-row total">
                        <span>Total a pagar</span>
                        <span>${{ number_format($solicitud->tarifa, 2) }}</span>
                    </div>
                </div>
            </div>

            {{-- Historial --}}
            <div class="card">
                <h2 class="card-title">Historial de Estados</h2>
                <ul class="history-list">
                    <li class="history-item">
                        <span class="history-dot completed"></span>
                        <div>
                            <p>Solicitud creada</p>
                            <p>{{ $solicitud->created_at->format('d M Y g:i a') }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        {{-- LADO DERECHO --}}
        <div class="right-side">
            <div class="grouped-card-section">
                {{-- Cliente --}}
                <div class="card">
                    <h2 class="card-title">Información del Cliente</h2>
                    <div class="customer-info">
                        <img src="{{ asset('storage/' . ($solicitud->usuario->registro->avatar ?? 'default-avatar.png')) }}"
                            alt="Cliente" class="customer-avatar" />
                        <div>
                            <p class="info-client">
                                {{ $solicitud->usuario->registro->nombre . ' ' . $solicitud->usuario->registro->apellido }}
                            </p>
                            <p class="info-client email">{{ $solicitud->usuario->registro->email }}</p>
                            <p class="info-client cel"><span>Teléfono:</span>
                                {{ $solicitud->usuario->registro->telefono ?? 'No registrado' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Trabajador --}}
                <div class="card">
                    <h2 class="card-title">Información del Trabajador</h2>
                    @if ($solicitud->trabajador)
                        <div class="customer-info">
                            <img src="{{ asset('storage/' . ($solicitud->trabajador->avatar ?? 'image/avatar-default.png')) }}"
                                alt="Trabajador" class="customer-avatar" />
                            <div>
                                <p class="info-client">
                                    {{ $solicitud->trabajador->nombre . ' ' . $solicitud->trabajador->apellido }}</p>
                                <p class="info-client email">{{ $solicitud->trabajador->email }}</p>
                                <p class="info-client cel"><span>Teléfono:</span>
                                    {{ $solicitud->trabajador->telefono ?? 'No registrado' }}</p>
                            </div>
                        </div>
                    @else
                        <p>Este servicio aún no tiene trabajador asignado.</p>
                    @endif
                </div>

                {{-- Detalles adicionales --}}
                <div class="card">
                    <h2 class="card-title">Detalles adicionales</h2>
                    <div class="detail-row"><span>Hora del
                            servicio</span><span>{{ $solicitud->created_at->format('g:i a') }}</span></div>
                    <div class="detail-row"><span>Fecha
                            estimada</span><span>{{ $solicitud->created_at->format('d M Y') }}</span></div>
                </div>

                {{-- Chat --}}
                <a href="{{ route('chat.view', ['trabajadorId' => $solicitud->usuario->registro->id, 'clienteId' => $user->registro->id]) }}"
                    class="btn-chat">
                    Ir al Chat
                </a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Scripts --}}
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/map-work.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/service.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($solicitud->latitud && $solicitud->longitud)
                const lat = {{ $solicitud->latitud }};
                const lng = {{ $solicitud->longitud }};
                const map = L.map('map', {
                    zoomControl: true,
                    scrollWheelZoom: false,
                    attributionControl: false,
                }).setView([lat, lng], 15);

                L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                    attribution: '&copy; <a href="https://www.carto.com/">CARTO</a>',
                    subdomains: 'abcd',
                    maxZoom: 19
                }).addTo(map);

                const customIcon = L.icon({
                    iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                    iconSize: [36, 36],
                    iconAnchor: [18, 36],
                    popupAnchor: [0, -36]
                });

                const marker = L.marker([lat, lng], {
                    icon: customIcon
                }).addTo(map);

                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                    .then(response => response.json())
                    .then(data => {
                        const addr = data.address || {};
                        const road = addr.road || '';
                        const suburb = addr.suburb || '';
                        const city = addr.city || addr.town || '';
                        const country = addr.country || '';

                        const fullAddress = [road, suburb, city, country].filter(Boolean).join(', ') ||
                            'Dirección no disponible';
                        marker.bindPopup(`<strong>Ubicación del servicio</strong><br>${fullAddress}`)
                            .openPopup();
                    })
                    .catch(() => {
                        marker.bindPopup('Dirección no disponible').openPopup();
                    });
            @endif
        });
    </script>
@endsection
