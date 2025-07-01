<?php $__env->startSection('title', 'Work Drive'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tarjeta.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/trabajador-style/principal.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <aside class="sidebar">
        <h2>WorkDrive</h2>
        <div class="menu-item" tabindex="0">
            <!-- Icono de Inicio usando Bootstrap Icons -->
            <i class="fa-solid fa-house"></i>
            Inicio
        </div>
        <div class="menu-item" tabindex="0">
            <!-- Icono de Servicios usando Bootstrap Icons -->
            <i class="fa-solid fa-list"></i>
            Servicios
        </div>
        <div class="menu-item" tabindex="0">
            <!-- Icono de Solicitudes usando Bootstrap Icons -->
            <i class="fa-solid fa-handshake"></i>
            Solicitudes
        </div>
        <div class="menu-item" tabindex="0">
            <!-- Icono de Perfil usando Bootstrap Icons -->
            <i class="fa-solid fa-user"></i>
            Trabajados
        </div>
    </aside>

    <div class="main-content">
        <header class="header">
            <h1>Panel de Trabajadores</h1>
            <div class="user-avatar">
                <span><?php echo e($user->name); ?></span>
                <div class="menu-icon" id="menu-icon">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Avatar" />
                </div>
            </div>
        </header>
        

        <!-- Navegación -->
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
            <li>
                <a href="<?php echo e(route('profesiones.index')); ?>">
                    <i class="bi bi-house-door icon-lg"></i> Inicio
                </a>
            </li>
            <li>
                <a href="/usuario/inicio.html">
                    <i class="bi bi-person-circle"></i> Perfil
                </a>
            </li>
            <li>
                <a href="/usuario/Menuu/Servicios.html">
                    <i class="bi bi-briefcase icon-lg"></i> Servicios
                </a>
            </li>
            <li>
                <a href="/usuario/Menuu/Contacto.html">
                    <i class="bi bi-telephone icon-lg"></i> Contacto
                </a>
            </li>
            <li>
                <a href="/usuario/Menuu/Acercade.html">
                    <i class="bi bi-info-circle icon-lg"></i> Acerca de
                </a>
            </li>
            <!-- Cerrar sesión y modo trabajador-->

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

        <div class="content" id="content">
            <section class="left-panel">
                <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="solicitud-card"
                        onclick="mostrarDetalle(
          '<?php echo e($serv->nombre); ?>',
          '',
          '',
          '',
          '',
          '',
          '')">
                        <div class="content-target">

                            <img src="https://randomuser.me/api/portraits/women/60.jpg" class="avatar" alt="avatar" />
                            <div class="solicitud-info">
                                <h4><?php echo e($serv->nombre); ?></h4>
                                <p><?php echo e($serv->descripcion); ?></p>
                            </div>
                        </div>


                        <i class="time-ago">2 day</i>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
            <section class="right-panel" id="detalle">
                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="empty" />
                <h2>Selecciona una solicitud</h2>
                <p>Haz clic en una tarjeta para ver más detalles aquí.</p>
            </section>
        </div>
    </div>


    </body>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

    <script>
        function mostrarDetalle(nombre, descripcion, imagen, direccion, fecha, hora, telefono) {
            const panel = document.getElementById('detalle');
            panel.innerHTML = `
        <img src="${imagen}" alt="${nombre}" />
        <h2>${nombre}</h2>
        <p style="margin-bottom: 1rem;">${descripcion}</p>
        <div style="text-align: left; width: 100%; max-width: 400px;">
          <p><strong>Dirección:</strong> ${direccion}</p>
          <p><strong>Fecha:</strong> ${fecha}</p>
          <p><strong>Hora:</strong> ${hora}</p>
          <p><strong>Teléfono:</strong> ${telefono}</p>
        </div>
        <button style="
          margin-top: 2rem;
          padding: 0.75rem 1.5rem;
          background-color: #2563eb;
          color: white;
          border: none;
          border-radius: 0.5rem;
          font-size: 1rem;
          cursor: pointer;
          transition: background-color 0.3s ease;
        " onmouseover="this.style.backgroundColor='#1d4ed8'" onmouseout="this.style.backgroundColor='#2563eb'">
          Aceptar Servicio
        </button>
      `;
        }
    </script>
    <script src="<?php echo e(asset('js/principal-page/menuActive.js')); ?>"></script>
    <script src="<?php echo e(asset('js/trabajadores-js/map-work.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/front/trabajadores/index.blade.php ENDPATH**/ ?>