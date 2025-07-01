<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro Trabajador</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Fuente Public Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600&display=swap" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="<?php echo e(asset('css/trabajador-style/registro2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/trabajador-style/registro.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('css/tarjeta.css')); ?>">
    <!-- Scripts personalizados -->
    <script defer src="<?php echo e(asset('js/trabajadores-js/registro.js')); ?>"></script>
    <script defer src="<?php echo e(asset('js/eyes-pass.js')); ?>"></script>

    <style>
        select:invalid {
            color: #707070;
        }

        select option {
            color: #707070;
        }
    </style>
</head>

<body>

    <?php if (isset($component)) { $__componentOriginalfd1f218809a441e923395fcbf03e4272 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfd1f218809a441e923395fcbf03e4272 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $attributes = $__attributesOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__attributesOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfd1f218809a441e923395fcbf03e4272)): ?>
<?php $component = $__componentOriginalfd1f218809a441e923395fcbf03e4272; ?>
<?php unset($__componentOriginalfd1f218809a441e923395fcbf03e4272); ?>
<?php endif; ?>

    <div class="content">
        <div class="card p-4 mx-auto" style="max-width: 400px;">
            <iconify-icon icon="carbon:user-avatar" class="logo d-block mx-auto"
                style="font-size: 50px;"></iconify-icon>
            <h5 class="text-center fw-bold mb-3">Crear cuenta - Trabajador</h5>
            <p class="text-center small mb-4">esta a un paso de ser trabajador!! </p>

            <!-- Mostrar errores -->
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('trabajador.registrar')); ?>" method="POST" enctype="multipart/form-data" novalidate>
                <?php echo csrf_field(); ?>
              
                <div class="mb-3">
                    <input name="nombre" type="text" class="form-control" placeholder="Nombre completo"
                        value="<?php echo e(old('nombre')); ?>" required />
                </div>

                <div class="mb-3">
                    <select name="tipo_documento" class="form-control" required>
                        <option value="" disabled <?php echo e(old('tipo_documento') ? '' : 'selected'); ?>>Seleccione tipo de
                            documento</option>
                        <?php $__currentLoopData = $tipo_documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoD): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tipoD->id); ?>"
                                <?php echo e(old('tipo_documento') == $tipoD->id ? 'selected' : ''); ?>><?php echo e($tipoD->nombre); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="mb-3">
                    <input name="numero_documento" type="text" class="form-control" placeholder="Número de documento"
                        value="<?php echo e(old('numero_documento')); ?>" required />
                </div>

                <div class="mb-3">
                    <select name="profesion_id" class="form-control form-select" id="labor" required>
                        <option value="" disabled <?php echo e(old('profesion_id') ? '' : 'selected'); ?>>Seleccione una
                            labor</option>
                        <?php $__currentLoopData = $profesiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profesion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($profesion->id); ?>"
                                <?php echo e(old('profesion_id') == $profesion->id ? 'selected' : ''); ?>><?php echo e($profesion->nombre); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </select>
                </div>

                <div class="mb-3">
                    <input name="otra_labor" type="text"
                        class="form-control <?php echo e(old('profesion_id') == 'otro' ? '' : 'd-none'); ?>" id="otraLabor"
                        placeholder="Especifique su labor" value="<?php echo e(old('otra_labor')); ?>" />
                </div>

                <div class="custom-file-upload mb-3">
                    <label for="cvFile" class="file-label d-flex align-items-center">
                        <span id="file-name" class="flex-grow-1">Seleccionar hoja de vida</span>
                        <i class="bi bi-upload ms-2"></i>
                    </label>
                    <input name="hoja_vida" type="file" id="cvFile" class="file-input form-control" required>
                </div>
                <div class="custom-file-upload mb-3">
                    <label for="cvFile" class="file-label d-flex align-items-center">
                        <span id="file-name" class="flex-grow-1">Subir foto de documento "imagen clara"!</span>
                        <i class="bi bi-upload ms-2"></i>
                    </label>
                    <input name="foto_documento" type="file" id="cvFile" class="file-input form-control" required>
                </div>

                   <input type="hidden" name="registro_id" value="<?php echo e($registro_id); ?>">
                <div class="d-grid mt-3">
                    <button class="btn btn-dark" type="submit">Crear cuenta</button>
                </div>
            </form>

            <p class="text-center small mt-3">
                Al registrarme, acepto <a href="#">los Términos de servicio</a> y la <a href="#">Política de
                    privacidad</a>.
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <?php if(session('success')): ?>
        <script>
            Toastify({
                text: "<?php echo e(session('success')); ?>",
                duration: 3000,
                gravity: "top",
                position: "right",
                backgroundColor: "#ffffff", // verde
                close: true,
                avatar: "https://cdn-icons-png.flaticon.com/512/845/845646.png"
            }).showToast();
        </script>
    <?php endif; ?>
    <script>
        document.getElementById('cvFile').addEventListener('change', function() {
            const fileName = this.files[0]?.name || 'Seleccionar hoja de vida';
            document.getElementById('file-name').textContent = fileName;
        });

        document.getElementById('labor').addEventListener('change', function() {
            const otraLabor = document.getElementById('otraLabor');
            if (this.value === 'otro') {
                otraLabor.classList.remove('d-none');
                otraLabor.setAttribute('name', 'otra_labor');
                otraLabor.required = true;
            } else {
                otraLabor.classList.add('d-none');
                otraLabor.removeAttribute('name');
                otraLabor.required = false;
                otraLabor.value = '';
            }
        });
    </script>

</body>
</html>    <?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/auth/registro-trabajador.blade.php ENDPATH**/ ?>