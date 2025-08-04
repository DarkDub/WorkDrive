<!-- COMPONENT: Topbar -->
<div class="topbar d-flex justify-content-between align-items-center px-4 py-2 bg-white shadow-sm">
    <!-- COMPONENT: Logo -->
    <h3 class="m-0">WorkDrive</h3>

    <!-- Acciones -->
    <div class="d-flex align-items-center gap-3">

        <!-- Input de búsqueda -->
        

        <!-- Bandera idioma -->
        <img src="https://flagcdn.com/gb.svg" alt="English" width="24" class="rounded shadow-sm" />

        <!-- Notificaciones -->
        <!-- Notificación con SVG personalizado y contador -->
        <button id="openDrawer" type="button"class="btn position-relative p-0 border-0 bg-transparent"
            aria-label="Botón de notificaciones">
            <!-- Ícono SVG (campana) -->
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                class="text-secondary">
                <path fill="currentColor"
                    d="M18.75 9v.704c0 .845.24 1.671.692 2.374l1.108 1.723c1.011 1.574.239 3.713-1.52 4.21a25.8 25.8 0 0 1-14.06 0c-1.759-.497-2.531-2.636-1.52-4.21l1.108-1.723a4.4 4.4 0 0 0 .693-2.374V9c0-3.866 3.022-7 6.749-7s6.75 3.134 6.75 7"
                    opacity="0.4"></path>
                <path fill="currentColor"
                    d="M12.75 6a.75.75 0 0 0-1.5 0v4a.75.75 0 0 0 1.5 0zM7.243 18.545a5.002 5.002 0 0 0 9.513 0c-3.145.59-6.367.59-9.513 0">
                </path>
            </svg>

            <!-- Badge de notificación -->
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger"
                style="width: 22px; height: 22px; font-size: 0.75rem; font-weight: bold; display: flex; align-items: center; justify-content: center;">
                <?php echo e($notificaciones ?? 4); ?>

            </span>
        </button>

        <!-- Panel de notificaciones flotante -->
        <div id="notification-panel" class="dropdown-menu dropdown-menu-end shadow p-0 border-0"
            style="width: 380px; max-height: 600px; overflow-y: auto; display: none; position: absolute; top: 60px; right: 20px; z-index: 1050;">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center px-3 py-2 border-bottom bg-light">
                <h6 class="mb-0 fw-bold">Notificaciones</h6>
                <div class="d-flex gap-2 align-items-center">
                    <i class="bi bi-check2-circle text-success"></i>
                    <i class="bi bi-gear text-muted"></i>
                </div>
            </div>

            <!-- Tabs -->
            <div class="d-flex justify-content-around py-2 border-bottom bg-white">
                <button class="btn btn-sm fw-bold text-dark border-bottom border-2 border-dark rounded-0">
                    Todo <span class="badge bg-dark ms-1">22</span>
                </button>
                <button class="btn btn-sm text-muted">No leído <span class="badge bg-secondary ms-1">12</span></button>
                <button class="btn btn-sm text-muted">Archivado <span class="badge bg-success ms-1">10</span></button>
            </div>

            <!-- Lista -->
            <div class="p-3">
                <div class="mb-4 d-flex gap-2">
                    <img src="https://i.pravatar.cc/40?img=12" class="rounded-circle" width="40" />
                    <div>
                        <div class="fw-bold">Deja Brady</div>
                        <div class="text-muted small">te envió una solicitud · ahora · Comunicación</div>
                        <div class="mt-2 d-flex gap-2">
                            <button class="btn btn-sm btn-dark">Aceptar</button>
                            <button class="btn btn-sm btn-outline-secondary">Rechazar</button>
                        </div>
                    </div>
                    <span class="ms-auto mt-1 text-primary">●</span>
                </div>
                <!-- Puedes duplicar más notificaciones aquí -->
            </div>

            <!-- Footer -->
            <div class="text-center border-top py-2">
                <a href="#" class="text-decoration-none fw-semibold">Ver todo</a>
            </div>
        </div>

        <!-- Usuarios -->
        <i class="bi bi-people fs-4 text-secondary"></i>

        <!-- Configuración -->
        <i class="bi bi-gear fs-4 text-secondary"></i>

        <!-- Avatar + dropdown -->
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://i.pravatar.cc/150?img=32" class="rounded-circle me-2" width="32" height="32"
                    alt="avatar">
                <span><?php echo e(Auth::check() ? Auth::user()->name : 'Invitado'); ?></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item text-danger">Cerrar sesión</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('notification-toggle');
        const panel = document.getElementById('notification-panel');

        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            panel.style.display = (panel.style.display === 'block') ? 'none' : 'block';
        });

        document.addEventListener('click', function(e) {
            if (!panel.contains(e.target) && !toggle.contains(e.target)) {
                panel.style.display = 'none';
            }
        });
    });
</script>
<?php /**PATH C:\Users\Palma\Desktop\WorkDrive-Sena\resources\views/components/topbar.blade.php ENDPATH**/ ?>