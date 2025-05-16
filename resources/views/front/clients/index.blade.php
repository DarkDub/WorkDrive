<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Drive</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuActive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- En tu layout o directamente en el archivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>

    </style>
</head>

<body>
    <header class="header">
        <div class="menu-container">

            <div class="logo">
                <div class="menu-icon" id="menu-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="text-logo">Work Drive</div>

            </div>

            <!-- Navegación -->
            <x-menu-nav>
                <li>
                    <a href="{{ route('profesiones.index') }}">
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

            </x-menu-nav>


        </div>
        <div class="nav-left">
            <a href="">
                <h5>Sobre nosostros</h5>

            </a>
            <a href="">

                <h5>Contactanos</h5>
            </a>
        </div>
    </header>

    <main class="main-container">
        <!-- Sidebar -->
        <!-- Icono de menú (hamburguesa) -->


        <!-- Menú desplegable -->

        <aside class="sidebar">
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" placeholder="Buscar profesiones..." class="search-input" />
            </div>

            <ul class="list-group">
                @foreach ($profesiones as $profesion)
                    <li class="list-group-item" id="list-group-item" data-id="{{$profesion->id}}">
                        <div class="icon-circle">
                            <span class="iconify icono-profesion" data-icon="{{ $profesion->icono }}" data-width="22"
                                data-height="22"></span>
                        </div>
                        <div class="profesion-info">
                            <strong class="profesion-nombre">{{ $profesion->nombre }}</strong>
                            <small class="profesion-desc">{{ $profesion->descripcion }}</small>
                        </div>
                    </li>
                @endforeach
            </ul>

        </aside>


        <!-- Map Section -->
        <div class="map-section">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15717.064567241416!2d-74.7797!3d10.8262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e44b0223332f4cf%3A0xb9c7d68e5c58a5fe!2sMalambo%2C%20Atl%C3%A1ntico%2C%20Colombia!5e0!3m2!1ses!2ses!4v1699885588789!5m2!1ses!2ses"
                allowfullscreen="" loading="lazy"></iframe>
        </div>

        <!-- Form Section -->
        <aside class="form-section">
            <div class="form-header">
                <i class="fas fa-map-marker-alt"></i>
                <span>Dirección: Dg. 18 161</span>
            </div>

            <form id="work-form" method="POST" action="{{ route('servicios.store') }}">
                @csrf
                <input type="text" name="nombre" placeholder="Tu nombre" required>
                <input type="date" name="fecha" required>
                <input type="time" name="hora" required>
                <textarea name="descripcion" placeholder="Descripción" rows="3" required></textarea>
                <input type="text" name="tarifa" placeholder="Tarifa" required>

                <!-- Campo oculto para guardar el método de pago -->
                <input type="hidden" name="pago_id" id="pago_id_hidden" required>
                <input type="hidden" name="labor_id" id="profesion_id" value="" required>
                <input type="hidden" name="estado" id="labor_id" value="A" required>

                <div class="payment-method" id="payment-method">
                    <i class="fas fa-credit-card"></i> <span class="method-text">Seleccionar método de pago</span>
                </div>


                <button type="submit" class="submit-btn">Solicitar</button>
            </form>


            {{-- <div class="promo-card">
                    <div class="promo-content">
                        <h3>¡35% de Descuento!</h3>
                        <p>Aprovecha esta oferta para pedir tu servicio hoy mismo.</p>
                        <button>Solicitar Servicio</button>
                    </div>
                    <div class="promo-icon">
                        <i class="fas fa-hourglass-end"></i>
                    </div>
                </div> --}}
        </aside>

        <div id="paymentModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Métodos de Pago</h2>
                <ul class="metodos_pagos">
                    @foreach ($metodosPago as $metodo)
                        <li data-id="{{ $metodo->id }}">
                            <span class="iconify" data-icon="{{ $metodo->icono }}"
                                style="width: 24px; height: 24px; margin-right: 10px;"></span>
                            {{ $metodo->nombre }}
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>


    </main>
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/principal-page/modal-page.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    
    @if (session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            gravity: "top",
            position: "right",
            backgroundColor: "#ffffff", // verde
            close: true,
            avatar: "https://cdn-icons-png.flaticon.com/512/845/845646.png"
        }).showToast();
    </script>
@endif
</body>

</html>
