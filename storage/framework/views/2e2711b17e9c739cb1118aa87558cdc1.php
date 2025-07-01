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
        <h2 class="mb-4">Panel de Clientes</h2>

        <!-- Dashboard -->

        <!-- Lista de Clientes -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h2 class="h5 m-0 fw-bold">Lista de Clientes</h2>
            <div>
                
                <a href="<?php echo e(route('clientes.eliminados')); ?>" class="btn btn-danger">
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
                    <?php $__empty_1 = true; $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($cliente->id); ?></td>
                            <td><?php echo e($cliente->nombre); ?></td>
                            <td><?php echo e($cliente->apellido); ?></td>
                            <td><?php echo e($cliente->telefono); ?></td>
                            <td><?php echo e($cliente->email); ?></td>
                            <td><?php echo e($cliente->pais->nombre ?? 'Sin país'); ?></td>
                            <td><?php echo e($cliente->departamento->nombre ?? 'Sin departamento'); ?></td>
                            <td><?php echo e($cliente->municipio->nombre ?? 'Sin Municipio'); ?></td>
                            <td><?php echo e($cliente->codigo_postal ?? 'Sin departamento'); ?></td>
                            <td><?php echo e($cliente->estado); ?></td>
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
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/clientes/index.blade.php ENDPATH**/ ?>