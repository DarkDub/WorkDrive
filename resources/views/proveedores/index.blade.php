<x-principal>
    <div class="container py-4">
        <h2 class="mb-4">Panel de Trabajadores</h2>

        <!-- Dashboard -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="card text-white bg-primary text-center shadow rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-1">{{ $prove->count() }}</h5>
                        <p class="card-text small">Total Trabajadores</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-white bg-success text-center shadow rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-1">5</h5>
                        <p class="card-text small">Nuevos este mes</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-white bg-warning text-center shadow rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-1">3</h5>
                        <p class="card-text small">En revisión</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card text-white bg-danger text-center shadow rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-1">1</h5>
                        <p class="card-text small">Rechazados</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de Proveedores -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h2 class="h5 m-0 fw-bold">Lista de Trabajadores</h2>
            <div>
                {{-- <a href="{{ route('prove.create') }}" class="btn btn-success me-2 shadow-sm">
                    <i class="bi bi-plus-circle"></i> Registrar
                </a> --}}
                <a href="{{ route('proveedores.eliminados') }}" class="btn btn-danger shadow-sm">
                    <i class="bi bi-person-x-fill"></i> Eliminados
                </a>
            </div>
        </div>

        <div class="table-responsive shadow p-3 bg-white rounded-3">
            <table class="table table-striped align-middle text-center" id="prvv">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>N Documento</th>
                        <th>Teléfono</th>
                        <th>Tipo Documento</th>
                        <th>Profesion</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prove as $provv)
                        <tr>
                            <td>{{ $provv->id }}</td>
                            <td>{{ $provv->nombre }}</td>
                            <td>{{ $provv->numero_documento }}</td>
                            <td>{{ $provv->hoja_vida }}</td>
                            <td>{{ $provv->tipo_documentos->nombre ?? 'Sin tipo de documento' }}</td>
                            <td>{{ $provv->profesiones->nombre ?? 'Sin Profesion' }}</td>
                            <td>{{ $provv->estado }}</td> 
                            {{-- <td>{{ $provv->resgistros->estado ?? 'Sin Estado' }}</td> --}}
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-danger btn-sm shadow-sm"
                                        data-bs-target="#confirmDeleteModal-{{ $provv->id }}"
                                        data-bs-toggle="modal">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <a href="{{ route('prove.edit', $provv->id) }}"
                                        class="btn btn-sm btn-warning text-white shadow-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <x-modal-confirm-delete :id="$provv->id" :route="route('proveedores.cambiarEstado', [$provv->id, '*'])" :name="$provv->nombre"
                                        :mensaje="'Eliminar'" :tipo="'el proveedor:.... '" :buttonClass="'btn-danger'" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No hay Trabajadores registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-principal>
