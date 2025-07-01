@extends('layouts.app')

@section('title', 'Work Drive')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/principal.css') }}">
@endsection

@section('content')

    <aside class="sidebar">
        <h2>WorkDrive</h2>
        <div class="menu-item" tabindex="0">
            <!-- Icono de Inicio usando Bootstrap Icons -->
            <i class="fa-solid fa-house"></i>
            Inicio
        </div>
        <div class="menu-item" tabindex="0">
            <!-- Icono de Servicios usando Bootstrap Icons -->
            <i class="fa-solid fa-list"></i>
            Servicios
        </div>
        <div class="menu-item" tabindex="0">
            <!-- Icono de Solicitudes usando Bootstrap Icons -->
            <i class="fa-solid fa-handshake"></i>
            Solicitudes
        </div>
        <div class="menu-item" tabindex="0">
            <!-- Icono de Perfil usando Bootstrap Icons -->
            <i class="fa-solid fa-user"></i>
            Trabajados
        </div>
    </aside>

    <div class="main-content">
        <header class="header">
            <h1>Panel de Trabajadores</h1>
            <div class="user-avatar">
                <span>{{ $user->name }}</span>
                <div class="menu-icon" id="menu-icon">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Avatar" />
                </div>
            </div>
        </header>
        {{-- @if ($latitud && $longitud)
              <p>Tu última ubicación guardada es:</p>
              <ul>
                  <li>Latitud: {{ $latitud }}</li>
                  <li>Longitud: {{ $longitud }}</li>
              </ul>
          @else
              <p>No tenemos tu ubicación registrada aún.</p>
          @endif --}}

        <!-- Navegación -->
        <x-menu-nav>
            <li>
                <a href="{{ route('profesiones.index') }}">
                    <i class="bi bi-house-door icon-lg"></i> Inicio
                </a>
            </li>
            <li>
                <a href="/usuario/inicio.html">
                    <i class="bi bi-person-circle"></i> Perfil
                </a>
            </li>
            <li>
                <a href="/usuario/Menuu/Servicios.html">
                    <i class="bi bi-briefcase icon-lg"></i> Servicios
                </a>
            </li>
            <li>
                <a href="/usuario/Menuu/Contacto.html">
                    <i class="bi bi-telephone icon-lg"></i> Contacto
                </a>
            </li>
            <li>
                <a href="/usuario/Menuu/Acercade.html">
                    <i class="bi bi-info-circle icon-lg"></i> Acerca de
                </a>
            </li>
            <!-- Cerrar sesión y modo trabajador-->

        </x-menu-nav>

        <div class="content" id="content">
            <section class="left-panel">
                @foreach ($servicios as $serv)
                    <div class="solicitud-card"
                        onclick="mostrarDetalle(
          '{{ $serv->nombre }}',
          '',
          '',
          '',
          '',
          '',
          '')">
                        <div class="content-target">

                            <img src="https://randomuser.me/api/portraits/women/60.jpg" class="avatar" alt="avatar" />
                            <div class="solicitud-info">
                                <h4>{{ $serv->nombre }}</h4>
                                <p>{{ $serv->descripcion }}</p>
                            </div>
                        </div>


                        <i class="time-ago">2 day</i>

                    </div>
                @endforeach
            </section>
            <section class="right-panel" id="detalle">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="empty" />
                <h2>Selecciona una solicitud</h2>
                <p>Haz clic en una tarjeta para ver más detalles aquí.</p>
            </section>
        </div>
    </div>


    </body>
@endsection
@section('scripts')

    <script>
        function mostrarDetalle(nombre, descripcion, imagen, direccion, fecha, hora, telefono) {
            const panel = document.getElementById('detalle');
            panel.innerHTML = `
        <img src="${imagen}" alt="${nombre}" />
        <h2>${nombre}</h2>
        <p style="margin-bottom: 1rem;">${descripcion}</p>
        <div style="text-align: left; width: 100%; max-width: 400px;">
          <p><strong>Dirección:</strong> ${direccion}</p>
          <p><strong>Fecha:</strong> ${fecha}</p>
          <p><strong>Hora:</strong> ${hora}</p>
          <p><strong>Teléfono:</strong> ${telefono}</p>
        </div>
        <button style="
          margin-top: 2rem;
          padding: 0.75rem 1.5rem;
          background-color: #2563eb;
          color: white;
          border: none;
          border-radius: 0.5rem;
          font-size: 1rem;
          cursor: pointer;
          transition: background-color 0.3s ease;
        " onmouseover="this.style.backgroundColor='#1d4ed8'" onmouseout="this.style.backgroundColor='#2563eb'">
          Aceptar Servicio
        </button>
      `;
        }
    </script>
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/map-work.js') }}"></script>
@endsection
