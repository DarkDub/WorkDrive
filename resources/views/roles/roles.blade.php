<!doctype html>
@php
$permisos = \App\Models\Permisos::all();
@endphp
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
                    <h2>Roles Agregadas</h2>
                    <div class="d-flex align-items-center">
                        <a class="btn btn-warning mx-4 text-white" href="{{ route('roles.Eliminados') }}">
                            roles eliminados
                        </a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                            + Agregar Rol
                        </button>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Nombre del Padre</th>
                            <th>Permisos</th>
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
                                    @foreach ($usuario->permisos as $permiso)
                                        <span class="badge bg-info text-dark">{{ $permiso->nombre }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{--  boton editar roles --}}
                                    <a class="btn btn-warning btn-sm" href="{{ route('rol.edit', $usuario['id']) }}"><i
                                            class="bi bi-pencil"></i></a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#confirmDeleteModal-{{ $usuario->id }}" data-bs-toggle="modal">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    {{-- boton abrir agregar permiso --}}
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAsignarPermisos"
                                        data-rol-id="{{ $usuario->id }}" data-rol-nombre="{{ $usuario->nombre }}"
                                        data-rol-permisos='@json($usuario->permisos->pluck("id"))'>
                                        <i class="bi bi-shield-lock"></i>
                                    </button>
                                    <!-- Incluir el modal como componente -->
                                    <x-modal-confirm-delete :id="$usuario->id" :route="route('rol.estado', [$usuario->id, '*'])" :name="$usuario->nombre"
                                        :mensaje="'Eliminar'" :tipo="'el Rol:.... '" />
                                </td>
                            </tr>
                           @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Agregar permisos -->
       <div class="modal fade" id="modalAsignarPermisos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formAsignarPermisos" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Asignar permisos a <span id="nombreRolModal"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="checkboxesPermisos" style="max-height: 300px; overflow-y: auto;">
                    @foreach (\App\Models\Permisos::all() as $permiso)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permisos[]" value="{{ $permiso->id }}"
                                id="permiso_{{ $permiso->id }}">
                            <label class="form-check-label" for="permiso_{{ $permiso->id }}">
                                {{ $permiso->nombre }}
                            </label>
                        </div>
                    @endforeach
                </div>
    
                @error('permisos')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>




        <!-- Modal Agregar Labor -->
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
            data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Agregar Rol</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('rol.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Rol</label>
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
                            <div class="mb-3">
                                <label for="padre" class="form-label">Rol Padre</label>
                                <select class="form-select" id="padre" name="padre">
                                    <option selected value="">Selecciona un rol padre</option>
                                    @foreach ($rol as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

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
        <script>
            document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('modalAsignarPermisos');
            modal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const rolId = button.getAttribute('data-rol-id');
            const rolNombre = button.getAttribute('data-rol-nombre');
            const permisosRol = JSON.parse(button.getAttribute('data-rol-permisos'));

            // Actualiza nombre del rol
            document.getElementById('nombreRolModal').textContent = rolNombre;

            // Cambia la acción del formulario
            const form = document.getElementById('formAsignarPermisos');
            form.action = `/roles/${rolId}/permisos`;

            // Desmarca todos los checkboxes primero
            document.querySelectorAll('#checkboxesPermisos input[type=checkbox]').forEach(cb => {
                cb.checked = false;
            });

            // Marca los permisos que tiene el rol
            permisosRol.forEach(id => {
                const checkbox = document.getElementById('permiso_' + id);
                if (checkbox) checkbox.checked = true;
            });
                });
                    });
            </script>


</body>

</html>
