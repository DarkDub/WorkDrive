@extends('layouts.app')

@section('title', 'Detalle de Solicitud #' . $solicitud->id)

@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('css/porve.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="header">
    <a href="{{ route('solicitudes.estado') }}" class="btn-back" aria-label="Back">
      <i class="fas fa-chevron-left"></i>
    </a>
    <h1 class="order-title">
      Solicitud <span class="order-number">#{{ $solicitud->id }}</span>
      <span class="status">{{ ucfirst($solicitud->estado->nombre) }}</span>
    </h1>
  </div>

  <p class="order-date">{{ $solicitud->created_at->format('d M Y g:i a') }}</p>

  <div class="content">
    <div class="left-side">
      <div class="card">
        <h2 class="card-title">Detalles</h2>
        <div class="product-info">
          {{-- Si tienes imagen del servicio o producto, cámbiala aquí --}}
          <img src="{{ asset('storage/default-product.jpg') }}" alt="Producto" class="product-image"/>
          <div>
            <p>{{ $solicitud->descripcion ?? 'Descripción no disponible' }}</p>
            <p>Código: {{ $solicitud->id }}</p>
            <p>Cantidad: x1</p>
            <p>Precio: ${{ number_format($solicitud->tarifa, 2) }}</p>
          </div>
        </div>
        <div class="summary">
          <div class="summary-row"><span>Subtotal</span><span>${{ number_format($solicitud->tarifa, 2) }}</span></div>
          <div class="summary-row"><span>Shipping</span><span>- $0</span></div>
          <div class="summary-row"><span>Discount</span><span>- $0</span></div>
          <div class="summary-row"><span>Taxes</span><span>$0</span></div>
          <div class="summary-row total"><span>Total</span><span>${{ number_format($solicitud->tarifa, 2) }}</span></div>
        </div>
      </div>

      <div class="card">
        <h2 class="card-title">Historial</h2>
        {{-- Aquí si tienes historial de estados, iteras --}}
        <ul class="history-list">
          <li class="history-item">
            <span class="history-dot completed"></span>
            <div>
              <p>Creado</p>
              <p>{{ $solicitud->created_at->format('d M Y g:i a') }}</p>
            </div>
          </li>
          {{-- Ejemplo de otro estado: solo si tienes data real --}}
          {{-- 
          @foreach($solicitud->historialEstados as $hist)
          <li class="history-item">
            <span class="history-dot {{ $hist->estado == 'completado' ? 'completed' : '' }}"></span>
            <div>
              <p>{{ ucfirst($hist->estado) }}</p>
              <p>{{ $hist->created_at->format('d M Y g:i a') }}</p>
            </div>
          </li>
          @endforeach
          --}}
        </ul>
      </div>
    </div>

    <div class="right-side">
      <div class="grouped-card-section">
        <div>
          <h2 class="card-title">Información del Cliente</h2>
          <div class="customer-info">
            <img src="{{ asset('storage/' . ($solicitud->usuario->registro->avatar ?? 'default-avatar.png')) }}" alt="Cliente" class="customer-avatar"/>
            <div>
              <p>{{ $solicitud->usuario->registro->nombre }}</p>
              <p>{{ $solicitud->usuario->registro->email }}</p>
              {{-- Puedes agregar más info si quieres --}}
              <p>Teléfono: {{ $solicitud->usuario->registro->telefono ?? 'No registrado' }}</p>
            </div>
          </div>
        </div>

        <div>
          <h2 class="card-title">Entrega</h2>
          {{-- Adaptar si tienes esta info --}}
          <div class="detail-row"><span>Metodo</span><span>No disponible</span></div>
          <div class="detail-row"><span>Velocidad</span><span>No disponible</span></div>
          <div class="detail-row"><span>Número de seguimiento</span><span>No disponible</span></div>
        </div>

        <div>
          <h2 class="card-title">Dirección de envío</h2>
          {{-- Aquí si tienes dirección, mostrarla, sino no --}}
          <div class="detail-row"><span>Dirección</span><span>No disponible</span></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
