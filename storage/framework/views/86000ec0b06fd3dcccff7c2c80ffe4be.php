<!doctype html>
<?php
$permisos = \App\Models\Permisos::all();
?>
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
                    <h2>Roles Agregadas</h2>
                    <div class="d-flex align-items-center">
                        <a class="btn btn-warning mx-4 text-white" href="<?php echo e(route('roles.Eliminados')); ?>">
                            roles eliminados
                        </a>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                            + Agregar Rol
                        </button>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Nombre del Padre</th>
                            <th>Permisos</th>
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
                                    <?php $__currentLoopData = $usuario->permisos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge bg-info text-dark"><?php echo e($permiso->nombre); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    
                                    <a class="btn btn-warning btn-sm" href="<?php echo e(route('rol.edit', $usuario['id'])); ?>"><i
                                            class="bi bi-pencil"></i></a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#confirmDeleteModal-<?php echo e($usuario->id); ?>" data-bs-toggle="modal">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAsignarPermisos"
                                        data-rol-id="<?php echo e($usuario->id); ?>" data-rol-nombre="<?php echo e($usuario->nombre); ?>"
                                        data-rol-permisos='<?php echo json_encode($usuario->permisos->pluck("id"), 15, 512) ?>'>
                                        <i class="bi bi-shield-lock"></i>
                                    </button>
                                    <!-- Incluir el modal como componente -->
                                    <?php if (isset($component)) { $__componentOriginalb9d375e327010d368ba2916bd420fa84 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9d375e327010d368ba2916bd420fa84 = $attributes; } ?>
<?php $component = App\View\Components\ModalConfirmDelete::resolve(['id' => $usuario->id,'route' => route('rol.estado', [$usuario->id, '*'])] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('modal-confirm-delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ModalConfirmDelete::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($usuario->nombre),'mensaje' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Eliminar'),'tipo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('el Rol:.... ')]); ?>
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

        <!-- Modal Agregar permisos -->
       <div class="modal fade" id="modalAsignarPermisos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formAsignarPermisos" method="POST" class="modal-content">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="modal-header">
                <h5 class="modal-title">Asignar permisos a <span id="nombreRolModal"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="checkboxesPermisos" style="max-height: 300px; overflow-y: auto;">
                    <?php $__currentLoopData = \App\Models\Permisos::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permiso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permisos[]" value="<?php echo e($permiso->id); ?>"
                                id="permiso_<?php echo e($permiso->id); ?>">
                            <label class="form-check-label" for="permiso_<?php echo e($permiso->id); ?>">
                                <?php echo e($permiso->nombre); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
    
                <?php $__errorArgs = ['permisos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger mt-2"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>




        <!-- Modal Agregar Labor -->
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
            data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Agregar Rol</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('rol.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Rol</label>
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
                            <div class="mb-3">
                                <label for="padre" class="form-label">Rol Padre</label>
                                <select class="form-select" id="padre" name="padre">
                                    <option selected value="">Selecciona un rol padre</option>
                                    <?php $__currentLoopData = $rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($usuario->id); ?>"><?php echo e($usuario->nombre); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

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
        <script>
            document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('modalAsignarPermisos');
            modal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const rolId = button.getAttribute('data-rol-id');
            const rolNombre = button.getAttribute('data-rol-nombre');
            const permisosRol = JSON.parse(button.getAttribute('data-rol-permisos'));

            // Actualiza nombre del rol
            document.getElementById('nombreRolModal').textContent = rolNombre;

            // Cambia la acción del formulario
            const form = document.getElementById('formAsignarPermisos');
            form.action = `/roles/${rolId}/permisos`;

            // Desmarca todos los checkboxes primero
            document.querySelectorAll('#checkboxesPermisos input[type=checkbox]').forEach(cb => {
                cb.checked = false;
            });

            // Marca los permisos que tiene el rol
            permisosRol.forEach(id => {
                const checkbox = document.getElementById('permiso_' + id);
                if (checkbox) checkbox.checked = true;
            });
                });
                    });
            </script>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/roles/roles.blade.php ENDPATH**/ ?>