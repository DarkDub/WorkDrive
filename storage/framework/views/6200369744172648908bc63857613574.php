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
    <div class="content-create-prove">
        <div class="text-title-form">
            <h1>Registrar Proveedor</h1>
            <p>Agrega un nuevo proveedor a la base de datos.</p>
        </div>

        <form action="<?php echo e(route('prove.store')); ?>" method="POST" class="form-create-prove">
            <?php echo csrf_field(); ?>
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo e(old('nombre')); ?>"
                        required>
                    <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nit">NIT:</label>
                    <input type="text" id="nit" name="nit" class="form-control" value="<?php echo e(old('nit')); ?>"
                        required>
                    <?php $__errorArgs = ['nit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                        value="<?php echo e(old('telefono')); ?>" required>
                    <?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control"
                        value="<?php echo e(old('direccion')); ?>" required>
                    <?php $__errorArgs = ['direccion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" class="form-control" value="<?php echo e(old('correo')); ?>"
                        required>
                    <?php $__errorArgs = ['correo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="pais_id">País:</label>
                    <select id="pais_id" name="pais_id" class="form-control" required>
                        <?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($pais->id); ?>" <?php echo e(old('pais_id') == $pais->id ? 'selected' : ''); ?>>
                                <?php echo e($pais->nombre); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="departamento_id">Departamento:</label>
                    <select id="departamento_id" name="departamento_id" class="form-control" required>
                        <?php $__currentLoopData = $departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($departamento->id); ?>"
                                <?php echo e(old('departamento_id') == $departamento->id ? 'selected' : ''); ?>>
                                <?php echo e($departamento->nombre); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="municipio_id">Municipio:</label>
                    <select id="municipio_id" name="municipio_id" class="form-control" required>
                        <?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $municipio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($municipio->id); ?>"
                                <?php echo e(old('municipio_id') == $municipio->id ? 'selected' : ''); ?>>
                                <?php echo e($municipio->nombre); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <a href="<?php echo e(route('prove.index')); ?>" class="btn btn-warning">Regresar</a>
                    <div>
                        <button type="submit" class="btn btn-success me-2">Guardar</button>
                        <button type="button" class="btn btn-danger me-2"
                            onclick="window.location.href='<?php echo e(route('prove.index')); ?>'">Cancelar</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <!-- Toast Container -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="customToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastMessage">Mensaje</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Cerrar"></button>
            </div>
        </div>
    </div>

    <?php $__env->startSection('js'); ?>
        <script>
            function showToast(message, type = 'success') {
                const toast = document.getElementById('customToast');
                const toastBody = document.getElementById('toastMessage');

                toast.classList.remove('bg-success', 'bg-danger', 'bg-warning');

                if (type === 'success') toast.classList.add('bg-success');
                if (type === 'error') toast.classList.add('bg-danger');
                if (type === 'warning') toast.classList.add('bg-warning');

                toastBody.textContent = message;

                const bsToast = new bootstrap.Toast(toast, {
                    delay: 5000
                });
                bsToast.show();
            }

            document.addEventListener('DOMContentLoaded', function() {
                <?php if(session('toast_success')): ?>
                    showToast(<?php echo json_encode(session('toast_success')); ?>, 'success');
                <?php endif; ?>

                <?php if(session('toast_error')): ?>
                    showToast(<?php echo json_encode(session('toast_error')); ?>, 'error');
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    showToast("Por favor completa los campos obligatorios", 'warning');
                <?php endif; ?>
            });
        </script>
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
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/proveedores/create.blade.php ENDPATH**/ ?>