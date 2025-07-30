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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/roles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/principal.css')); ?>">
    <title>Roles</title>
    <?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <h2 class="mb-4">List Rols</h2>

        <!-- Filtros de estado -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <a href="<?php echo e(route('rol.index', ['estado' => 'All'])); ?>"
                class="btn btn-outline-dark <?php echo e($estado === 'All' ? 'active' : ''); ?>">
                All <span class="badge bg-dark"><?php echo e(\App\Models\Trabajador::count()); ?></span>
            </a>

            <a href="<?php echo e(route('rol.index', ['estado' => 'Active'])); ?>"
                class="btn btn-outline-success <?php echo e($estado === 'Active' ? 'active' : ''); ?>">
                Active <span
                    class="badge bg-success"><?php echo e(\App\Models\Trabajador::where('estado', 'Active')->count()); ?></span>
            </a>

            <a href="<?php echo e(route('rol.index', ['estado' => 'Pending'])); ?>"
                class="btn btn-outline-warning <?php echo e($estado === 'Pending' ? 'active' : ''); ?>">
                Pending <span
                    class="badge bg-warning"><?php echo e(\App\Models\Trabajador::where('estado', 'Pending')->count()); ?></span>
            </a>

            <a href="<?php echo e(route('rol.index', ['estado' => 'Banned'])); ?>"
                class="btn btn-outline-danger <?php echo e($estado === 'Banned' ? 'active' : ''); ?>">
                Banned <span
                    class="badge bg-danger"><?php echo e(\App\Models\Trabajador::where('estado', 'Banned')->count()); ?></span>
            </a>

            <a href="<?php echo e(route('rol.index', ['estado' => 'Rejected'])); ?>"
                class="btn btn-outline-secondary <?php echo e($estado === 'Rejected' ? 'active' : ''); ?>">
                Rejected <span
                    class="badge bg-secondary"><?php echo e(\App\Models\Trabajador::where('estado', 'Rejected')->count()); ?></span>
            </a>

            <button class="btn btn-success me-2 ms-auto" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                + Agregar Labor
            </button>
            <a class="btn btn-danger" href="<?php echo e(route('roles.Eliminados')); ?>">
                roles eliminados
            </a>
        </div>
    
    <div class="table-responsive shadow-sm bg-white rounded-4 p-3"> 
            <table id="roles" class="table table-hover align-middle text-center mb-0">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Nombre Padre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($usuario->id); ?></td>
                        <td><?php echo e($usuario->nombre); ?></td>
                        <td><?php echo e($usuario->descripcion); ?></td>
                        <td><?php echo e($usuario->rolPadre ? $usuario->rolPadre->nombre : 'sin padre'); ?></td>
                        <td>
                                <span
                                    class="badge-status 
                          <?php if($usuario->estado == 'Active'): ?> status-active
                          <?php elseif($usuario->estado == 'Pending'): ?> status-pending
                          <?php elseif($usuario->estado == 'Banned'): ?> status-banned
                          <?php elseif($usuario->estado == 'Rejected'): ?> status-rejected
                          <?php else: ?> status-unknown <?php endif; ?>">
                                    <?php echo e($usuario->estado ?? 'Unknown'); ?>

                                </span>
                            </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="<?php echo e(route('rol.edit', $usuario['id'])); ?>"><i
                                    class="bi bi-pencil"></i></a>
                            <button class="btn btn-danger btn-sm"
                                data-bs-target="#confirmDeleteModal-<?php echo e($usuario->id); ?>" data-bs-toggle="modal">
                                <i class="bi bi-trash"></i>
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
    </div>
    <!-- Modal Agregar Labor -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Agregar Labor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('rol.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la Labor</label>
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
                            <select class="form-select" aria-label="Default select example mb-3" id="padre"
                                name="padre">
                                <option selected value="">Selecciona un rol padre</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($usuario->id); ?>"><?php echo e($usuario->nombre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        </select>
                        <div class="footer d-flex pt-2 w-100 mt-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-danger mx-3" data-bs-dismiss="modal">cancelar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    document.getElementById('toggleBtn').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('expanded');
    });
</script>
<script>


    $(document).ready(function () {
    $('#roles').DataTable({
      language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
      },
      pageLength: 10,
      responsive: true
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
<?php endif; ?>
<?php /**PATH C:\Users\Palma\Desktop\NewProject\WorkDrive-Sena (1)\WorkDrive-Sena\resources\views/roles/roles.blade.php ENDPATH**/ ?>