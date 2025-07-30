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
    <link rel="stylesheet" href="<?php echo e(asset('css/cliente-admin.css')); ?>">
<?php $__env->stopPush(); ?> 
<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <h2 class="mb-4">Panel de Clientes</h2>

        <!-- Dashboard -->

        <!-- Lista de Clientes -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h2 class="h5 m-0 fw-bold">Lista de Clientes</h2>
            <div>
                <a href="<?php echo e(route('clientes.create')); ?>" class="btn btn-success me-2 ms-auto">
                    <i class="bi bi-plus-circle"></i> Registrar Cliente
                </a>
                <a href="<?php echo e(route('clientes.eliminados')); ?>" class="btn btn-danger">
                    <i class="bi bi-person-x-fill"></i> Eliminados
                </a>
            </div>
        </div>

        <div class="table-responsive shadow-sm bg-white rounded-4 p-3">
            <div class="table-responsive">
            <table id="tabla-clientes" class="table table-hover align-middle mb-0 text-center">
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
                    <?php $__empty_1 = true; $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr data-id="<?php echo e($cliente->id); ?>">
                                    <td><input type="checkbox" class="custom-checkbox row-checkbox"></td>
                                    <td class="text-start d-flex align-items-center gap-2">
                                <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($cliente->nombre)); ?>&background=random" class="rounded-circle" width="32" height="32" />
                                <div class="text-start">
                                    <div class="fw-semibold"><?php echo e($cliente->nombre); ?></div>
                                    <small class="text-muted"><?php echo e($cliente->email ?? 'no-email@example.com'); ?></small>
                                </div>
                            </td> 
                            <td><?php echo e($cliente->telefono); ?></td>
                            <td><?php echo e($cliente->direccion); ?></td>
                            <td><?php echo e($cliente->nit); ?></td>
                            <td><?php echo e($cliente->pais->nombre ?? 'Sin país'); ?></td>
                            <td><?php echo e($cliente->departamento->nombre ?? 'Sin departamento'); ?></td>
                            <td><?php echo e($cliente->codigo_postal ?? 'Sin departamento'); ?></td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-danger btn-sm"
                                        data-bs-target="#confirmDeleteModal-<?php echo e($cliente->id); ?>" data-bs-toggle="modal">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <a href="<?php echo e(route('clientes.edit', $cliente->id)); ?>"
                                        class="btn btn-sm btn-warning text-white shadow-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <?php if (isset($component)) { $__componentOriginalb9d375e327010d368ba2916bd420fa84 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9d375e327010d368ba2916bd420fa84 = $attributes; } ?>
<?php $component = App\View\Components\ModalConfirmDelete::resolve(['id' => $cliente->id,'route' => route('clientes.cambiarEstado', [$cliente->id, '*'])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal-confirm-delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ModalConfirmDelete::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cliente->nombre),'mensaje' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Eliminar'),'tipo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('el cliente:.... '),'buttonClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('btn-danger')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9d375e327010d368ba2916bd420fa84)): ?>
<?php $attributes = $__attributesOriginalb9d375e327010d368ba2916bd420fa84; ?>
<?php unset($__attributesOriginalb9d375e327010d368ba2916bd420fa84); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9d375e327010d368ba2916bd420fa84)): ?>
<?php $component = $__componentOriginalb9d375e327010d368ba2916bd420fa84; ?>
<?php unset($__componentOriginalb9d375e327010d368ba2916bd420fa84); ?>
<?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center">No hay clientes registrados.</td>
                        </tr>
                    <?php endif; ?>
                    
                </tbody>
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
        </div> <!-- End Lista de Clientes -->
<?php $__env->stopSection(); ?> 
        <!-- Selección masiva highlight JS -->
<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> 
<script>
    
      $(document).ready(function () {
    $('#tabla-clientes').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
      },
      pageLength: 10,
      responsive: true
    });
  });

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
<?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal60bece9d0b974b0fa04e3d2961ec078c)): ?>
<?php $attributes = $__attributesOriginal60bece9d0b974b0fa04e3d2961ec078c; ?>
<?php unset($__attributesOriginal60bece9d0b974b0fa04e3d2961ec078c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal60bece9d0b974b0fa04e3d2961ec078c)): ?>
<?php $component = $__componentOriginal60bece9d0b974b0fa04e3d2961ec078c; ?>
<?php unset($__componentOriginal60bece9d0b974b0fa04e3d2961ec078c); ?>
<?php endif; ?> 
    
    







<?php /**PATH C:\Users\Palma\Desktop\NewProject\WorkDrive-Sena (1)\WorkDrive-Sena\resources\views/clientes/index.blade.php ENDPATH**/ ?>