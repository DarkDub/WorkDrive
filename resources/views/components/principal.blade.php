<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/prove.css') }}">
</head>

<body>
    <!-- Menú Lateral -->
    <div class="sidebar">
        <div class="menu-header">
            <i class="bi bi-grid"></i>
            <span class="menu-text fs-5">Menú</span>
        </div>
        <ul class="nav flex-column px-2 mt-3 w-100">
            <li class="nav-item">
                <a href="/" class="nav-link text-white d-flex align-items-center">
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
                <a href='{{route('admin_user.index')}}' class="nav-link text-white d-flex align-items-center">
                    {{-- <i class="bi bi-graph-up-arrow"></i> --}}
                    <i class="bi bi-person-lock"></i>

                    <span class="menu-text">usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a href='{{ route('clientes.index') }}' class="nav-link text-white d-flex align-items-center">
                    {{-- <i class="bi bi-graph-up-arrow"></i> --}}
                    <i class="bi bi-people-fill"></i>
                    <span class="menu-text">Clientes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href='{{ route('prove.index') }}' class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-person-lines-fill"></i>

                    <span class="menu-text">Proveedores</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rol.index') }}" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-check-circle"></i>
                    <span class="menu-text">acciones</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-lock"></i>
                    <span class="menu-text">permisos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex align-items-center">
                    <i class="bi bi-gear-wide-connected"></i>
                    <span class="menu-text">Configuración</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Barra Superior -->
    <div class="topbar d-flex align-items-center px-4">
        <h3 class="m-0">WorkDrive</h3>
        <div class="d-flex align-items-center gap-4">
            <i class="bi bi-bell fs-4"></i>
            <div class="d-flex align-items-center">
                <i class="bi bi-person-circle fs-4 me-2"></i>
                <span class="fs-5">Usuario Logueado</span>
            </div>
        </div>
    </div>

    <!-- Contenido Principal -->
    <div class="content">
        {{ $slot }}

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>


</html>
