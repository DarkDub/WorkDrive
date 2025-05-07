<x-principal>
    <div class="container py-4">
        <h2 class="mb-4">Clientes Eliminados</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0" style="font-size: 1.5rem; font-weight: 600;">Lista de clientes</h3>
            <a href="{{ route('clientes.index') }}" class="btn btn-primary">
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
                    @forelse ($clientes as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->nombre }}</td>
                            <td>{{ $client->nit }}</td>
                            <td>{{ $client->telefono }}</td>
                            <td>{{ $client->direccion }}</td>
                            <td>{{ $client->correo }}</td>
                            <td>{{ $client->pais->nombre ?? 'Sin país' }}</td>
                            <td>{{ $client->departamento->nombre ?? 'Sin departamento' }}</td>
                            <td>{{ $client->municipio->nombre ?? 'Sin municipio' }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm"
                                    data-bs-target="#confirmRestaurarModal-{{ $client->id }}" data-bs-toggle="modal">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </button>

                                <x-modal-confirm-restaurar :id="$client->id" :route="route('clientes.cambiarEstado', [$client->id, 'A'])" :name="$client->nombre"
                                    :mensaje="'restaurar'" :tipo="'el cliente:.... '" />
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No hay clientes eliminados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-principal>
