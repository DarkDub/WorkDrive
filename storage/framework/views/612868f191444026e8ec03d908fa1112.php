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
        <h2 class="mb-4">Clientes Eliminados</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0" style="font-size: 1.5rem; font-weight: 600;">Lista de clientes</h3>
            <a href="<?php echo e(route('clientes.index')); ?>" class="btn btn-primary">
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
                    <?php $__empty_1 = true; $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($client->id); ?></td>
                            <td><?php echo e($client->nombre); ?></td>
                            <td><?php echo e($client->nit); ?></td>
                            <td><?php echo e($client->telefono); ?></td>
                            <td><?php echo e($client->direccion); ?></td>
                            <td><?php echo e($client->correo); ?></td>
                            <td><?php echo e($client->pais->nombre ?? 'Sin país'); ?></td>
                            <td><?php echo e($client->departamento->nombre ?? 'Sin departamento'); ?></td>
                            <td><?php echo e($client->municipio->nombre ?? 'Sin municipio'); ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm"
                                    data-bs-target="#confirmRestaurarModal-<?php echo e($client->id); ?>" data-bs-toggle="modal">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </button>

                                <?php if (isset($component)) { $__componentOriginal028c2eb966084ccdda5c3bb51b0069bf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal028c2eb966084ccdda5c3bb51b0069bf = $attributes; } ?>
<?php $component = App\View\Components\ModalConfirmRestaurar::resolve(['id' => $client->id,'route' => route('clientes.cambiarEstado', [$client->id, 'A'])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal-confirm-restaurar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ModalConfirmRestaurar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($client->nombre),'mensaje' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('restaurar'),'tipo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('el cliente:.... ')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal028c2eb966084ccdda5c3bb51b0069bf)): ?>
<?php $attributes = $__attributesOriginal028c2eb966084ccdda5c3bb51b0069bf; ?>
<?php unset($__attributesOriginal028c2eb966084ccdda5c3bb51b0069bf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal028c2eb966084ccdda5c3bb51b0069bf)): ?>
<?php $component = $__componentOriginal028c2eb966084ccdda5c3bb51b0069bf; ?>
<?php unset($__componentOriginal028c2eb966084ccdda5c3bb51b0069bf); ?>
<?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="10" class="text-center">No hay clientes eliminados.</td>
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
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/clientes/eliminados.blade.php ENDPATH**/ ?>