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
    <div class="container">
        <h2>Editar Proveedor</h2>

        <form action="<?php echo e(route('prove.update', $prove)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        value="<?php echo e(old('nombre', $prove->nombre)); ?>" required>
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
                    <label for="nit">N Documento:</label>
                    <input type="text" id="nit" name="nit" class="form-control"
                        value="<?php echo e(old('nit', $prove->numero_documento)); ?>" required>
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
                    <label for="profesion_id">Profesion:</label>
                    <select id="profesion_id" name="profesion_id" class="form-control" required>
                        <?php $__currentLoopData = $Profesiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profesion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($profesion->id); ?>"
                                <?php echo e(old('profesion_id', $prove->profesion_id) == $profesion->id ? 'selected' : ''); ?>>
                                <?php echo e($profesion->nombre); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tipo_documento">Tipo de Documento:</label>
                    <select id="tipo_documento" name="tipo_documento" class="form-control" required>
                        <?php $__currentLoopData = $Tipo_documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tipo_documento->id); ?>"
                                <?php echo e(old('departamento_id', $prove->tipo_documento) == $tipo_documento->id ? 'selected' : ''); ?>>
                                <?php echo e($tipo_documento->nombre); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </select>
                </div>


                <div class="modal-footer d-flex justify-content-between">
                    <a href="<?php echo e(route('prove.index')); ?>" class="btn btn-warning">Regresar</a>

                    <div>
                        <button type="submit" class="btn btn-success me-2">Guardar Cambios</button>
                        <button type="button" class="btn btn-danger me-2"
                            onclick="window.location.href='<?php echo e(route('prove.index')); ?>'">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
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
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/proveedores/editar.blade.php ENDPATH**/ ?>