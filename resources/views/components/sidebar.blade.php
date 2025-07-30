<!-- Menú Lateral -->
      <div class="sidebar">
        <div class="menu-header">
            <i class="bi bi-grid"></i>
            <span class="menu-text fs-5">Menú</span>
        </div>
        <ul class="nav flex-column px-2 mt-3 w-100">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-house-door"></i>
                    <span class="menu-text">Inicio</span>
                </a>
            </li>
            <li class="nav-item">
                <a href='{{ route('rol.index') }}' class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-dpad-fill"></i>
                    <span class="menu-text">Roles</span>
                </a>
            </li>
            <li class="nav-item">
                <a href='{{ route('admin_user.index') }}' class="nav-link text-white d-flex align-items-center">  
                     <i class="bi bi-person-lock"></i>

                    <span class="menu-text">usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a href='{{ route('clientes.index') }}' class="nav-link text-white d-flex align-items-center"> 
                    <i class="bi bi-people-fill"></i>
                    <span class="menu-text">Clientes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href='{{ route('jobs.index') }}' class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-person-lines-fill"></i>

                    <span class="menu-text">trabajadores</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('acciones.index') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-check-circle"></i>
                    <span class="menu-text">acciones</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('permisos.index') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-lock"></i>
                    <span class="menu-text">permisos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('configuraciones.index') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-gear-wide-connected"></i>
                    <span class="menu-text">Configuración</span>
                </a>
            </li>
        </ul>
    </div> 

<!-- resources/views/components/sidebar.blade.php -->
{{-- <div id="sidebar" class="sidebar">  
    <!-- Botón para expandir/colapsar -->
    <div class="toggle-btn" id="toggleSidebar">
        <i class="bi bi-chevron-right"></i>
    </div>

    <!-- Logo & Close Button -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-2">
            <div class="bg-green-600 p-2 rounded-md">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 3v18m9-9H3"/></svg>
            </div>
            <span class="text-xl font-semibold">OripioFin</span>
        </div>
        <button class="text-gray-400 hover:text-black">×</button>
    </div>

    <!-- Search -->
    <div class="mb-6">
        <input type="text" placeholder="Search" class="w-full px-3 py-2 text-sm bg-gray-100 rounded-lg focus:outline-none">
    </div>

    <!-- Main Menu -->
    <div>
        <p class="text-gray-400 text-xs font-bold uppercase mb-2">Main Menu</p>
        <ul class="space-y-1 text-sm">
            <li class="{{ request()->routeIs('dashboard') ? 'bg-gray-200 text-white rounded-lg' : '' }}">
                <a href="/dashboard" class="flex items-center px-3 py-2 space-x-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12l2-2 4 4 8-8 2 2"/></svg>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('rol.index') ? 'bg-gray-200 text-white rounded-lg' : '' }}">
                <a href="{{ route('rol.index') }}" class="flex items-center px-3 py-2 space-x-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6h13v6M9 10V4h13v6M4 20h16v-2H4z"/></svg>
                    <span class="menu-text">Roles</span>
                    <span class="ml-auto text-xs bg-gray-200 px-2 py-0.5 rounded-full">20</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin_user.index') ? 'bg-gray-200 text-white rounded-lg' : '' }}">
                <a href="{{ route('admin_user.index') }}" class="flex items-center px-3 py-2 space-x-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 10h11M9 21V3m12 4h-8"/></svg>
                    <span class="menu-text">Usuarios</span>
                    <span class="ml-auto text-xs bg-gray-200 px-2 py-0.5 rounded-full">15</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('clientes.index') ? 'bg-gray-200 text-white rounded-lg' : '' }}">
                <a href="{{ route('clientes.index') }}" class="flex items-center px-3 py-2 space-x-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-2a4 4 0 0 1 8 0v2M3 20h18"/></svg>
                    <span class="menu-text">Clientes</span>
                    <span class="ml-auto text-xs bg-gray-200 px-2 py-0.5 rounded-full">25</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Features -->
    <div class="mt-6">
        <p class="text-gray-400 text-xs font-bold uppercase mb-2">Features</p>
        <ul class="space-y-1 text-sm">
            <li class="{{ request()->routeIs('jobs.index') ? 'bg-gray-900 text-white rounded-lg' : '' }}">
                <a href="{{ route('jobs.index') }}" class="flex items-center px-3 py-2 space-x-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4l3 3M4 4h16v16H4z"/></svg>
                    <span class="menu-text">Trabajadores</span>
                    <span class="ml-auto text-xs bg-gray-200 px-2 py-0.5 rounded-full">16</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-3 py-2 space-x-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h7"/></svg>
                    <span class="menu-text">Subscriptions</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-3 py-2 space-x-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9"/></svg>
                    <span class="menu-text">Feedback</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- General -->
    <div class="mt-6">
        <p class="text-gray-400 text-xs font-bold uppercase mb-2">General</p>
        <ul class="space-y-1 text-sm">
            <li>
                <a href="#" class="flex items-center px-3 py-2 space-x-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                    <span class="menu-text">Settings</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-3 py-2 space-x-2 text-gray-600 hover:bg-gray-100 rounded-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6h13v6M9 10V4h13v6M4 20h16v-2H4z"/></svg>
                    <span class="menu-text">Help Desk</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-3 py-2 space-x-2 text-red-500 hover:bg-red-100 rounded-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                    <span class="menu-text">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Upgrade -->
    <div class="mt-6 bg-yellow-100 p-3 rounded-lg text-center text-sm">
        <p class="font-semibold">Upgrade Pro! 🔥</p>
        <p class="text-xs text-gray-600 mb-2">Higher productivity with better organization</p>
        <button class="bg-green-600 text-white px-3 py-1 rounded-full text-xs">Upgrade</button>
        <a href="#" class="text-green-700 block text-xs mt-1 underline">Learn more</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        const icon = toggleBtn.querySelector('i');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            icon.classList.toggle('bi-chevron-left');
            icon.classList.toggle('bi-chevron-right');
        });
    });
</script>  --}}