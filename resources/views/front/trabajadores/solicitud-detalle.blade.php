@extends('layouts.app')

@section('title', 'Detalle de Solicitud #' . $solicitud->id)

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/porve.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/principal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/list-solicitudes.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<style>
  #map {
    width: 100%;
    height: 300px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    margin-top: 1rem;
  }

  .leaflet-container {
    font-family: 'Public Sans', sans-serif;
  }

  .leaflet-control-zoom,
  .leaflet-control-attribution {
    border: none;
    background: rgba(255, 255, 255, 0.8);
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    border-radius: 8px;
  }

  .leaflet-popup-content-wrapper {
    border-radius: 8px;
    background: #fff;
    color: #333;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  }

  .leaflet-popup-tip {
    background: #fff;
  }
</style>

@endsection

@section('content')
    <x-menuWork />

    <div class="headers">
        <a href="{{ route('solicitudes.estado') }}" class="btn-back" aria-label="Volver">
            <i class="fas fa-chevron-left"></i>
        </a>
        <h1 class="order-title">
            Solicitud <span class="order-number">#{{ $solicitud->id }}</span>
            @if ($solicitud->estado->nombre == 'pendiente')
                <span class="badge badge-pending" aria-label="Estado pendiente">Pendiente</span>
            @elseif($solicitud->estado->nombre == 'completado')
                <span class="badge badge-completed" aria-label="Estado completado">Completado</span>
            @endif
        </h1>
    </div>

    <p class="order-date">Creada el {{ $solicitud->created_at->format('d M Y g:i a') }}</p>

    <div class="content">
        <div class="left-side">
            <div class="card">
                <h2 class="card-title">Información del Servicio</h2>
                <div class="product-info">
                
                    <div>
                        <p><strong>Descripción:</strong> {{ $solicitud->descripcion ?? 'No hay descripción' }}</p>
                        <p><strong>ID Servicio:</strong> {{ $solicitud->id }}</p>
                        <p><strong>Tarifa:</strong> ${{ number_format($solicitud->tarifa, 2) }}</p>
                    </div>
                </div>

                @if($solicitud->latitud && $solicitud->longitud)
                    <div id="map"></div>
                @endif

                <div class="summary">
                    <div class="summary-row total"><span>Total a pagar</span><span>${{ number_format($solicitud->tarifa, 2) }}</span></div>
                </div>
            </div>

            <div class="card">
                <h2 class="card-title">Historial de Estados</h2>
                <ul class="history-list">
                    <li class="history-item">
                        <span class="history-dot completed"></span>
                        <div>
                            <p>Solicitud creada</p>
                            <p>{{ $solicitud->created_at->format('d M Y g:i a') }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="right-side">
            <div class="grouped-card-section">
                <div>
                    <h2 class="card-title">Información del Cliente</h2>
                    <div class="customer-info">
                        <img src="{{ asset('storage/' . ($solicitud->usuario->registro->avatar ?? 'default-avatar.png')) }}"
                             alt="Cliente" class="customer-avatar" />
                        <div class="info-content-client">
                            <p class="info-client">{{ $solicitud->usuario->registro->nombre . ' ' . $solicitud->usuario->registro->apellido }}</p>
                            <p class="info-client email">{{ $solicitud->usuario->registro->email }}</p>
                            <p class="info-client cel"><span>Teléfono:</span> {{ $solicitud->usuario->registro->telefono ?? 'No registrado' }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="card-title">Información del Trabajador</h2>
                    @if ($solicitud->trabajador)
                        <div class="customer-info">
                        <img src="{{ asset('storage/' . ($solicitud->trabajador->avatar ?? asset('image/avatar-default.png'))) }}"
                        
                             alt="Cliente" class="customer-avatar" />
                        <div class="info-content-client">
                            <p class="info-client">{{ $solicitud->trabajador->nombre . ' ' . $solicitud->trabajador->apellido }}</p>
                            <p class="info-client email">{{ $solicitud->trabajador->email }}</p>
                            <p class="info-client cel"><span>Teléfono:</span> {{ $solicitud->trabajador->telefono ?? 'No registrado' }}</p>
                        </div>
                    </div>
                    @else
                        <p>Este servicio aún no tiene trabajador asignado.</p>
                    @endif
                </div>

                <div>
                    <h2 class="card-title">Detalles adicionales</h2>
                    <div class="detail-row">
    <span>hora del servicio</span>
    <span>{{ $solicitud->created_at ? $solicitud->created_at->format('g:i a') : 'No disponible' }}</span>

  </div>
                    <div class="detail-row"><span>Fecha estimada</span><span>{{ $solicitud->created_at ? $solicitud->created_at->format('d M Y') : 'No disponible' }}</span></div>
                </div>
                <a href="{{ route('chat.view', ['trabajadorId' => $solicitud->usuario->registro->id, 'clienteId' => $user->registro->id]) }}">
                  chaaa
</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/map-work.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/service.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    @if($solicitud->latitud && $solicitud->longitud)
      const lat = {{ $solicitud->latitud }};
      const lng = {{ $solicitud->longitud }};
      const map = L.map('map', {
        zoomControl: true,
        scrollWheelZoom: false,
        attributionControl: false,
      }).setView([lat, lng], 15);

      L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.carto.com/">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
      }).addTo(map);

      const customIcon = L.icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
        iconSize: [36, 36],
        iconAnchor: [18, 36],
        popupAnchor: [0, -36]
      });

      const marker = L.marker([lat, lng], { icon: customIcon }).addTo(map);

      fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
        .then(response => response.json())
        .then(data => {
          const addr = data.address || {};

          const road = addr.road || '';
          const suburb = addr.suburb || '';
          const hamlet = addr.hamlet || '';
          const city = addr.city || addr.town || addr.village || '';
          const state = addr.state || '';
          const country = addr.country || '';

          let simpleAddress = '';

          if(road) simpleAddress += road;
          if(suburb) simpleAddress += simpleAddress ? ', ' + suburb : suburb;
          if(hamlet) simpleAddress += simpleAddress ? ', ' + hamlet : hamlet;
          if(city) simpleAddress += simpleAddress ? ', ' + city : city;
          if(state) simpleAddress += simpleAddress ? ', ' + state : state;
          if(country) simpleAddress += simpleAddress ? ', ' + country : country;

          if(!simpleAddress) simpleAddress = 'Dirección no disponible';

          marker.bindPopup(`<strong>Ubicación del servicio</strong><br>${simpleAddress}`).openPopup();
        })
        .catch(error => {
          console.error('Error al obtener la dirección:', error);
          marker.bindPopup('<strong>Ubicación del servicio</strong><br>Dirección no disponible').openPopup();
        });

    @endif
  });
</script>



@endsection
