<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Drive</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuActive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- En tu layout o directamente en el archivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
 .map-section {
  height: 400px; /* o el tamaño que quieras para el mapa */
  width: 100%;
  position: relative;
  z-index: 1;
}

#map {
  height: 100%;
  width: 100%;
}

/* .tarjeta-trabajador {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.4s ease, transform 0.4s ease;
  background: #fff;
  border-radius: 8px;
  padding: 8px;
  margin-bottom: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  display: flex;
  align-items: center;
  gap: 10px;
}

.tarjeta-trabajador.visible {
  opacity: 1;
  transform: translateY(0);
}

.tarjeta-trabajador img {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  object-fit: cover;
}

.tarjeta-trabajador .info .nombre {
  font-weight: bold;
}

.tarjeta-trabajador .info .distancia {
  font-size: 0.85em;
  color: #555;
}


#lista-trabajadores {
    display: flex;
    flex-direction: column;
    gap: 12px;
    max-height: 400px;
    overflow-y: auto;
    max-width: 500px;
    /* padding: 20px;
    
}
#lista-trabajadores {
}

#lista-trabajadores.mostrar {
  display: block;
  opacity: 1;
  transform: translateX(0);
}
.tarjeta-trabajador {
  display: flex;
  align-items: center;
  background: #fff;
  border-radius: 12px;
  padding: 12px 16px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.07);
  transition: box-shadow 0.25s ease;
  cursor: pointer;
  margin: 20px 20px 0px 20px ;
}

.tarjeta-trabajador:hover {
  box-shadow: 0 6px 18px rgba(0,0,0,0.12);
}

.tarjeta-trabajador img {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  object-fit: cover;
  margin-right: 16px;
  border: 2px solid #212b36;
}

.tarjeta-trabajador .info {
  display: flex;
  flex-direction: column;
}

.tarjeta-trabajador .info .nombre {
  font-weight: 600;
  font-size: 1rem;
  color: #212b36;
  margin-bottom: 4px;
}

.tarjeta-trabajador .info .distancia {
  font-size: 0.85rem;
  color: #555;
} */

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
                    <a href="{{ route('cliente.index') }}">
                        <i class="bi bi-house-door icon-lg"></i> Inicio
                    </a>
                </li>
                <li>
                    <a href="{{route('profile.index')}}">
                        <i class="bi bi-person-circle"></i> Perfil
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="bi bi-briefcase icon-lg"></i> Servicios
                    </a>
                </li>

                <li>
                    <a href="">
                        <i class="bi bi-telephone icon-lg"></i> Contacto
                    </a>
                </li>
                <li>
                    <a href="">
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
                    <li class="list-group-item profesion-item" id="list-group-item" data-id="{{$profesion->id}}">
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
        <div class="map-section" id="map">
         
        </div>
        
<div id="lista-trabajadores"></div>

        <!-- Form Section -->
        <aside class="form-section">
            <div class="form-header">
                <i class="fas fa-map-marker-alt"></i>
                <span>Dirección: Dg. 18 161</span>
            </div>

            <form id="work-form" method="POST" action="{{ route('servicios.store') }}">
                @csrf
                <input type="text" name="nombre" placeholder="Tu nombre" >
                <input type="date" name="fecha" >
                <input type="time" name="hora" >
                <textarea name="descripcion" placeholder="Descripción" rows="3" ></textarea>
                <input type="text" name="tarifa" placeholder="Tarifa" >

                <!-- Campo oculto para guardar el método de pago -->
                <input type="hidden" name="pago_id" id="pago_id_hidden" required>
                <input type="hidden" name="labor_id" id="profesion_id" value="" required>
                <input type="hidden" name="estado" id="labor_id" value="A" required>
                <input type="hidden" name="latitud" id="user-lat">
                <input type="hidden" name="longitud" id="user-lon">


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
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('js/principal-page/map.js') }}"></script>

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
