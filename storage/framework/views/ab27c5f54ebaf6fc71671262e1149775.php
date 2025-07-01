<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/roles.css')); ?>">
    <title>Permisos Eliminados</title>
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
        <div class="container-content">
            <div class="table-container">
                <div class="header d-flex justify-content-between align-items-center">
                    <h2>permisos Eliminados</h2>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Creacion</th>
                        <th>Actualizacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td><?php echo e($permiso->id); ?></td> 
                            <td><?php echo e($permiso->nombre); ?></td>
                            <td><?php echo e($permiso->descripcion); ?></td>
                            <td><?php echo e($permiso->estado); ?></td>
                            <td><?php echo e($permiso->created_at); ?></td>
                            <td><?php echo e($permiso->updated_at); ?></td>
                                
                                <td style="height:0.1rem;width:1rem;">

                                         <!-- btn Restaurar -->
                                        <button class="btn btn-success btn-sm"
                                        data-bs-target="#confirmDeleteModal-<?php echo e($permiso->id); ?>"
                                        data-bs-toggle="modal"><i class="bi bi-arrow-counterclockwise"></i></button>
                                    
                                    <!-- Incluir el modal como componente -->
                                    <?php if (isset($component)) { $__componentOriginalb9d375e327010d368ba2916bd420fa84 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9d375e327010d368ba2916bd420fa84 = $attributes; } ?>
<?php $component = App\View\Components\ModalConfirmDelete::resolve(['id' => $permiso->id,'route' => route('permisos.cambiarEstado', [$permiso->id,'A'])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal-confirm-delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ModalConfirmDelete::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($permiso->nombre),'mensaje' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Restaurar'),'tipo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('el Permiso:.... ')]); ?>
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
                                    </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

</body>

</html>
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/permisos/eliminados.blade.php ENDPATH**/ ?>