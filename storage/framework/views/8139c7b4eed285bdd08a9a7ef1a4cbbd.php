<?php if (isset($component)) { $__componentOriginal60bece9d0b974b0fa04e3d2961ec078c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal60bece9d0b974b0fa04e3d2961ec078c = $attributes; } ?>
<?php $component = App\View\Components\Principal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('principal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Principal::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> 
  <?php $__env->startPush('styles'); ?>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('css/jobs.css')); ?>">
  <?php $__env->stopPush(); ?>

  <?php $__env->startSection('content'); ?>
  <div class="container py-4">
    <h2 class="mb-4">List Workers</h2>

    <!-- Filtros de estado -->
    <div class="d-flex gap-3 align-items-center mb-3">
      <a href="<?php echo e(route('jobs.index', ['estado' => 'All'])); ?>"
       class="btn btn-outline-dark <?php echo e($estado === 'All' ? 'active' : ''); ?>">
        All <span class="badge bg-dark"><?php echo e(\App\Models\Trabajador::count()); ?></span>
    </a>

    <a href="<?php echo e(route('jobs.index', ['estado' => 'Active'])); ?>"
       class="btn btn-outline-success <?php echo e($estado === 'Active' ? 'active' : ''); ?>">
        Active <span class="badge bg-success"><?php echo e(\App\Models\Trabajador::where('estado', 'Active')->count()); ?></span>
    </a>

    <a href="<?php echo e(route('jobs.index', ['estado' => 'Pending'])); ?>"
       class="btn btn-outline-warning <?php echo e($estado === 'Pending' ? 'active' : ''); ?>">
        Pending <span class="badge bg-warning"><?php echo e(\App\Models\Trabajador::where('estado', 'Pending')->count()); ?></span>
    </a>

    <a href="<?php echo e(route('jobs.index', ['estado' => 'Banned'])); ?>"
       class="btn btn-outline-danger <?php echo e($estado === 'Banned' ? 'active' : ''); ?>">
        Banned <span class="badge bg-danger"><?php echo e(\App\Models\Trabajador::where('estado', 'Banned')->count()); ?></span>
    </a>

    <a href="<?php echo e(route('jobs.index', ['estado' => 'Rejected'])); ?>"
       class="btn btn-outline-secondary <?php echo e($estado === 'Rejected' ? 'active' : ''); ?>">
        Rejected <span class="badge bg-secondary"><?php echo e(\App\Models\Trabajador::where('estado', 'Rejected')->count()); ?></span>
    </a>


        <a href="" class="btn btn-danger ms-auto">
            <i class="bi bi-person-x-fill"></i> Eliminados
        </a>
    </div>

    <!-- Tabla de usuarios -->
    <div class="table-responsive shadow-sm bg-white rounded-4 p-3">
        <table id="tabla-trabajadores" class="table table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col">
                        <input type="checkbox" class="custom-checkbox" id="select-all">
                    </th>
                    <th>Name</th>
                    <th>Identificacion</th>
                    <th>Phone number</th>
                    <th>Role</th>
                    <th>Registro ID</th>
                    <th>Profesion ID</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($job->registro): ?>
                        <tr data-id="<?php echo e($job->id); ?>">
                            <td><input type="checkbox" class="custom-checkbox row-checkbox"></td>
                            <td class="text-start d-flex align-items-center gap-2">
                                <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($job->nombre)); ?>&background=random"
                                    class="rounded-circle" width="32" height="32" />
                                <div class="text-start">
                                    <div class="fw-semibold"><?php echo e($job->nombre); ?></div>
                                    <small
                                        class="text-muted"><?php echo e($job->registro->email ?? 'no-email@example.com'); ?></small>
                                </div>
                            </td>
                            <td><?php echo e($job->numero_documento ?? '00000000'); ?></td>
                            <td><?php echo e($job->registro->telefono); ?></td>
                            <td><?php echo e($job->registro->rol->nombre ?? 'Sin Rol'); ?></td>
                            <td><?php echo e($job->registro_id ?? '000'); ?></td>
                            <td><?php echo e($job->profesion->nombre ?? '000'); ?></td>
                            <td>
                                <span
                                    class="badge-status 
                          <?php if($job->estado == 'Active'): ?> status-active
                          <?php elseif($job->estado == 'Pending'): ?> status-pending
                          <?php elseif($job->estado == 'Banned'): ?> status-banned
                          <?php elseif($job->estado == 'Rejected'): ?> status-rejected
                          <?php else: ?> status-unknown <?php endif; ?>">
                                    <?php echo e($job->estado ?? 'Unknown'); ?>

                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Botón de edición rápida -->
                                    <button class="btn btn-sm btn-warning text-white  shadow-sm"
                                        data-bs-toggle="modal" data-bs-target="#quickUpdateModal"
                                        data-id="<?php echo e($job->id); ?>" data-registro_id="<?php echo e($job->registro_id); ?>"
                                        data-estado="<?php echo e(ucfirst(strtolower($job->estado))); ?>"
                                        data-numero_documento="<?php echo e($job->numero_documento); ?>"
                                        data-nombre="<?php echo e($job->nombre); ?>" data-email="<?php echo e($job->email); ?>"
                                        data-telefono="<?php echo e($job->telefono); ?>" data-ciudad="<?php echo e($job->ciudad); ?>"
                                        data-pais="<?php echo e($job->pais); ?>" data-region="<?php echo e($job->region); ?>"
                                        data-zip="<?php echo e($job->codigo_postal); ?>" data-direccion="<?php echo e($job->direccion); ?>"
                                        data-empresa="<?php echo e($job->empresa); ?>" data-rol="<?php echo e($job->rol); ?>">

                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <!-- Modal de confirmación de eliminación -->
                                    <button class="btn btn-danger btn-sm"
                                        data-bs-target="#confirmDeleteModal-<?php echo e($job->id); ?>"
                                        data-bs-toggle="modal">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                      <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
  
    <!-- Modal de confirmación de eliminación -->
<!-- Quick Update Modal -->
<div class="modal fade" id="quickUpdateModal" tabindex="-1" aria-labelledby="quickUpdateLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="POST" action="<?php echo e(route('trabajador.actualizarEstado', ['id' => '__ID__'])); ?>" id="quickUpdateForm" class="mx-auto" style="max-width: 700px;">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>

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
              <input type="text" class="form-control" id="numero_documento" name="numero_documento">
            </div>

            <div class="col-md-6">
              <label class="form-label">Full name</label>
              <input type="text" class="form-control" id="nombre" name="nombre">
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

<!-- Notificaciones Sidebar -->
<div id="notificationDrawer" class="position-fixed top-0 end-0 bg-white shadow rounded-start p-4" 
     style="width: 400px; height: 100vh; z-index: 1050; display: none; transition: transform 0.3s ease-in-out;">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Notificaciones</h5>
    <button class="btn-close" id="closeDrawer"></button>
  </div>

<div class="d-flex gap-4 px-3 pt-2 pb-3">
  <!-- Todo -->
  <button type="button" class="btn btn-light d-flex align-items-center gap-2 rounded-3 fw-semibold">
    Todo
    <span class="badge bg-dark text-white rounded-pill px-2">22</span>
  </button>

  <!-- No leído -->
  <button type="button" class="btn btn-white text-muted d-flex align-items-center gap-2">
    No leído
    <span class="badge bg-info-subtle text-info rounded-pill px-2">12</span>
  </button>

  <!-- Archivado -->
  <button type="button" class="btn btn-white text-muted d-flex align-items-center gap-2">
    Archivado
    <span class="badge bg-success-subtle text-success rounded-pill px-2">10</span>
  </button>
</div>

    <!-- Notificación 1 -->
    <div class="d-flex mb-4 pb-3 border-bottom">
      <img src="https://i.pravatar.cc/40?img=1" class="rounded-circle me-3" width="40" height="40" />
      <div class="flex-grow-1">
        <p class="mb-1">
          <strong>Deja Brady</strong> te envió una solicitud de amistad
        </p>
        <small class="text-muted">16 minutos · Comunicación</small>
        <div class="mt-2">
          <button class="btn btn-dark btn-sm me-2">Aceptar</button>
          <button class="btn btn-outline-dark btn-sm">Rechazar</button>
        </div>
      </div>
      <span class="ms-2 mt-1 text-primary">●</span>
    </div>

    <!-- Notificación 2 -->
    <div class="d-flex mb-4 pb-3 border-bottom">
      <img src="https://i.pravatar.cc/40?img=2" class="rounded-circle me-3" width="40" height="40" />
      <div class="flex-grow-1">
        <p class="mb-1">
          <strong>Jayvon Hull</strong> te mencionó en <strong>Minimal UI</strong>
        </p>
        <small class="text-muted">un día · Interfaz de usuario del proyecto</small>
        <div class="bg-light rounded p-2 mt-2 small text-muted">
          <strong>@Jaydon Frankie</strong> comenta haciendo preguntas o simplemente deja una nota de agradecimiento.
        </div>
        <button class="btn btn-dark btn-sm mt-2">Responder</button>
      </div>
      <span class="ms-2 mt-1 text-primary">●</span>
    </div>

    <!-- Notificación 3 -->
    <div class="d-flex mb-4 pb-3 border-bottom">
      <img src="https://i.pravatar.cc/40?img=3" class="rounded-circle me-3" width="40" height="40" />
      <div class="flex-grow-1">
        <p class="mb-1">
          <strong>Lainey Davidson</strong> agregó un archivo al <strong>Administrador de archivos</strong>
        </p>
        <small class="text-muted">2 días · Gestor de archivos</small>

        <div class="bg-light rounded p-2 mt-2 d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center gap-2">
            <i class="bi bi-music-note-beamed fs-4 text-purple"></i>
            <div class="small">
              diseño-surinam-2015.mp3 <br />
              <span class="text-muted">2,3 Mb</span>
            </div>
          </div>
          <a href="#" class="btn btn-outline-dark btn-sm">Descargar</a>
        </div>
      </div>
      <span class="ms-2 mt-1 text-primary">●</span>
    </div>
    <div class="text-center mt-3">
      <a href="#" class="text-dark fw-semibold">Ver todo</a>
    </div>
  </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> 

<script>
    const modal = document.getElementById('quickUpdateModal');
    modal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const userId = button.getAttribute('data-id');
        /* console.log('Estado recibido:', button.getAttribute('data-estado')); */

        // Aquí cargas los datos del usuario si los tienes en atributos
        modal.querySelector('#editUserId').value = userId;
        modal.querySelector('#quickUpdateForm').action = `/trabajador/${userId}/actualizar-estado`;

        modal.querySelector('#estado').value = button.getAttribute('data-estado');
        modal.querySelector('#email').value = button.getAttribute('data-email');
        modal.querySelector('#numero_documento').value = button.getAttribute('data-numero_documento');
        modal.querySelector('#nombre').value = button.getAttribute('data-nombre');
        modal.querySelector('#telefono').value = button.getAttribute('data-telefono');
        modal.querySelector('#ciudad').value = button.getAttribute('data-ciudad');
        modal.querySelector('#pais').value = button.getAttribute('data-pais');
        modal.querySelector('#estado_region').value = button.getAttribute('data-region');
        modal.querySelector('#codigo_postal').value = button.getAttribute('data-zip');
        modal.querySelector('#direccion').value = button.getAttribute('data-direccion');
        modal.querySelector('#empresa').value = button.getAttribute('data-empresa');
        modal.querySelector('#rol').value = button.getAttribute('data-rol');
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

  $(document).ready(function () {
    $('#tabla-trabajadores').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
      },
      pageLength: 10,
      responsive: true
    });
  });

  


  document.addEventListener('DOMContentLoaded', function () {
    const drawer = document.getElementById('notificationDrawer');
    const openBtn = document.getElementById('openDrawer');
    const closeBtn = document.getElementById('closeDrawer');

    openBtn.addEventListener('click', () => {
      drawer.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
      drawer.style.display = 'none';
    });

    // Botones funcionales
    document.getElementById('markAllAsRead').addEventListener('click', () => {
      alert('Todas las notificaciones marcadas como leídas');
      // Aquí puedes hacer fetch a una ruta Laravel para actualizar estados
    });

    document.getElementById('clearAllNotifications').addEventListener('click', () => {
      if (confirm('¿Seguro que deseas eliminar todas las notificaciones?')) {
        document.getElementById('notificationContent').innerHTML = '';
      }
    });
  });

</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal60bece9d0b974b0fa04e3d2961ec078c)): ?>
<?php $attributes = $__attributesOriginal60bece9d0b974b0fa04e3d2961ec078c; ?>
<?php unset($__attributesOriginal60bece9d0b974b0fa04e3d2961ec078c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal60bece9d0b974b0fa04e3d2961ec078c)): ?>
<?php $component = $__componentOriginal60bece9d0b974b0fa04e3d2961ec078c; ?>
<?php unset($__componentOriginal60bece9d0b974b0fa04e3d2961ec078c); ?>
<?php endif; ?> <?php /**PATH C:\Users\Palma\Desktop\NewProject\WorkDrive-Sena (1)\WorkDrive-Sena\resources\views/jobs/index.blade.php ENDPATH**/ ?>