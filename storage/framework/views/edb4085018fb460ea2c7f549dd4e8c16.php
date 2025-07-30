 

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
<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h2 class="fw-bold text-center mb-5">Configuración del Trabajador</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Perfil Personal -->
        <div class="card transition hover:scale-105 hover:shadow-xl duration-300">
            <div class="card-body">
                <h5 class="text-xl font-bold mb-3">Perfil Personal</h5>
                <ul class="space-y-2 text-sm">
                    <li><strong>Nombre:</strong> <?php echo e(Auth::user()->name); ?></li>
                    <li><strong>Email:</strong> <?php echo e(Auth::user()->email); ?></li>
                    <li><strong>Teléfono:</strong> 3012345678</li>
                    <li><strong>Dirección:</strong> Calle Falsa 123</li>
                </ul>
                <a href="#" class="btn btn-primary mt-4 w-full">Editar Perfil</a>
            </div>
        </div>

        <!-- Disponibilidad -->
        <div class="card transition hover:scale-105 hover:shadow-xl duration-300">
            <div class="card-body">
                <h5 class="text-xl font-bold mb-3">Disponibilidad</h5>
                <p class="text-sm">Selecciona los días y horarios en los que puedes trabajar.</p>
                <a href="#" class="btn btn-outline-secondary mt-4 w-full">Configurar</a>
            </div>
        </div>

        <!-- Preferencias de Trabajo -->
        <div class="card transition hover:scale-105 hover:shadow-xl duration-300">
            <div class="card-body">
                <h5 class="text-xl font-bold mb-3">Preferencias de Trabajo</h5>
                <p class="text-sm">Elige los servicios que deseas ofrecer y tu zona de cobertura.</p>
                <a href="#" class="btn btn-outline-secondary mt-4 w-full">Preferencias</a>
            </div>
        </div>

        <!-- Notificaciones -->
        <div class="card transition hover:scale-105 hover:shadow-xl duration-300">
            <div class="card-body">
                <h5 class="text-xl font-bold mb-3">Notificaciones</h5>
                <p class="text-sm">Gestiona tus alertas por correo o SMS.</p>
                <a href="#" class="btn btn-outline-secondary mt-4 w-full">Ajustes</a>
            </div>
        </div>

        <!-- Seguridad -->
        <div class="card transition hover:scale-105 hover:shadow-xl duration-300">
            <div class="card-body">
                <h5 class="text-xl font-bold mb-3">Seguridad</h5>
                <p class="text-sm">Cambia tu contraseña o verifica tu cuenta.</p>
                <a href="#" class="btn btn-outline-secondary mt-4 w-full">Seguridad</a>
            </div>
        </div>

        <!-- Documentación -->
        <div class="card transition hover:scale-105 hover:shadow-xl duration-300">
            <div class="card-body">
                <h5 class="text-xl font-bold mb-3">Documentación</h5>
                <p class="text-sm">Revisa o sube documentos como tu hoja de vida o identificación.</p>
                <a href="#" class="btn btn-outline-secondary mt-4 w-full">Ver Documentos</a>
            </div>
        </div>

    </div>
</div>
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
<?php endif; ?><?php /**PATH C:\Users\Palma\Desktop\NewProject\WorkDrive-Sena (1)\WorkDrive-Sena\resources\views/Configuraciones/index.blade.php ENDPATH**/ ?>