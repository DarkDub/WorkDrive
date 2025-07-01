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
    <title>Roles</title>
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
                    <h2>Labores Eliminadas</h2>
                    <a href="<?php echo e(route('rol.index')); ?>" class="btn btn-primary">
                        <i class="bi bi-arrow-left-short"></i>
                        Regresar
                    </a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Nombre Padre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($usuario->id); ?></td>
                                <td><?php echo e($usuario->nombre); ?></td>
                                <td><?php echo e($usuario->descripcion); ?></td>
                                <td><?php echo e($usuario->rolPadre ? $usuario->rolPadre->nombre : 'sin padre'); ?></td>
                                <td>
                                    
                                    <button class="btn btn-danger btn-sm"
                                        data-bs-target="#confirmRestaurarModal-<?php echo e($usuario->id); ?>"
                                        data-bs-toggle="modal">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>


                                    <!-- Incluir el modal como componente -->
                                    <?php if (isset($component)) { $__componentOriginal028c2eb966084ccdda5c3bb51b0069bf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal028c2eb966084ccdda5c3bb51b0069bf = $attributes; } ?>
<?php $component = App\View\Components\ModalConfirmRestaurar::resolve(['id' => $usuario->id,'route' => route('rol.estado', [$usuario->id, 'A'])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal-confirm-restaurar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ModalConfirmRestaurar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($usuario->nombre),'mensaje' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('restaurar'),'tipo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('el Rol:.... ')]); ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Agregar Labor -->

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
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/roles/rolesEliminados.blade.php ENDPATH**/ ?>