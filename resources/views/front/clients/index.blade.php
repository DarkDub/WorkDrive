@extends('layouts.app')

@section('title', 'Work Drive')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuActive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
    <style>
        .map-section {
            height: 400px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        #map {
            height: 100%;
            width: 100%;
        }

        .form-control {
            border-radius: var(--radius-md);
            padding: 0.75rem;
            font-size: var(--font-size-base);
            background-color: var(--color-input-bg);
            border: 1px solid var(--color-input-border);
            transition: 0.3s ease, color 0.5s ease;
            box-sizing: border-box;
        }

        .form-label {
            font-weight: 500;
            font-size: var(--font-size-sm);
            margin-bottom: 0.2rem;
        }
    </style>
@endsection

@section('content')
    <header class="header">
        <div class="menu-container">
            <div class="logo">
                <div class="menu-icon" id="menu-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="text-logo">Work Drive</div>
            </div>

            <x-menu-nav>
                <li><a href="{{ route('cliente.index') }}"><i class="bi bi-house-door icon-lg"></i> Inicio</a></li>
                <li><a href="{{ route('profile.index') }}"><i class="bi bi-person-circle"></i> Perfil</a></li>
                <li><a href="#"><i class="bi bi-briefcase icon-lg"></i> Servicios</a></li>
                <li><a href="#"><i class="bi bi-telephone icon-lg"></i> Contacto</a></li>
                <li><a href="#"><i class="bi bi-info-circle icon-lg"></i> Acerca de</a></li>
            </x-menu-nav>
        </div>
        <div class="nav-left">
            <a href="#">
                <h5>Sobre nosotros</h5>
            </a>
            <a href="#">
                <h5>Contáctanos</h5>
            </a>
        </div>
    </header>

    <main class="main-container">
        <aside class="sidebar">
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" placeholder="Buscar profesiones..." class="search-input" />
            </div>

            <ul class="list-group">
                @foreach ($profesiones as $profesion)
                    <li class="list-group-item profesion-item tarjeta" id="list-group-item" data-id="{{ $profesion->id }}">
                        <div class="icon-circle">
                            <span class="iconify icono-profesion" data-icon="{{ $profesion->icono }}" data-width="22"
                                data-height="22"></span>
                        </div>
                        <div class="profesion-info">
                            <strong class="profesion-nombre">{{ $profesion->nombre }}</strong>
                            <small class="profesion-desc">{{ $profesion->descripcion }}</small>
                        </div>
                    </li>
                @endforeach
            </ul>
        </aside>

        <div class="map-section" id="map"></div>
        <div id="lista-trabajadores"></div>

        <aside class="form-section">
            <div class="form-header">

                <i class="fas fa-map-marker-alt"></i>
                <span>Dirección: Dg. 18 161</span>
            </div>

            <form id="work-form" method="POST" action="{{ route('servicios.store') }}">
                @csrf

                <x-input-error :messages="$errors->get('nombre')" />
                <input type="text" name="nombre" placeholder="Tu nombre" class=" @error('nombre')
is-invalid
@enderror"
                    autofocus value="{{ old('fecha') }}">
                <x-input-error :messages="$errors->get('fecha')" />
                <input type="date" name="fecha" class=" @error('nombre')
is-invalid
@enderror" autofocus>
                <x-input-error :messages="$errors->get('hora')" />
                <input type="time" name="hora" class=" @error('nombre')
is-invalid
@enderror" autofocus>

                <x-input-error :messages="$errors->get('descripcion')" />

                <textarea name="descripcion" placeholder="Descripción" rows="3"
                    class=" @error('descripcion')
is-invalid
@enderror" autofocus></textarea>
                <x-input-error :messages="$errors->get('tarifa')" />

                <input type="text" name="tarifa" placeholder="Tarifa"
                    class=" @error('tarifa') is-invalid
                @enderror" autofocus>

                <input type="hidden" name="pago_id" id="pago_id_hidden" required>
                <input type="hidden" name="labor_id" id="profesion_id" required>
                <input type="hidden" name="estado" value="" required>
                <input type="hidden" name="latitud" id="user-lat">
                <input type="hidden" name="longitud" id="user-lon">

                <div class="payment-method" id="payment-method">
                    <i class="fas fa-credit-card"></i> <span class="method-text">Seleccionar método de pago</span>
                </div>

                <button type="submit" class="submit-btn">Solicitar Servicio</button>
            </form>
        </aside>

        <div id="paymentModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Métodos de Pago</h2>
                <ul class="metodos_pagos">
                    @foreach ($metodosPago as $metodo)
                        <li data-id="{{ $metodo->id }}">
                            <span class="iconify" data-icon="{{ $metodo->icono }}"
                                style="width: 24px; height: 24px; margin-right: 10px;"></span>
                            {{ $metodo->nombre }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/principal-page/modal-page.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('js/principal-page/map.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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

    <script>
        document.getElementById("work-form").addEventListener("submit", function(e) {
            const laborInput = document.getElementById("profesion_id");
            if (!laborInput.value) {
                e.preventDefault();
                Toastify({
                    text: "seleccione una labor",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "#ffffff"
                    }, // verde
                    close: true,
                    avatar: "https://cdn-icons-png.flaticon.com/512/463/463612.png"
                }).showToast();
            }
        });
    </script>
    <script>
        document.querySelectorAll('.profesion-item').forEach(item => {
            item.addEventListener('click', () => {
                const laborId = item.dataset.id;
                const laborNombre = item.querySelector('.profesion-nombre').innerText;

                document.getElementById('profesion_id').value = laborId;

                Toastify({
                    text: `Labor seleccionada: ${laborNombre}`,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "#ffffff"
                    },
                    close: true,
                    avatar: "https://cdn-icons-png.flaticon.com/512/190/190411.png"
                }).showToast();
            });
        });
    </script>

@endsection
