<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', config('app.name', 'Laravel')); ?></title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600&display=swap" rel="stylesheet">


    <style>
        .fade {
            transition: 0.5s;
        }

        .sidebar {
            background-color: #343a40;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            color: #ccc;
        }
    </style>

    <?php echo $__env->yieldContent('styles'); ?>
</head>

<body class="bg-light">
    
    <!-- Spinner Global -->
    <?php if (isset($component)) { $__componentOriginalb1d34d6f3e357e59739b3911f1a779be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1d34d6f3e357e59739b3911f1a779be = $attributes; } ?>
<?php $component = App\View\Components\GlobalSpiner::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('global-spiner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GlobalSpiner::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb1d34d6f3e357e59739b3911f1a779be)): ?>
<?php $attributes = $__attributesOriginalb1d34d6f3e357e59739b3911f1a779be; ?>
<?php unset($__attributesOriginalb1d34d6f3e357e59739b3911f1a779be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb1d34d6f3e357e59739b3911f1a779be)): ?>
<?php $component = $__componentOriginalb1d34d6f3e357e59739b3911f1a779be; ?>
<?php unset($__componentOriginalb1d34d6f3e357e59739b3911f1a779be); ?>
<?php endif; ?>

    <div class="content">

        <?php echo $__env->yieldContent('content'); ?>
        <?php echo e($slot ?? ''); ?>

    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo e(asset('js/notificacionesAjax.js')); ?>"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldContent('js'); ?>
</body>
<script>
    window.addEventListener('load', () => {
        setTimeout(() => {
            const loader = document.getElementById('global-loader');
            if (loader) {
                loader.style.opacity = '0';
                setTimeout(() => loader.style.display = 'none', 300);
            }
        }, 800); // puedes ajustar el tiempo de espera aquí (800 ms a 1500 ms)
    });
</script>
<script>
    const notificationButton = document.getElementById('notificationButton');
    const notificationMenu = document.getElementById('notificationMenu');

    notificationButton.addEventListener('click', function() {
        notificationMenu.classList.toggle('show');
    });

    window.addEventListener('click', function(e) {
        if (!notificationButton.contains(e.target) && !notificationMenu.contains(e.target)) {
            notificationMenu.classList.remove('show');
        }
    });
</script>


</html>
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/layouts/app.blade.php ENDPATH**/ ?>