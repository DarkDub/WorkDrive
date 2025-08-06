<x-principal> 
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('css/cliente-admin.css') }}">
@endpush 
@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Panel de Clientes</h2>

        <!-- Dashboard -->
        <!-- Lista de Clientes -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h2 class="h5 m-0 fw-bold">Lista de Clientes</h2>
            <div>
                <a href="{{ route('clientes.create')}}" class="btn btn-success me-2 ms-auto">
                    <i class="bi bi-plus-circle"></i> Registrar Cliente
                </a>
                <a href="{{ route('clientes.eliminados') }}" class="btn btn-danger">
                    <i class="bi bi-person-x-fill"></i> Eliminados
                </a>
            </div>
        </div>

        <div class="table-responsive shadow-sm bg-white rounded-4 p-3">
            <x-datatable id="tabla-clientes">
                <thead class="table-light">
                    <tr>
                        <th scope="col">
                            <input type="checkbox" class="custom-checkbox" id="select-all">
                        </th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>NIT</th>
                        <th>País</th>
                        <th>Departamento</th>
                        <th>Cod. Postal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse($clientes as $cliente)
                    <tr data-id="{{ $cliente->id }}">
                                    <td><input type="checkbox" class="custom-checkbox row-checkbox"></td>
                                    <td class="text-start d-flex align-items-center gap-2">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($cliente->nombre) }}&background=random" class="rounded-circle" width="32" height="32" />
                                <div class="text-start">
                                    <div class="fw-semibold">{{ $cliente->nombre }}</div>
                                    <small class="text-muted">{{ $cliente->email ?? 'no-email@example.com' }}</small>
                                </div>
                            </td> 
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->nit }}</td>
                            <td>{{ $cliente->pais->nombre ?? 'Sin país' }}</td>
                            <td>{{ $cliente->departamento->nombre ?? 'Sin departamento' }}</td>
                            <td>{{ $cliente->codigo_postal ?? 'Sin departamento' }}</td>
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
            </x-datatable>
            </table>
            </div> 

            <!-- Contador de seleccionados -->
<div class="d-flex justify-content-between align-items-center mt-3 px-3">
    <div id="selection-counter" class="text-success fw-semibold" style="display: none;">
        <i class="bi bi-check-circle-fill"></i>
        <span id="selected-count">0</span> seleccionados
    </div>
</div>
            
    </div> <!-- End table-responsive -->
@endsection 
        <!-- Selección masiva highlight JS -->
@push('scripts')
<script>
/*     $(document).ready(function () {
   if ($.fn.dataTable.isDataTable('#tabla-clientes')) {
             $('#tabla-clientes').DataTable().clear().destroy();
            }
}); */
/* <script>
    
      $(document).ready(function () {
    $('#tabla-clientes').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
      },
      pageLength: 10,
      responsive: true */
    

/* document.addEventListener('DOMContentLoaded', function () {
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.row-checkbox');
    const selectionCounter = document.getElementById('selection-counter');
    const selectedCount = document.getElementById('selected-count');

    function updateCounter() {
        const count = document.querySelectorAll('.row-checkbox:checked').length;
        selectedCount.textContent = count;
        selectionCounter.style.display = count > 0 ? 'block' : 'none';
    }

    function toggleRowHighlight(checkbox) {
        checkbox.closest('tr').classList.toggle('table-success', checkbox.checked);
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', () => {
            toggleRowHighlight(cb);
            updateCounter();
            selectAll.checked = [...checkboxes].every(chk => chk.checked);
        });
    });

    selectAll.addEventListener('change', function () {
        checkboxes.forEach(cb => {
            cb.checked = selectAll.checked;
            toggleRowHighlight(cb);
        });
        updateCounter();
    });
});



const selectAllCheckbox = document.getElementById("select-all");
  const rowCheckboxes = document.querySelectorAll(".row-checkbox");

  selectAllCheckbox.addEventListener("change", () => {
    rowCheckboxes.forEach(checkbox => {
      checkbox.checked = selectAllCheckbox.checked;
    });
  }); */

  document.addEventListener('DOMContentLoaded', function () {
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.row-checkbox');
    const selectionCounter = document.getElementById('selection-counter');
    const selectedCount = document.getElementById('selected-count');

    function updateCounter() {
        const count = document.querySelectorAll('.row-checkbox:checked').length;
        selectedCount.textContent = count;
        selectionCounter.style.display = count > 0 ? 'block' : 'none';
    }

    function toggleRowHighlight(checkbox) {
        checkbox.closest('tr').classList.toggle('table-success', checkbox.checked);
    }

    // Evento para los checkboxes individuales
    checkboxes.forEach(cb => {
        cb.addEventListener('change', () => {
            toggleRowHighlight(cb);
            updateCounter();
            selectAll.checked = [...checkboxes].every(chk => chk.checked);
        });
    });

    // Evento para el checkbox de seleccionar todo
    selectAll.addEventListener('change', function () {
        checkboxes.forEach(cb => {
            cb.checked = this.checked;
            toggleRowHighlight(cb);
        });
        updateCounter();
    });
});
</script>
@endpush
</x-principal> 
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
    







