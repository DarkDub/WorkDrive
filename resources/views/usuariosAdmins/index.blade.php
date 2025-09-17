<x-principal>
    @section('content')
        <div class="container py-4">
            <h2 class="mb-4">Panel de administradores</h2>
            <!-- Dashboard -->
            <!-- Lista de Clientes -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <h2 class="h5 m-0 fw-bold">Lista de Admins</h2>
                <div>
                    <a href="{{ route('usuariosAdmins.create') }}" class="btn btn-success me-2">
                        <i class="bi bi-plus-circle"></i> Registrar admin
                    </a>
                    <a href="{{ route('usuariosAdmins.eliminados') }}" class="btn btn-danger">
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
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($users as $user)
                            <tr data-id="{{ $user->id }}">
                                <td><input type="checkbox" class="custom-checkbox row-checkbox"></td>
                                <td class="text-start d-flex align-items-center gap-2">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random"
                                        class="rounded-circle" width="32" height="32" />
                                    <div class="text-start">
                                        <div class="fw-semibold">{{ $user->name }}</div>
                                        <small class="text-muted">{{ $user->email ?? 'no-email@example.com' }}</small>
                                    </div>
                                </td>
                                <td>{{ $user->name }}</td>  
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles->nombre ?? 'Sin Rol' }}</td>
                                <td>
                                <span
                                    class="badge-status 
                          @if ($user->estado == 'Active') status-active
                          @elseif($user->estado == 'Pending') status-pending
                          @elseif($user->estado == 'Banned') status-banned
                          @elseif($user->estado == 'Rejected') status-rejected
                          @else status-unknown @endif">
                                    {{ $user->estado ?? 'Unknown' }}
                                </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-warning btn-sm text-white" 
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEditarAdmin"
                                            data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}" 
                                            data-email="{{ $user->email }}"
                                            data-estado="{{ $user->estado }}"
                                            data-rol="{{ $user->roles->id ?? '' }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>

                                        <button class="btn btn-danger btn-sm"
                                            data-bs-target="#confirmDeleteModal-{{ $user->id }}"
                                            data-bs-toggle="modal">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Botón para abrir modal -->


                                        {{-- <a href="{{ route('admin_user.edit', $user->id) }}"
                                        class="btn btn-sm btn-warning text-white shadow-sm">
                                        <i class="bi bi-pencil-square"></i>
                                        </a>  --}}

                                        <x-modal-confirm-delete :id="$user->id" :route="route('usuariosAdmins.cambiarEstado', [$user->id, '*'])" :name="$user->name"
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

        </div>
        
    <!-- modal para editar admin -->
        <div class="modal fade" id="modalEditarAdmin" tabindex="-1" aria-labelledby="modalEditarAdminLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form method="POST" action="{{ route('usuariosAdmins.actualizarEstado', ['id' => '__ID__']  )  }}"
                    id="editAdminForm" class="mx-auto" style="max-width: 700px;">
                    @csrf
                    @method('PUT')
                    <div class="modal-content rounded-4">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold">Quick update</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="alert alert-info py-2 small mb-3">
                                <i class="bi bi-info-circle me-1"></i> Account is waiting for confirmation
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="estado" class="form-label">Status</label>
                                    <select class="form-select" id="estado" name="estado">
                                        <option value="Active">Active</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Banned">Banned</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Numero Identificacion</label>
                                    <input type="text" class="form-control" id="numero_documento"
                                        name="numero_documento">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Full name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Phone number</label>
                                    <div class="input-group">
                                        <span class="input-group-text">🇸🇪</span>
                                        <input type="text" class="form-control" id="telefono" name="telefono">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Country</label>
                                    <select class="form-select" id="pais" name="pais">
                                        <option value="Sweden">Sweden</option>
                                        <option value="USA">USA</option>
                                        <!-- agrega más países si deseas -->
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" id="ciudad" name="ciudad">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">State/Region</label>
                                    <input type="text" class="form-control" id="estado_region" name="estado_region">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Zip/Code</label>
                                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control" id="empresa" name="empresa">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Role</label>
                                    <input type="text" class="form-control" id="rol" name="rol">
                                </div>

                                <input type="hidden" name="user_id" id="editUserId">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-dark">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection


    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#usuarios').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                    },
                    pageLength: 10,
                    responsive: true
                });
            });

        const modal = document.getElementById('modalEditarAdmin');
        modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const userId = button.getAttribute('data-id');
        /* console.log('Estado recibido:', button.getAttribute('data-estado')); */

        // Aquí cargas los datos del usuario si los tienes en atributos
        modal.querySelector('#editUserId').value = userId;
        document.querySelector('#modalEditarAdmin').action = `/usuariosAdmin/${userId}/actualizar-estado`;

        modal.querySelector('#estado').value = button.getAttribute('data-estado');
        modal.querySelector('#email').value = button.getAttribute('data-email');
        modal.querySelector('#numero_documento').value = button.getAttribute('data-numero_documento');
        modal.querySelector('#name').value = button.getAttribute('data-name');
        modal.querySelector('#telefono').value = button.getAttribute('data-telefono');
        modal.querySelector('#ciudad').value = button.getAttribute('data-ciudad');
        modal.querySelector('#pais').value = button.getAttribute('data-pais');
        modal.querySelector('#estado_region').value = button.getAttribute('data-region');
        modal.querySelector('#codigo_postal').value = button.getAttribute('data-zip');
        modal.querySelector('#direccion').value = button.getAttribute('data-direccion');
        modal.querySelector('#empresa').value = button.getAttribute('data-empresa');
        modal.querySelector('#rol').value = button.getAttribute('data-rol');
        });

            document.addEventListener('DOMContentLoaded', function() {
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
            selectAll.addEventListener('change', function() {
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
