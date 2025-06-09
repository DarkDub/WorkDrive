@extends('layouts.app')

@section('title', 'Work Drive')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/principal.css') }}">

@endsection

@section('content')
    <x-menuWork />


    <!-- Navegación secundaria -->


    <h2 class="title-content">Solicitudes</h2>

    <section class="content" id="content" aria-live="polite">
        <section class="left-panel" aria-label="Lista de solicitudes">
            @foreach ($servicios as $serv)
                <article class="solicitud-card {{ $serv->trabajador_id ? 'aceptado' : '' }}" data-id="{{ $serv->id }}"
                    data-trabajador="{{ $serv->trabajador_id ?? '' }}" role="button" tabindex="0" aria-pressed="false"
                    aria-label="Solicitud {{ $serv->nombre }} {{ $serv->trabajador_id ? '(Aceptada)' : '(Pendiente)' }}">
                    <div class="content-target">
                        <img src="{{ asset('storage/' . ($serv->usuario?->registro?->avatar ?? 'default-avatar.png')) }}"
                            alt="Avatar de usuario" class="avatar">
                        <div class="solicitud-info">
                            <h4>{{ $serv->nombre }}</h4>
                            <p>{{ $serv->descripcion }}</p>
                        </div>
                    </div>
                    <i class="time-ago">{{ $serv->created_at->diffForHumans() }}</i>
                </article>
            @endforeach
        </section>

        <section class="right-panel" id="detalle" aria-live="polite" aria-label="Detalles de solicitud">
            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="No hay selección" />
            <h2>Selecciona una solicitud</h2>
            <p>Haz clic en una tarjeta para ver más detalles aquí.</p>
        </section>
    </section>

    </main>


@endsection

@section('scripts')
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/map-work.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/service.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


@endsection
