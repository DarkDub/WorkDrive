<x-principal>
    @section('content')
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

        <div class="table-responsive shadow-sm rounded-4 p-4 bg-white">
            <x-datatable id="tabla-usuarios">
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
                    @forelse($users as $user)
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

</div> <!-- fin de la tabla --> 
</div> <!-- fin del contendedor principal --> 

@endsection 
  

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> 
<script>
    
      $(document).ready(function () {
    $('#usuarios').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
      },
      pageLength: 10,
      responsive: true
    });
  });

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
