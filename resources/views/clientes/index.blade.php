<x-principal>
    <div class="container py-4">
        <h2 class="mb-4">Panel de Clientes</h2>

        <!-- Dashboard -->

        <!-- Lista de Clientes -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h2 class="h5 m-0 fw-bold">Lista de Clientes</h2>
            <div>
                {{-- <a href="{{ route('clientes.create')}}" class="btn btn-success me-2">
                    <i class="bi bi-plus-circle"></i> Registrar Cliente
                </a> --}}
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
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>País</th>
                        <th>Departamento</th>
                        <th>Municipio</th>
                        <th>Cod. Postal</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->apellido }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->pais->nombre ?? 'Sin país' }}</td>
                            <td>{{ $cliente->departamento->nombre ?? 'Sin departamento' }}</td>
                            <td>{{ $cliente->municipio->nombre ?? 'Sin Municipio' }}</td>
                            <td>{{ $cliente->codigo_postal ?? 'Sin departamento' }}</td>
                            <td>{{ $cliente->estado }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-danger btn-sm"
                                        data-bs-target="#confirmDeleteModal-{{ $cliente->id }}" data-bs-toggle="modal">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <a href="{{ route('clientes.edit', $cliente->id) }}"
                                        class="btn btn-sm btn-warning text-white shadow-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <x-modal-confirm-delete :id="$cliente->id" :route="route('clientes.cambiarEstado', [$cliente->id, '*'])" :name="$cliente->nombre"
                                        :mensaje="'Eliminar'" :tipo="'el cliente:.... '" :buttonClass="'btn-danger'" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay clientes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- <div class="container">
        <h1>Clientes</h1>
    
        <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Crear Cliente</a>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>NIT</th>
                    <th>Código Postal</th>
                    <th>País</th>
                    <th>Departamento</th>
                    <th>Municipio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->nit }}</td>
                    <td>{{ $cliente->codigo_postal }}</td>
                    <td>{{ $cliente->pais->nombre ?? 'N/A' }}</td>
                    <td>{{ $cliente->departamento->nombre ?? 'N/A' }}</td>
                    <td>{{ $cliente->municipio->nombre ?? 'N/A' }}</td>
                    <td>{{ $cliente->estado == 'A' ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>
    
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar este cliente?')">Eliminar</button>
                        </form>
    
                        @if ($cliente->estado == 'A')
                            <form action="{{ route('clientes.cambiarEstado', ['cliente' => $cliente->id, 'estado' => 'I']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-secondary">Desactivar</button>
                            </form>
                        @else
                            <form action="{{ route('clientes.cambiarEstado', ['cliente' => $cliente->id, 'estado' => 'A']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success">Activar</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
    
</x-principal>
