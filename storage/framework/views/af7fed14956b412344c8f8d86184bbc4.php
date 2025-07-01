<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/roles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/principal.css')); ?>">
    <title>Permisos</title>
</head>

<body>

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
            <h2 class="mb-4">Panel de Permisos</h2>

            <!-- Dashboard -->

            <!-- Lista de Clientes -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <h2 class="h5 m-0 fw-bold">Lista de Permisos</h2>
                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                        + Agregar Permisos
                    </button>
                    <a href="<?php echo e(route('permisos.eliminados')); ?>" class="btn btn-danger">
                        <i class="bi bi-person-x-fill"></i> Eliminados
                    </a>
                </div>
            </div>

            <div class="table-responsive shadow-sm rounded-3 p-3 bg-white">
                <table class="table table-striped align-middle text-center mb-0" id="permisos">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Creacion</th>
                            <th>Actualizacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($permiso->id); ?></td>
                                <td><?php echo e($permiso->nombre); ?></td>
                                <td><?php echo e($permiso->descripcion); ?></td>
                                <td><?php echo e($permiso->estado); ?></td>
                                <td><?php echo e($permiso->created_at); ?></td>
                                <td><?php echo e($permiso->updated_at); ?></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-danger btn-sm"
                                            data-bs-target="#confirmDeleteModal-<?php echo e($permiso->id); ?>"
                                            data-bs-toggle="modal">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        
                                        <a href="<?php echo e(route('permisos.edit', $permiso->id)); ?>"
                                            class="btn btn-sm btn-warning text-white shadow-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        
                                        <?php if (isset($component)) { $__componentOriginalb9d375e327010d368ba2916bd420fa84 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9d375e327010d368ba2916bd420fa84 = $attributes; } ?>
<?php $component = App\View\Components\ModalConfirmDelete::resolve(['id' => $permiso->id,'route' => route('permisos.cambiarEstado', [$permiso->id, '*'])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal-confirm-delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ModalConfirmDelete::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($permiso->nombre),'mensaje' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Eliminar'),'tipo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('el permiso...')]); ?>
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
                                <td colspan="8" class="text-center">No hay permisos registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
            data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Agregar Permiso</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('permisos.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Permiso</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"

                                    value="<?php echo e(old('nombre')); ?>">

                                    
                                <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger">*<?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion"><?php echo e(old('descripcion')); ?></textarea>
                                <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger">*<?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            </select>
                            <div class="footer d-flex pt-2 w-100 mt-3">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-danger mx-3"
                                    data-bs-dismiss="modal">cancelar</button>
                            </div>

                        </form>
                    </div>
                </div>
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
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/permisos/index.blade.php ENDPATH**/ ?>