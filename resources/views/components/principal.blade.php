<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/roles.css') }}">
    @stack('styles')
    
</head>
<body> 
        <!-- Sidebar -->
        <x-sidebar />

            <!-- Barra Superior -->
            <x-topbar />

            <!-- Contenido principal debajo -->
            <main class="content p-4">
                @yield('content')
            </main>
        </div>
    </div>



    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html> 


<!-- Barra Superior -->
    {{-- <div class="topbar d-flex align-items-center px-4">
        <h3 class="m-0">WorkDrive</h3>
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-bell fs-4"></i>
            <div class="d-flex align-items-center"> --}}
                {{-- <i class="bi bi-person-circle fs-4 me-2"></i> --}}
                {{-- <img src="{{ asset('storage/' . Auth::user()->registro->avatar) }}" alt="Avatar" class="avatar-img"> --}}
                {{-- <span class="fs-5 me-5">{{ Auth::user()->name }}</span> --}}
                {{-- <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="d-inline-block text-white text-decoration-none px-4 py-2 rounded-3 shadow-sm"
                    style="
        background: linear-gradient(135deg, #8d3e30, #a35345); 
        font-weight: 600; 
        font-size: 1rem;
        transition: all 0.3s ease;
    "
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(99,102,241,0.25)'"
                    onmouseout="this.style.transform='none'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.05)'">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        </div>
    </div> --}}