@extends('layouts.app')

@section('title', 'Work Drive')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client-style/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuActive.css') }}">

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
    </style>
@endsection

@section('content')
    {{-- Menú superior --}}
    <header class="header">
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
                <li><a href="#"><i class="bi bi-briefcase icon-lg"></i> Servicios</a></li>
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

    {{-- Perfil --}}
    <div class="profile-container">
        <div class="header">
            <img src="{{ asset('image/fondo.jpg') }}" alt="Fondo" class="cover-photo">
            <div class="profile-pic-container">
                <img class="profile-pic" id="previewImage" src="{{ asset('storage/' . $user->registro->avatar) }}"
                    alt="Foto de perfil actual">
                <div>
                    <h2>{{ $user->registro->nombre }}</h2>
                    <p class="role">CTO</p>
                </div>
            </div>
        </div>

        {{-- Navegación del perfil --}}
        <div class="nav-tabs">
            <button class="active"><i class="fas fa-user"></i> Profile</button>
            <button><i class="fas fa-briefcase"></i> Servicios</button>
            <button><i class="fas fa-clock-rotate-left"></i> Historial</button>
            <button><i class="fas fa-info-circle"></i> Info</button>
        </div>

        <div class="main-content">
            {{-- Sidebar --}}
            <aside class="sidebar">
                <div class="stats">
                    <div><strong>1,947</strong><span>Follower</span></div>
                    <div><strong>9,124</strong><span>Following</span></div>
                </div>

                <div class="about">
                    <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes.</p>
                    <ul>
                        <li><strong>📍</strong> {{ $user->registro->pais->nombre }}</li>
                        <li><strong>📧</strong> {{ $user->registro->email }}</li>
                        <li><strong>🎓</strong> Studied at Nikolaus - Leuschke</li>
                    </ul>
                </div>

                <div class="social">
                    <a href="#">🔵 Facebook</a>
                    <a href="#">🟣 Instagram</a>
                    <a href="#">🔷 LinkedIn</a>
                    <a href="#">❌ Twitter</a>
                </div>
            </aside>

            {{-- Contenido principal --}}
            <section class="content">
                <div class="post-box">
                    <div class="post-actions">
                        <p class="info-p"><i class="fas fa-user"></i> Acerca de mi</p>
                        <ul>
                            <li><strong>📍</strong> {{ $user->registro->pais->nombre }}</li>
                            <li><strong>📧</strong> {{ $user->registro->email }}</li>
                            <li><strong>🎓</strong> Studied at Nikolaus - Leuschke</li>
                        </ul>
                    </div>
                </div>

                {{-- Si deseas agregar publicaciones reales, descomenta el siguiente bloque --}}
                {{--
                <div class="post">
                    <div class="post-header">
                        <strong>Jaydon Frankie</strong>
                        <span>19 May 2025</span>
                    </div>
                    <p>The sun slowly set over the horizon, painting the sky in vibrant hues of orange and pink.</p>
                    <img src="{{ asset('image/avatar-2.jpg') }}" alt="Sunset post">
                    <div class="reactions">
                        ❤️ 20 likes - 💬 5 comentarios
                    </div>
                </div>
                --}}
            </section>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/principal-page/modal-page.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('js/principal-page/map.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endsection
