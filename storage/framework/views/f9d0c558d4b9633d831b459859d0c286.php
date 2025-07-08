 <aside class="sidebar" role="navigation" aria-label="Menú principal">
    <h2>WorkDrive</h2>
    <a href="<?php echo e(route('trabajador.index')); ?>" class="menu-item" tabindex="0" role="link" aria-label="Inicio"> 
        <i class="fa-solid fa-house" aria-hidden="true"></i> Inicio
    </a>
    <a class="menu-item" tabindex="0" role="link" aria-label="Servicios">
        <i class="fa-solid fa-list" aria-hidden="true"></i> Servicios
    </a>
    <a href="<?php echo e(route('solicitudes.estado')); ?>" class="menu-item" tabindex="0" role="link" aria-label="Solicitudes">
        <i class="fa-solid fa-handshake" aria-hidden="true"></i> Solicitudes
    </a>
    <a href="" class="menu-item" tabindex="0" role="link" aria-label="Trabajados">
        <i class="fa-solid fa-user" aria-hidden="true"></i> Trabajados
    </a>
</aside>
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
        <li><a href="<?php echo e(route('trabajador.index')); ?>"><i class="bi bi-house-door icon-lg" aria-hidden="true"></i> Inicio</a></li>
        <li><a href="/usuario/inicio.html"><i class="bi bi-person-circle" aria-hidden="true"></i> Perfil</a></li>
        <li><a href="/usuario/Menuu/Servicios.html"><i class="bi bi-briefcase icon-lg" aria-hidden="true"></i> Servicios</a></li>
        <li><a href="/usuario/Menuu/Contacto.html"><i class="bi bi-telephone icon-lg" aria-hidden="true"></i> Contacto</a></li>
        <li><a href="/usuario/Menuu/Acercade.html"><i class="bi bi-info-circle icon-lg" aria-hidden="true"></i> Acerca de</a></li>
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
<main class="main-content">
    
 <header class="header" role="banner">
        <h1>Panel de Trabajadores</h1>
        <div class="user-avatar" aria-label="Información del usuario">
            <span><?php echo e($user->name); ?></span>
            <div class="menu-icon" id="menu-icon" aria-haspopup="true" aria-expanded="false">
            <?php if (isset($component)) { $__componentOriginal7cfd8f8baef738949d4b6a5e8528bcb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7cfd8f8baef738949d4b6a5e8528bcb4 = $attributes; } ?>
<?php $component = App\View\Components\Avatar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Avatar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'avatar']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7cfd8f8baef738949d4b6a5e8528bcb4)): ?>
<?php $attributes = $__attributesOriginal7cfd8f8baef738949d4b6a5e8528bcb4; ?>
<?php unset($__attributesOriginal7cfd8f8baef738949d4b6a5e8528bcb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7cfd8f8baef738949d4b6a5e8528bcb4)): ?>
<?php $component = $__componentOriginal7cfd8f8baef738949d4b6a5e8528bcb4; ?>
<?php unset($__componentOriginal7cfd8f8baef738949d4b6a5e8528bcb4); ?>
<?php endif; ?>

            </div>
        </div>
    </header>

<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/components/menu-work.blade.php ENDPATH**/ ?>