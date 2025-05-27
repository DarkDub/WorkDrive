 <aside class="sidebar" role="navigation" aria-label="Menú principal">
    <h2>WorkDrive</h2>
    <a href="{{route('trabajador.index')}}" class="menu-item" tabindex="0" role="link" aria-label="Inicio"> 
        <i class="fa-solid fa-house" aria-hidden="true"></i> Inicio
    </a>
    <a class="menu-item" tabindex="0" role="link" aria-label="Servicios">
        <i class="fa-solid fa-list" aria-hidden="true"></i> Servicios
    </a>
    <a href="{{route('solicitudes.estado')}}" class="menu-item" tabindex="0" role="link" aria-label="Solicitudes">
        <i class="fa-solid fa-handshake" aria-hidden="true"></i> Solicitudes
    </a>
    <a href="" class="menu-item" tabindex="0" role="link" aria-label="Trabajados">
        <i class="fa-solid fa-user" aria-hidden="true"></i> Trabajados
    </a>
</aside>
  <x-menu-nav>
        <li><a href="{{ route('profesiones.index') }}"><i class="bi bi-house-door icon-lg" aria-hidden="true"></i> Inicio</a></li>
        <li><a href="/usuario/inicio.html"><i class="bi bi-person-circle" aria-hidden="true"></i> Perfil</a></li>
        <li><a href="/usuario/Menuu/Servicios.html"><i class="bi bi-briefcase icon-lg" aria-hidden="true"></i> Servicios</a></li>
        <li><a href="/usuario/Menuu/Contacto.html"><i class="bi bi-telephone icon-lg" aria-hidden="true"></i> Contacto</a></li>
        <li><a href="/usuario/Menuu/Acercade.html"><i class="bi bi-info-circle icon-lg" aria-hidden="true"></i> Acerca de</a></li>
    </x-menu-nav>
<main class="main-content">
    
 <header class="header" role="banner">
        <h1>Panel de Trabajadores</h1>
        <div class="user-avatar" aria-label="Información del usuario">
            <span>{{ $user->name }}</span>
            <div class="menu-icon" id="menu-icon" aria-haspopup="true" aria-expanded="false">
            <x-avatar class="avatar" />

            </div>
        </div>
    </header>

