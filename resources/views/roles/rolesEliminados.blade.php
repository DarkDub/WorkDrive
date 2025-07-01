<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/roles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
    <title>Roles</title>
</head>

<body>
    <x-principal>
        <div class="container-content">
            <div class="table-container">
                <div class="header d-flex justify-content-between align-items-center">
                    <h2>Labores Eliminadas</h2>
                    <a href="{{ route('rol.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left-short"></i>
                        Regresar
                    </a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Nombre Padre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rol as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->descripcion }}</td>
                                <td>{{ $usuario->rolPadre ? $usuario->rolPadre->nombre : 'sin padre' }}</td>
                                <td>
                                    {{-- <a class="btn btn-warning btn-sm" href="rolEditar/{{ $usuario['id'] }}"><i
                                            class="bi bi-pencil"></i></a> --}}
                                    <button class="btn btn-danger btn-sm"
                                        data-bs-target="#confirmRestaurarModal-{{ $usuario->id }}"
                                        data-bs-toggle="modal">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>


                                    <!-- Incluir el modal como componente -->
                                    <x-modal-confirm-restaurar :id="$usuario->id" :route="route('rol.estado', [$usuario->id, 'A'])" :name="$usuario->nombre"
                                        :mensaje="'restaurar'" :tipo="'el Rol:.... '" />

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Agregar Labor -->

    </x-principal>

</body>

</html>
