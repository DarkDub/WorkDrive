<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/roles.css') }}">
    <title>Permisos Eliminados</title>
</head>

<body>

    <x-principal>
        <div class="container-content">
            <div class="table-container">
                <div class="header d-flex justify-content-between align-items-center">
                    <h2>permisos Eliminados</h2>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Creacion</th>
                        <th>Actualizacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permisos  as $permiso)
                            <tr>
                            <td>{{ $permiso->id }}</td> 
                            <td>{{ $permiso->nombre }}</td>
                            <td>{{ $permiso->descripcion }}</td>
                            <td>{{ $permiso->estado }}</td>
                            <td>{{ $permiso->created_at }}</td>
                            <td>{{ $permiso->updated_at }}</td>
                                
                                <td style="height:0.1rem;width:1rem;">

                                         <!-- btn Restaurar -->
                                        <button class="btn btn-success btn-sm"
                                        data-bs-target="#confirmDeleteModal-{{ $permiso->id }}"
                                        data-bs-toggle="modal"><i class="bi bi-arrow-counterclockwise"></i></button>
                                    
                                    <!-- Incluir el modal como componente -->
                                    <x-modal-confirm-delete
                                    :id="$permiso->id"
                                    :route="route('permisos.cambiarEstado', [$permiso->id,'A'])"
                                    :name="$permiso->nombre"
                                    :mensaje="'Restaurar'"
                                    :tipo="'el Permiso:.... '"
                                    />
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </x-principal>

</body>

</html>
