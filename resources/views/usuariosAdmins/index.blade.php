<x-principal>
    <div class="container py-4">
        <h2 class="mb-4">Panel de administradores</h2>

        <!-- Dashboard -->

        <!-- Lista de Clientes -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h2 class="h5 m-0 fw-bold">Lista de Admins</h2>
            <div>
                <a href="{{ route('clientes.create')}}" class="btn btn-success me-2">
                    <i class="bi bi-plus-circle"></i> Registrar admin
                </a>
                <a href="{{ route('clientes.eliminados') }}" class="btn btn-danger">
                    <i class="bi bi-person-x-fill"></i> Eliminados
                </a>
            </div>
        </div>

        <div class="table-responsive shadow-sm rounded-3 p-3 bg-white">
            <table class="table table-striped align-middle text-center mb-0" id="clientes">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>    
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol->nombre }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-danger btn-sm"
                                        data-bs-target="#confirmDeleteModal-{{ $user->id }}" data-bs-toggle="modal">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <a href="{{ route('admin_user.edit', $user->id) }}"
                                        class="btn btn-sm btn-warning text-white shadow-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <x-modal-confirm-delete :id="$user->id" :route="route('clientes.cambiarEstado', [$user->id, '*'])" :name="$user->nombre"
                                        :mensaje="'Eliminar'" :tipo="'el admin:.... '" :buttonClass="'btn-danger'" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay Administradores registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    
</x-principal>
