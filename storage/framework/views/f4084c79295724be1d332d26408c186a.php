<!DOCTYPE html>
<html lang="en">

<head>


    <link rel="stylesheet" href="<?php echo e(asset('css/client-style/login.css')); ?>" />

    <style>
        * {
            margin: 0px;
            box-sizing: border-box;
            padding: 0px;
        }

        #header {
            display: flex;
            justify-content: space-between;
            margin: auto;
            position: fixed;
            width: 100%;
            padding: 1rem 2rem;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            background-color: transparent;
              z-index: 1000; 
        }

        #header.scrolled {
            background-color: white;
            /* box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1); */
        }

        #header #title {
            font-size: 1.5rem;
        }

        #header a {
            font-weight: 100;
            font-size: 1.1rem;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light  px-4 py-3" id="header">
        <a class="navbar-brand fw-bold" id="title" href="<?php echo e(route('login')); ?>">WorkDrive</a>

        <div class="nav-left">
            <a class="navbar-brand fw-300" href="#">sobre nosotros</a>
            <a class="navbar-brand fw-300" href="#">contactanos</a>

        </div>


    </header>
    <script>
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
<?php /**PATH C:\xampp\htdocs\workdrive\WorkDrive-Sena\resources\views/components/header.blade.php ENDPATH**/ ?>