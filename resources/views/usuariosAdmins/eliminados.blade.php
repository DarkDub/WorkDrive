<x-principal>
    @section('content') 
    <div class="container py-4">
        <h2 class="mb-4">Usuarios Eliminados</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0" style="font-size: 1.5rem; font-weight: 600;">Lista de usuarios</h3>
            <a href="{{ route('usuariosAdmins.index') }}" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left"></i> Volver a Activos
            </a>
        </div>

        <div class="table-responsive shadow-sm rounded-4 p-4 bg-white">
            <x-datatable id="tabla-users">
                <thead class="table-light">
                    <tr>
                        <th scope="col">
                            <input type="checkbox" class="custom-checkbox" id="select-all">
                        </th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                            <tr data-id="{{ $user->id }}">
                                    <td><input type="checkbox" class="custom-checkbox row-checkbox"></td>
                                    <td class="text-start d-flex align-items-center gap-2">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" class="rounded-circle" width="32" height="32" />
                                <div class="text-start">
                                    <div class="fw-semibold">{{ $user->name }}</div>
                                    <small class="text-muted">{{ $user->email ?? 'no-email@example.com' }}</small>
                                </div>
                            </td>   
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles->nombre  ?? 'Sin Rol'}}</td>
                            <td>
                                <button class="btn btn-danger btn-sm"
                                    data-bs-target="#confirmRestaurarModal-{{ $user->id }}" data-bs-toggle="modal">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </button>

                                <x-modal-confirm-restaurar 
                                    :id="$user->id" 
                                    :route="route('usuariosAdmins.cambiarEstado', [$user->id, 'A'])" 
                                    :name="$user->name"
                                    :mensaje="'restaurar'" 
                                    :tipo="'el usuario:.... '" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No hay usuarios eliminados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-datatable> 
            </table>
        </div>
    </div>

@endsection 

</x-principal>