<?php $__env->startSection('title', 'Work Drive'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/inicio.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/menuActive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/modal.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/tarjeta.css')); ?>">
    <style>
        .map-section {
            height: 400px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        #map {
            height: 100%;
            width: 100%;
        }

        .form-control {
            border-radius: var(--radius-md);
            padding: 0.75rem;
            font-size: var(--font-size-base);
            background-color: var(--color-input-bg);
            border: 1px solid var(--color-input-border);
            transition: 0.3s ease, color 0.5s ease;
            box-sizing: border-box;
        }

        .form-label {
            font-weight: 500;
            font-size: var(--font-size-sm);
            margin-bottom: 0.2rem;
        }

        #notificationMenu {
            min-width: 400px;
            /* O el ancho que prefieras */
            max-width: 600px;
            /* Opcional, para limitar */
            white-space: normal;
            /* Permite que los textos largos se ajusten */
        }

        /* Dropdown container */
        .notification-dropdown {
            position: relative;
            display: inline-block;
        }

        /* Icono con contador */
        .notification-icon {
            background: none;
            border: none;
            position: relative;
            cursor: pointer;
            font-size: 24px;
        }

        .notification-count {
            background-color: #ff4757;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
            position: absolute;
            top: -8px;
            right: -8px;
            transition: transform 0.3s ease;
        }

        .notification-count.updated {
            transform: scale(1.3);
        }

        /* Menú dropdown */
        .notification-menu {
  position: absolute;
  top: 100%; /* justo debajo del botón */
  right: 0;
  width: 320px; /* ajusta el ancho */
  background: #fff; /* fondo blanco limpio */
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  padding: 1rem;
  z-index: 1000;
  max-height: 400px; /* para scroll si hay muchas notificaciones */
  overflow-y: auto;
  opacity: 0;
  transform: translateY(-10px);
  pointer-events: none;
  transition: opacity 0.3s ease, transform 0.3s ease;
}

.notification-menu.show {
  opacity: 1;
  transform: translateY(0);
  pointer-events: auto;
}

/* Para la cabecera */
.notification-menu h5 {
  margin-bottom: 1rem;
  font-weight: 600;
  color: #333;
  border-bottom: 1px solid #eee;
  padding-bottom: 0.5rem;
}

/* Para las notificaciones */
.list-group-item {
  border: none;
  border-radius: 8px;
  transition: background-color 0.2s ease;
  margin-bottom: 10px
}
.list-group-item img{
    width: 50px !important;
    height: 50px !important;
}
.list-group-item:hover {
  background-color: #f5f5f5;
}

/* Botón leída más minimalista */
.btn-outline-success {
  font-size: 0.8rem;
  padding: 0.3rem 0.6rem;
  border-radius: 6px;
}

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <header class="header">
        <div class="menu-container">
            <div class="logo">
                <div class="menu-icon" id="menu-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="text-logo">Work Drive</div>
            </div>

            <?php if (isset($component)) { $__componentOriginalb00d8d8478d8b102d68d8f1d59f5af2d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb00d8d8478d8b102d68d8f1d59f5af2d = $attributes; } ?>
<?php $component = App\View\Components\MenuNav::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menu-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\MenuNav::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <li><a href="<?php echo e(route('cliente.index')); ?>"><i class="bi bi-house-door icon-lg"></i> Inicio</a></li>
                <li><a href="<?php echo e(route('profile.index')); ?>"><i class="bi     bi-person-circle"></i> Perfil</a></li>
                <li><a href="<?php echo e(route('servicio.misSolicitudes')); ?>"><i class="bi bi-briefcase icon-lg"></i> Servicios</a>
                </li>
                <li><a href="#"><i class="bi bi-telephone icon-lg"></i> Contacto</a></li>
                <li><a href="#"><i class="bi bi-info-circle icon-lg"></i> Acerca de</a></li>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb00d8d8478d8b102d68d8f1d59f5af2d)): ?>
<?php $attributes = $__attributesOriginalb00d8d8478d8b102d68d8f1d59f5af2d; ?>
<?php unset($__attributesOriginalb00d8d8478d8b102d68d8f1d59f5af2d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb00d8d8478d8b102d68d8f1d59f5af2d)): ?>
<?php $component = $__componentOriginalb00d8d8478d8b102d68d8f1d59f5af2d; ?>
<?php unset($__componentOriginalb00d8d8478d8b102d68d8f1d59f5af2d); ?>
<?php endif; ?>


        </div>
        <div class="nav-left">
            <div class="notification-dropdown">
                <button id="notificationButton" class="notification-icon">
                     <i class="bi bi-bell"></i>
                    <span id="notificaciones-count" class="notification-count">0</span>
                </button>
                <div id="notificationMenu" class="notification-menu">
                    <h5>Notificaciones</h5>
                    <ul class="list-group" id="notificacionesList">

                    </ul>
                </div>
            </div>

            <a href="#">
                <h5>Sobre nosotros</h5>
            </a>
            <a href="#">
                <h5>Contáctanos</h5>
            </a>
        </div>
    </header>

    <main class="main-container">
        <aside class="sidebar">
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" placeholder="Buscar profesiones..." class="search-input" />
            </div>

            <ul class="list-group">
                <?php $__currentLoopData = $profesiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profesion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item profesion-item tarjeta" id="list-group-item" data-id="<?php echo e($profesion->id); ?>">
                        <div class="icon-circle">
                            <span class="iconify icono-profesion" data-icon="<?php echo e($profesion->icono); ?>" data-width="22"
                                data-height="22"></span>
                        </div>
                        <div class="profesion-info">
                            <strong class="profesion-nombre"><?php echo e($profesion->nombre); ?></strong>
                            <small class="profesion-desc"><?php echo e($profesion->descripcion); ?></small>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </aside>

        <div class="map-section" id="map"></div>
        <div id="lista-trabajadores"></div>

        <aside class="form-section">
            <div class="form-header">

                <i class="fas fa-map-marker-alt"></i>
                <span>Dirección: Dg. 18 161</span>
            </div>

            <form id="work-form" method="POST" action="<?php echo e(route('servicios.store')); ?>">
                <?php echo csrf_field(); ?>

                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('nombre')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('nombre'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                <input type="text" name="nombre" placeholder="Tu nombre" class=" <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
is-invalid
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    autofocus value="<?php echo e(old('fecha')); ?>">
                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('fecha')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('fecha'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                <input type="date" name="fecha" class=" <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
is-invalid
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autofocus>
                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('hora')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('hora'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                <input type="time" name="hora" class=" <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
is-invalid
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autofocus>

                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('descripcion')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('descripcion'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                <textarea name="descripcion" placeholder="Descripción" rows="3"
                    class=" <?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
is-invalid
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autofocus></textarea>
                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('tarifa')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('tarifa'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                <input type="text" name="tarifa" placeholder="Tarifa"
                    class=" <?php $__errorArgs = ['tarifa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autofocus>

                <input type="hidden" name="pago_id" id="pago_id_hidden" required>
                <input type="hidden" name="labor_id" id="profesion_id" required>
                <input type="hidden" name="estado" value="" required>
                <input type="hidden" name="latitud" id="user-lat">
                <input type="hidden" name="longitud" id="user-lon">

                <div class="payment-method" id="payment-method">
                    <i class="fas fa-credit-card"></i> <span class="method-text">Seleccionar método de pago</span>
                </div>

                <button type="submit" class="submit-btn">Solicitar Servicio</button>
            </form>
        </aside>

        <div id="paymentModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Métodos de Pago</h2>
                <ul class="metodos_pagos">
                    <?php $__currentLoopData = $metodosPago; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-id="<?php echo e($metodo->id); ?>">
                            <span class="iconify" data-icon="<?php echo e($metodo->icono); ?>"
                                style="width: 24px; height: 24px; margin-right: 10px;"></span>
                            <?php echo e($metodo->nombre); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/servicios-polling.js')); ?>"></script>

    <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            verificarAceptacion(<?php echo e($servicio->id); ?>);
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <script src="<?php echo e(asset('js/principal-page/menuActive.js')); ?>"></script>
    <script src="<?php echo e(asset('js/principal-page/modal-page.js')); ?>"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="<?php echo e(asset('js/principal-page/map.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <!-- CDN de SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if(session('success')): ?>
        <script>
            Toastify({
                text: "<?php echo e(session('success')); ?>",
                duration: 3000,
                gravity: "top",
                position: "right",
                style: {
                    background: "#ffffff"
                }, // verde
                close: true,
                avatar: "https://cdn-icons-png.flaticon.com/512/845/845646.png"
            }).showToast();
        </script>
    <?php endif; ?>

    <script>
        document.getElementById("work-form").addEventListener("submit", function(e) {
            const laborInput = document.getElementById("profesion_id");
            if (!laborInput.value) {
                e.preventDefault();
                Toastify({
                    text: "seleccione una labor",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "#ffffff"
                    }, // verde
                    close: true,
                    avatar: "https://cdn-icons-png.flaticon.com/512/463/463612.png"
                }).showToast();
            }
        });
    </script>
    <script>
        document.querySelectorAll('.profesion-item').forEach(item => {
            item.addEventListener('click', () => {
                const laborId = item.dataset.id;
                const laborNombre = item.querySelector('.profesion-nombre').innerText;

                document.getElementById('profesion_id').value = laborId;

                Toastify({
                    text: `Labor seleccionada: ${laborNombre}`,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "#ffffff"
                    },
                    close: true,
                    avatar: "https://cdn-icons-png.flaticon.com/512/190/190411.png"
                }).showToast();
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/front/clients/index.blade.php ENDPATH**/ ?>