<x-principal>
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/roles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
@endpush 

    @section('content')
    <div class="container py-4">
        <h2 class="mb-4">Panel de Eliminados</h2>

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <h2 class="h5 m-0 fw-bold">Roles Agregadas</h2>
                    <a href="{{ route('rol.index') }}" class="btn btn-primary">
                        <i class="bi bi-arrow-left-short"></i>
                        Regresar
                    </a>
                </div>
                <div class="table-responsive shadow-sm bg-white rounded-4 p-3">
                <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Nombre Padre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->nombre }}</td>
                                <td>{{ $role->descripcion }}</td>
                                <td>{{ $role->rolPadre ? $role->rolPadre->nombre : 'sin padre' }}</td>
                                <td>
                                    {{-- <a class="btn btn-warning btn-sm" href="rolEditar/{{ $role['id'] }}"><i
                                            class="bi bi-pencil"></i></a> --}}
                                    <button class="btn btn-danger btn-sm"
                                        data-bs-target="#confirmRestaurarModal-{{ $role->id }}"
                                        data-bs-toggle="modal">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>


                                    <!-- Incluir el modal como componente -->
                                    <x-modal-confirm-restaurar :id="$role->id" :route="route('rol.estado', [$role->id, 'A'])" :name="$role->nombre"
                                        :mensaje="'restaurar'" :tipo="'el Rol:.... '" />

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>

        <!-- Modal Agregar Labor -->
@endsection
    </x-principal> 
