<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Bootstrap y estilos externos --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    {{-- Fuentes opcionales --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    {{-- Estilos de la app --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- Estilos personalizados --}}
    <style>
        .fade {
            transition: 0.5s;
        }

        .sidebar {
            background-color: #343a40;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            color: #ccc;
        }
    </style>

    {{-- Estilos específicos de la vista --}}
    @yield('styles')
</head>

<body {{-- class="font-sans antialiased bg-light" --}}>
    {{-- Sidebar y barra superior --}}
    @include('components.sidebar')
    @include('components.topbar')

    {{-- Contenido principal --}}
    <div class="content">
        @yield('content') {{-- Para vistas tipo Blade --}}
        {{ $slot ?? '' }} {{-- Para vistas tipo componente --}}
    </div>

    {{-- jQuery, Bootstrap y DataTables --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Scripts comunes --}}
    @include('components.scripts')

    {{-- Scripts personalizados --}}
    @yield('scripts')
    @yield('js')
</body>

</html>
