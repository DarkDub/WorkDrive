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
    <div class="container py-4">
        <h2 class="mb-4">Panel de Trabajadores</h2>

        <!-- Dashboard -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="card text-white bg-primary text-center shadow rounded-3">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?php echo e($prove->count()); ?></h5>
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
                
                <a href="<?php echo e(route('proveedores.eliminados')); ?>" class="btn btn-danger shadow-sm">
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
                    <?php $__empty_1 = true; $__currentLoopData = $prove; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($provv->id); ?></td>
                            <td><?php echo e($provv->nombre); ?></td>
                            <td><?php echo e($provv->numero_documento); ?></td>
                            <td><?php echo e($provv->hoja_vida); ?></td>
                            <td><?php echo e($provv->tipo_documentos->nombre ?? 'Sin tipo de documento'); ?></td>
                            <td><?php echo e($provv->profesiones->nombre ?? 'Sin Profesion'); ?></td>
                            <td><?php echo e($provv->estado); ?></td> 
                            
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-danger btn-sm shadow-sm"
                                        data-bs-target="#confirmDeleteModal-<?php echo e($provv->id); ?>"
                                        data-bs-toggle="modal">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <a href="<?php echo e(route('prove.edit', $provv->id)); ?>"
                                        class="btn btn-sm btn-warning text-white shadow-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <?php if (isset($component)) { $__componentOriginalb9d375e327010d368ba2916bd420fa84 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9d375e327010d368ba2916bd420fa84 = $attributes; } ?>
<?php $component = App\View\Components\ModalConfirmDelete::resolve(['id' => $provv->id,'route' => route('proveedores.cambiarEstado', [$provv->id, '*'])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal-confirm-delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ModalConfirmDelete::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($provv->nombre),'mensaje' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Eliminar'),'tipo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('el proveedor:.... '),'buttonClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('btn-danger')]); ?>
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
                            <td colspan="10" class="text-center">No hay Trabajadores registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
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
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/proveedores/index.blade.php ENDPATH**/ ?>