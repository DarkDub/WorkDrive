<?php $__env->startSection('title', 'Work Drive'); ?>

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/tarjeta.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/trabajador-style/principal.css')); ?>">
    <style>
        #card {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            width: 400px;
            padding: 24px;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 16px;
            transition: transform 0.2s;
        }

        #card:hover {
            transform: translateY(-4px);
        }

        .status {
            position: absolute;
            top: 16px;
            right: 16px;
            color: #2e7d32;
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 0.85em;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info img {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-details .name {
            font-size: 1.2em;
            font-weight: bold;
            color: #4194ff
        }

        .user-details .telefono {
            font-size: 0.9em;
            color: #555;
        }

        .service-info .category {
            font-weight: 600;
            color: #007bff;
            margin-bottom: 6px;
        }

        .service-info .description {
            color: #333;
            line-height: 1.5;
        }

        .content-target {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .extra-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85em;
            color: #666;
        }

        #detalle {
            justify-content: none !important;
        }

        .detail-panel {
            background: #ffffff;
            width: 400px;
            height: 70%;
            padding: 20px;
            overflow-y: auto;
            font-family: 'Segoe UI', sans-serif;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .user-info h4 {
            position: absolute;
            top: 24px;
            left: 32px;
            font-size: 1.4rem;
            color: #333;
            margin: 0;
        }

        .user-info img {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .user-details {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .user-details .name {
            font-weight: bold;
            font-size: 1.1rem;
            color: #222;
        }

        .estado {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: center;
            width: fit-content;
        }

        .pendiente {
            background-color: #fff3cd;
            color: #856404;
        }

        .Activo {
            background-color: #61a5b9;
            color: #ffffff;
        }

        .disponible {
            background-color: #d4edda;
            color: #155724;
        }

        .info-block {
            margin-bottom: 16px;
        }

        .info-block label {
            display: block;
            font-weight: bold;
            color: #444;
            margin-bottom: 4px;
        }

        .info-block p {
            margin: 0;
            color: #555;
            font-size: 0.95rem;
            line-height: 1.4;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginal2e4c0f8dfdc1b0288c4820e0ddf54cc6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e4c0f8dfdc1b0288c4820e0ddf54cc6 = $attributes; } ?>
<?php $component = App\View\Components\MenuWork::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('menuWork'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\MenuWork::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e4c0f8dfdc1b0288c4820e0ddf54cc6)): ?>
<?php $attributes = $__attributesOriginal2e4c0f8dfdc1b0288c4820e0ddf54cc6; ?>
<?php unset($__attributesOriginal2e4c0f8dfdc1b0288c4820e0ddf54cc6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e4c0f8dfdc1b0288c4820e0ddf54cc6)): ?>
<?php $component = $__componentOriginal2e4c0f8dfdc1b0288c4820e0ddf54cc6; ?>
<?php unset($__componentOriginal2e4c0f8dfdc1b0288c4820e0ddf54cc6); ?>
<?php endif; ?>

    <section class="content" id="content" aria-live="polite">
        <div id="content-left-solicitudes" class="content-left">
            <h2 class="title-content">Solicitudes</h2>

            <section class="left-panel" aria-label="Lista de solicitudes">
                <?php $__empty_1 = true; $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="solicitud-card <?php echo e($serv->trabajador_id ? 'aceptado' : ''); ?>" data-id="<?php echo e($serv->id); ?>"
                        data-trabajador="<?php echo e($serv->trabajador_id ?? ''); ?>"
                        data-direccion="<?php echo e($serv->direccion ?? 'No especificada'); ?>"
                        data-fecha="<?php echo e($serv->fecha ?? '---'); ?>" data-hora="<?php echo e($serv->hora ?? '---'); ?>"
                        data-telefono="<?php echo e($serv->usuario?->telefono ?? 'No disponible'); ?>" data-nombre="<?php echo e($serv->nombre); ?>"
                        data-descripcion="<?php echo e($serv->descripcion); ?>" role="button" tabindex="0" aria-pressed="false"
                        aria-label="Solicitud <?php echo e($serv->nombre); ?> <?php echo e($serv->trabajador_id ? '(Aceptada)' : '(Pendiente)'); ?>"
                        id="card">

                        <div class="status">
                            <div class="estado <?php echo e($serv->estado->nombre); ?>">
                                <?php echo e($serv->trabajador_id ? 'Pendiente' : 'Activo'); ?>

                            </div>
                        </div>

                        <div class="content-target">
                            <img src="<?php echo e(asset('storage/' . ($serv->usuario?->registro?->avatar ?? 'default-avatar.png'))); ?>"
                                alt="Foto de perfil de <?php echo e($serv->usuario->name ?? 'Usuario'); ?>" class="avatar">

                            <div class="solicitud-info">
                                <h4><?php echo e($serv->nombre); ?></h4>
                                <div class="time-ago date">solicitidado <?php echo e($serv->created_at->diffForHumans()); ?></div>
                            </div>
                        </div>

                        <div class="extra-info">
                            <div class="user-details">
                                <span class="name">Servicio:
                                    <?php echo e($serv->profesion->nombre ?? 'Usuario Desconocido'); ?></span>
                                <p class="my-0"><?php echo e($serv->descripcion); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No hay solicitudes disponibles.</p>
                <?php endif; ?>
            </section>
        </div>

        <section class="right-panel" id="detalle" aria-live="polite" aria-label="Detalles de solicitud">
            <div class="right-panel2">

                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="No hay selección" />
                <h2>Selecciona una solicitud</h2>
                <p>Haz clic en una tarjeta para ver más detalles aquí.</p>
            </div>

        </section>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/principal-page/menuActive.js')); ?>"></script>
    <script src="<?php echo e(asset('js/trabajadores-js/map-work.js')); ?>"></script>
    <script src="<?php echo e(asset('js/trabajadores-js/service.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/front/trabajadores/index.blade.php ENDPATH**/ ?>