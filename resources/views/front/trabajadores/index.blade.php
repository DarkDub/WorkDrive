@extends('layouts.app')

@section('title', 'Work Drive')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/principal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notificaciones.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    </style>
@endsection

@section('content')
    <x-menuWork />

    <section class="content" id="content" aria-live="polite">
        <div id="content-left-solicitudes" class="content-left">
            <h2 class="title-content">Solicitudes</h2>

            <section class="left-panel" aria-label="Lista de solicitudes">
                @forelse ($servicios as $serv)
                    <div class="solicitud-card" data-id="{{ $serv->id }}"
                        data-trabajador="{{ $serv->trabajador_id ?? '' }}"
                        data-direccion="{{ $serv->direccion ?? 'No especificada' }}"
                        data-fecha="{{ $serv->fecha ?? '---' }}" data-hora="{{ $serv->hora ?? '---' }}"
                        data-telefono="{{ $serv->usuario?->telefono ?? 'No disponible' }}"
                        data-nombre="{{ $serv->nombre }}" data-descripcion="{{ $serv->descripcion }}"
                        data-estado="{{ strtolower($serv->estado->nombre) }}"
                        data-avatar="{{ asset('storage/' . ($serv->usuario?->registro?->avatar ?? 'default-avatar.png')) }}"
                        role="button" tabindex="0" aria-pressed="false"
                        aria-label="Solicitud {{ $serv->nombre }} ({{ ucfirst($serv->estado->nombre) }})" id="card">

                        <div class="status">
                            <div class="estado {{ strtolower($serv->estado->nombre) }}">
                                {{ ucfirst($serv->estado->nombre) }}
                            </div>
                        </div>

                        <div class="content-target">
                            <img src="{{ asset('storage/' . ($serv->usuario?->registro?->avatar ?? 'default-avatar.png')) }}"
                                alt="Foto de perfil de {{ $serv->usuario->name ?? 'Usuario' }}" class="avatar">

                            <div class="solicitud-info">
                                <h4>{{ $serv->nombre }}</h4>
                                <div class="time-ago date">Solicitado {{ $serv->created_at->diffForHumans() }}</div>
                            </div>
                        </div>

                        <div class="extra-info">
                            <div class="user-details">
                                <span class="name">Servicio:
                                    {{ $serv->profesion->nombre ?? 'Desconocido' }}</span>
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
            <div class="right-panel2">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="No hay selección" />
                <h2>Selecciona una solicitud</h2>
                <p>Haz clic en una tarjeta para ver más detalles aquí.</p>
            </div>
        </section>
    </section>
    <!-- Modal de propuesta -->
    <!-- Modal de Enviar Propuesta -->
    <!-- Modal HTML -->
    <div class="modal fade" id="modalPropuesta" tabindex="-1" aria-labelledby="modalPropuestaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formPropuesta" method="POST" action="{{ route('propuestas.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalPropuestaLabel">Enviar Propuesta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="servicio_id" id="modalServicioId">

                        <div class="mb-3">
                            <label for="monto" class="form-label">Monto</label>
                            <input type="number" name="monto" id="monto" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tiempo_estimado" class="form-label">Tiempo Estimado</label>
                            <input type="text" name="tiempo_estimado" id="tiempo_estimado" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea name="mensaje" id="mensaje" class="form-control" rows="3" required></textarea>
                        </div>

                        <div id="mensajePropuesta" class="text-center mt-2"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Enviar Propuesta</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/service.js') }}"></script>
    <script src="{{ asset('js/notificacionesAjax.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @if ($errors->any() || session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('modalPropuesta'));
                modal.show();
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                gravity: "top",
                position: "right",
                style: {
                    background: "#ffffff"
                }, // verde
                close: true,
                avatar: "https://cdn-icons-png.flaticon.com/512/845/845646.png"
            }).showToast();
        </script>
    @endif

@endsection
