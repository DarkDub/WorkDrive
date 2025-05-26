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
        <div class="header" id="header-profile">
            {{-- Imagen de fondo y foto de perfil --}}
            <img src="{{ asset('image/fondo.jpg') }}" alt="Fondo" class="cover-photo">
            <div class="profile-pic-container">
                <img class="profile-pic" id="previewImage" src="{{ asset('storage/' . $user->registro->avatar) }}"
                    alt="Foto de perfil actual">
                <div>
                    <h2>{{ $user->registro->nombre . ' ' . $user->registro->apellido }}</h2>
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
                {{-- <div class="stats">
                    <div><strong>1,947</strong><span>Follower</span></div>
                    <div><strong>9,124</strong><span>Following</span></div>
                </div> --}}

                <div class="about">
                    <h4>Acerca de</h4>
                    <p class="info">Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping
                        cake wafer.. </p>
                    <ul>
                        <li><strong><i class="bi bi-geo-alt-fill"></i> Vive en </strong>
                            {{ optional(optional($user->registro)->municipio)->nombre ?? 'No especificado' }}
                        </li>
                        <li><strong><i class="bi bi-envelope-check-fill"></i></strong> {{ $user->registro->email }}</li>
                    </ul>
                </div>

                <div class="social">
                    <h4>Social</h4>
                    <div style="display: flex; gap: 10px; font-size: 1.5rem; flex-direction: column;">
                        <div class="icon">

                            <a href="https://facebook.com" target="_blank" style="color: #1877F2;">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <p>facebook</p>
                        </div>

                        <!-- Instagram (gradiente simulado con CSS) -->
                        <div class="instagram-icon icon">
                            <a href="https://instagram.com" target="_blank"
                                style="
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 1em;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <p>
                                Instagram
                            </p>
                        </div>
                        <div class="icon">
                            <a href="https://linkedin.com" target="_blank" style="color: #0A66C2;">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <p>Linkedin</p>
                        </div>

                    </div>
                </div>
            </aside>


            {{-- Contenido principal --}}
            <section class="content">
                <div class="post-box">
                    <div class="post-actions">
                        <div class="post-action">

                            <p class="info-p"><i class="fas fa-user"></i> Informacion</p>
                            <a href="{{ route('profile.edit') }}"> <i class="bi bi-pencil-square"></i> editar</a>
                        </div>

                        <ul>
                            <strong>Nombre</strong>
                            <li>{{ $user->registro->nombre }}</li>
                            <strong>Apellido</strong>
                            <li>{{ $user->registro->apellido }}</li>
                            <strong>Telefono</strong>
                            <li><i class="bi bi-telephone"></i> {{ $user->registro->telefono }}</li>
                            <strong> Ubicacion</strong>
                            <li>
                                <i class="bi bi-geo-alt"></i>
                                {{ optional(optional($user->registro)->pais)->nombre ?? 'No especificado' }},
                            </li>

                            <strong>Email</strong>
                            <li><i class="bi bi-envelope-at"></i> {{ $user->registro->email }}</li>
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
