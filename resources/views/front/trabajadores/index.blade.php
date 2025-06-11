@extends('layouts.app')

@section('title', 'Work Drive')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/principal.css') }}">
    <style>
        #card {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            width: 400px;
            padding: 24px;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 16px;
            transition: transform 0.2s;
        }

        #card:hover {
            transform: translateY(-4px);
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
            color: #4194ff
        }

        .user-details .telefono {
            font-size: 0.9em;
            color: #555;
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

        .content-target {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .extra-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85em;
            color: #666;
        }

        .detail-panel {
            background: #ffffff;
            width: 400px;
            height: 100%;
            padding: 32px;
            overflow-y: auto;
            font-family: 'Segoe UI', sans-serif;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .user-info h4 {
            position: absolute;
            top: 24px;
            left: 32px;
            font-size: 1.4rem;
            color: #333;
            margin: 0;
        }

        .user-info img {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .user-details {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .user-details .name {
            font-weight: bold;
            font-size: 1.1rem;
            color: #222;
        }

        .estado {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
            width: fit-content;
        }

        .estado.pendiente {
            background-color: #fff3cd;
            color: #856404;
        }

        .estado.disponible {
            background-color: #d4edda;
            color: #155724;
        }

        .info-block {
            margin-bottom: 16px;
        }

        .info-block label {
            display: block;
            font-weight: bold;
            color: #444;
            margin-bottom: 4px;
        }

        .info-block p {
            margin: 0;
            color: #555;
            font-size: 0.95rem;
            line-height: 1.4;
        }
    </style>
@endsection

@section('content')
    <x-menuWork />

    <section class="content" id="content" aria-live="polite">
        <div id="content-left-solicitudes" class="content-left">
            <h2 class="title-content">Solicitudes</h2>

            <section class="left-panel" aria-label="Lista de solicitudes">
                @forelse ($servicios as $serv)
                    <div class="solicitud-card {{ $serv->trabajador_id ? 'aceptado' : '' }}" data-id="{{ $serv->id }}"
                        data-trabajador="{{ $serv->trabajador_id ?? '' }}"
                        data-direccion="{{ $serv->direccion ?? 'No especificada' }}"
                        data-fecha="{{ $serv->fecha ?? '---' }}" data-hora="{{ $serv->hora ?? '---' }}"
                        data-telefono="{{ $serv->usuario?->telefono ?? 'No disponible' }}" data-nombre="{{ $serv->nombre }}"
                        data-descripcion="{{ $serv->descripcion }}" role="button" tabindex="0" aria-pressed="false"
                        aria-label="Solicitud {{ $serv->nombre }} {{ $serv->trabajador_id ? '(Aceptada)' : '(Pendiente)' }}"
                        id="card">

                        <div class="status">
                            {{ $serv->trabajador_id ? 'Aceptado' : 'Pendiente' }}
                        </div>

                        <div class="content-target">
                            <img src="{{ asset('storage/' . ($serv->usuario?->registro?->avatar ?? 'default-avatar.png')) }}"
                                alt="Foto de perfil de {{ $serv->usuario->name ?? 'Usuario' }}" class="avatar">

                            <div class="solicitud-info">
                                <h4>{{ $serv->nombre }}</h4>
                                <div class="time-ago date">solicitidado {{ $serv->created_at->diffForHumans() }}</div>
                            </div>
                        </div>

                        <div class="extra-info">
                            <div class="user-details">
                                <span class="name">Servicio:
                                    {{ $serv->profesion->nombre ?? 'Usuario Desconocido' }}</span>
                                <p class="my-0">{{ $serv->descripcion }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No hay solicitudes disponibles.</p>
                @endforelse
            </section>
        </div>

        <section class="right-panel" id="detalle" aria-live="polite" aria-label="Detalles de solicitud">
            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="No hay selección" />
            <h2>Selecciona una solicitud</h2>
            <p>Haz clic en una tarjeta para ver más detalles aquí.</p>
        </section>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/map-work.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/service.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endsection
