<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['name' => 'prueba', 'id' => 'menu', 'email' => 'luis@gmail.com']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['name' => 'prueba', 'id' => 'menu', 'email' => 'luis@gmail.com']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('css/menuActive.css')); ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    .logout-beauty:hover {
        background: linear-gradient(135deg, #ffcccc, #ffb3b3);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(211, 47, 47, 0.25);
    }

    .scroll-area {
        overflow-y: auto;
        flex: 1;
        padding-bottom: 10px;
        /* evita que el contenido choque con el botón */
    }

    .scroll-area::-webkit-scrollbar {
        width: 8px;
        background-color: transparent;
    }

    .scroll-area::-webkit-scrollbar-track {
        background: transparent;
    }

    .scroll-area::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #ccc, #999);
        border-radius: 4px;
        border: 2px solid transparent;
        background-clip: content-box;
        transition: background 0.3s ease;
    }

    .scroll-area:hover::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #bbb, #888);
    }

    .scroll-area {
        overflow-y: auto;
        max-height: 100%;
        direction: rtl;
        /* mueve la scrollbar a la izquierda */
        scrollbar-width: none;
        /* para Firefox */
        -ms-overflow-style: none;
        /* para IE/Edge */
    }

    .scroll-area * {
        direction: ltr;
        /* contenido normal, no invertido */
    }

    /* Oculta scrollbar en Chrome, Safari y Edge */
    .scroll-area::-webkit-scrollbar {
        width: 8px;
        background: transparent;
    }

    /* Solo aparece con hover */
    .scroll-area::-webkit-scrollbar-thumb {
        background: transparent;
        border-radius: 4px;
        transition: background 0.3s ease;
    }

    /* Al hacer hover, aparece con color bonito */
    .scroll-area:hover::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #5a5a5a, #888);
    }
</style>

<nav class="menu" id="menu">
    <!-- Header del menú -->
    <div class="menu-header">
        <div class="close-icon" id="close-icon">
            <i class="iconify" data-icon="mdi:close"></i>
        </div>
    </div>
    <div class="scroll-area">

        <div class="avatar-wrapper">
            <div class="rotating-border"></div>
            

        </div>
        <!-- Usuario -->

        <div class="user-info">


            <div class="user-name">
                <h6>
                    <?php echo e(Auth::user()->name); ?>

                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </h6>
            </div>
            

            <div class="text-muted"><?php echo e(Auth::user()->email); ?></div>

        </div>
        <div class="d-flex justify-content-center gap-2 mt-3 avatar-group">
            <img src="<?php echo e(asset('image/avatar-2.jpg')); ?>" alt="">
            <img src="<?php echo e(asset('image/avatar-3.jpg')); ?>" alt="">
            <img src="<?php echo e(asset('image/avatar-4.jpg')); ?>" alt="">
            <button class="btn btn-light rounded-circle border"><i class="bi bi-plus"></i></button>
        </div>


        <hr />

        <!-- Navegación -->
        <ul class="nav-links-trabajador">

            <?php echo e($slot); ?>


        </ul>
        <div class="promo-card1"
            style="
    margin: 20px;
    padding: 20px;
    border-radius: 16px;
    background: linear-gradient(135deg, #f5f5fd, #eae8fe, #d5d0fb);
    color: #111;
    text-align: left;
    position: relative;
    box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.05);
    
">
            <!-- Estilos internos para animación -->
            <style>
                @keyframes float {
                    0% {
                        transform: translateY(0);
                    }

                    50% {
                        transform: translateY(-8px);
                    }

                    100% {
                        transform: translateY(0);
                    }
                }

                .floating-rocket {
                    animation: float 3s ease-in-out infinite;
                }
            </style>

            <!-- Ícono de cohete animado -->
            <div style="position: absolute; right: 16px; bottom: 8px;">
                <img src="https://img.icons8.com/color/96/rocket--v1.png" alt="Rocket" class="floating-rocket"
                    style="width: 60px; height: auto;">
            </div>

            <!-- Texto promocional -->
            <div style="z-index: 2; position: relative;">
                <h5 style="font-size: 18px; font-weight: 700; margin: 0 0 4px;">35% OFF</h5>
                <p style="margin: 0 0 12px; font-size: 14px; color: #555;">Power up Productivity!</p>
                <button
                    style="
            background-color: #ffc107;
            border: none;
            border-radius: 8px;
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 600;
            color: #212529;
            cursor: pointer;
            transition: all 0.3s ease;
        ">Upgrade
                    to Pro</button>
            </div>
        </div>

    </div>
    <!-- Cerrar sesión y modo trabajador-->
    <div class="menu-footer">
        <a href="<?php echo e(route('logout')); ?>" class="logout-beauty"
            style="
        display: block;
        text-align: center;
        background: linear-gradient(135deg, #ffe5e5, #ffd6d6);
        color: #d32f2f;
        padding: 12px 0;
        margin: 10px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        box-shadow: 0 4px 12px rgba(211, 47, 47, 0.15);
        transition: all 0.3s ease;
    "
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right" style="font-size: 20px; vertical-align: middle; margin-right: 8px;"></i>
            Cerrar sesión
        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
        
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/components/menu-nav.blade.php ENDPATH**/ ?>