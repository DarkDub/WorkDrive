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
    <title>Permisos</title>
</head>

<body>

    <x-principal>
        <div class="container py-4">
            <h2 class="mb-4">Panel de Permisos</h2>

            <!-- Dashboard -->

            <!-- Lista de Clientes -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <h2 class="h5 m-0 fw-bold">Lista de Permisos</h2>
                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                        + Agregar Permisos
                    </button>
                    <a href="{{ route('permisos.eliminados') }}" class="btn btn-danger">
                        <i class="bi bi-person-x-fill"></i> Eliminados
                    </a>
                </div>
            </div>

            <div class="table-responsive shadow-sm rounded-3 p-3 bg-white">
                <table class="table table-striped align-middle text-center mb-0" id="permisos">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Creacion</th>
                            <th>Actualizacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permisos as $permiso)
                            <tr>
                                <td>{{ $permiso->id }}</td>
                                <td>{{ $permiso->nombre }}</td>
                                <td>{{ $permiso->descripcion }}</td>
                                <td>{{ $permiso->estado }}</td>
                                <td>{{ $permiso->created_at }}</td>
                                <td>{{ $permiso->updated_at }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-danger btn-sm"
                                            data-bs-target="#confirmDeleteModal-{{ $permiso->id }}"
                                            data-bs-toggle="modal">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        {{-- editar --}}
                                        <a href="{{ route('permisos.edit', $permiso->id) }}"
                                            class="btn btn-sm btn-warning text-white shadow-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        {{-- Elimiar --}}
                                        <x-modal-confirm-delete :id="$permiso->id" :route="route('permisos.cambiarEstado', [$permiso->id, '*'])" :name="$permiso->nombre"
                                            :mensaje="'Eliminar'" :tipo="'el permiso...'" />

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No hay permisos registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Modal Agaregar permisos --}}
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
            data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Agregar Permiso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('permisos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Permiso</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"

                                    value="{{ old('nombre') }}">

                                    
                                @error('nombre')
                                    <div class="alert alert-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <div class="alert alert-danger">*{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                        <label for="padre" class="form-label">Estado</label>
                        <select class="form-select" aria-label="Default select example mb-3" id="padre"
                            name="padre">
                            <option selected value="">Selecciona un rol padre</option>
                            @foreach ($rol as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                            @endforeach
                    </div> --}}
                            </select>
                            <div class="footer d-flex pt-2 w-100 mt-3">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-danger mx-3"
                                    data-bs-dismiss="modal">cancelar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </x-principal>
