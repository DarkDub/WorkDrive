<x-principal>
    <div class="container py-4">
        <h2 class="mb-4">Proveedores Eliminados</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0" style="font-size: 1.5rem; font-weight: 600;">Lista de Proveedores</h3>
            <a href="{{ route('prove.index') }}" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left"></i> Volver a Activos
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle text-center" id="Roles">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>NIT</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>País</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prove as $provve)
                        <tr>
                            <td>{{ $provve->id }}</td>
                            <td>{{ $provve->nombre }}</td>
                            <td>{{ $provve->nit }}</td>
                            <td>{{ $provve->telefono }}</td>
                            <td>{{ $provve->direccion }}</td>
                            <td>{{ $provve->correo }}</td>
                            <td>{{ $provve->pais->nombre ?? 'Sin país' }}</td>
                            <td>{{ $provve->departamento->nombre ?? 'Sin departamento' }}</td>
                            <td>{{ $provve->municipio->nombre ?? 'Sin municipio' }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm"
                                    data-bs-target="#confirmRestaurarModal-{{ $provve->id }}" data-bs-toggle="modal">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </button>

                                <x-modal-confirm-delete :id="$provve->id" :route="route('proveedores.cambiarEstado', [$provve->id, 'A'])" :name="$provve->nombre"
                                    :mensaje="'Restaurar'" :tipo="'el proveedor...'" :buttonClass="'btn-success'" />
                                <x-modal-confirm-restaurar :id="$provve->id" :route="route('proveedores.cambiarEstado', [$provve->id, 'A'])" :name="$provve->nombre"
                                    :mensaje="'restaurar'" :tipo="'el Rol:.... '" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No hay proveedores eliminados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-principal>
