@extends('layouts.app')

@section('title', 'Work Drive')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/principal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/list-solicitudes.css') }}">
@endsection

@section('content')
    <x-menuWork />

    <main class="container" role="main" aria-label="Order list">
        <h4 class="" style="margin-bottom: 20px ;">Lista</h4>
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <span>Dashboard</span>
            <i class="fas fa-chevron-right" aria-hidden="true"></i>
            <span>Solicitudes</span>
        </nav>

        <!-- Filtros de estado con tabs -->
        <div class="content-list">

        <section aria-label="Order tabs" class="tabs" role="region" aria-live="polite" aria-atomic="true">
            <div class="tabs-header" role="tablist" aria-label="Filtrar solicitudes por estado">
                @php
                    $queryParams = request()->except('estado');
                @endphp
                <a href="{{ route('solicitudes.estado', array_merge($queryParams, ['estado' => 'all'])) }}"
                    role="tab" aria-selected="{{ request('estado', 'all') == 'all' ? 'true' : 'false' }}"
                    aria-controls="tab-all" id="tab-btn-all"
                    class="all btn btn-outline-dark {{ request('estado', 'all') == 'all' ? 'active' : '' }}">
                    All
                    <span class="badge badge-all" aria-label="{{ $total }} total solicitudes">{{ $total }}</span>
                </a>
                <a href="{{ route('solicitudes.estado', array_merge($queryParams, ['estado' => 'pendiente'])) }}"
                    role="tab" aria-selected="{{ request('estado') == 'pendiente' ? 'true' : 'false' }}"
                    aria-controls="tab-pending" id="tab-btn-pending"
                    class="pending btn btn-outline-warning {{ request('estado') == 'pendiente' ? 'active' : '' }}">
                    Pending
                    <span class="badge badge-pending" aria-label="{{ $pendientes }} solicitudes pendientes">{{ $pendientes }}</span>
                </a>
                <a href="{{ route('solicitudes.estado', array_merge($queryParams, ['estado' => 'completado'])) }}"
                    role="tab" aria-selected="{{ request('estado') == 'completado' ? 'true' : 'false' }}"
                    aria-controls="tab-completed" id="tab-btn-completed"
                    class="completed btn btn-outline-success {{ request('estado') == 'completado' ? 'active' : '' }}">
                    Completed
                    <span class="badge badge-completed" aria-label="{{ $completados }} solicitudes completadas">{{ $completados }}</span>
                </a>
            </div>
        </section>

        <!-- Filtros de fecha y búsqueda -->
        <section aria-label="Filter orders" class="filters" role="region" aria-live="polite" aria-atomic="true">
            <form method="GET" action="{{ route('solicitudes.estado') }}" role="search" aria-label="Filtrar solicitudes">
                <div class="d-flex gap-3 flex-wrap align-items-center">
                    <div>
                        <label for="start_date" class="visually-hidden">Fecha inicio</label>
                        <input type="date" aria-label="Filter by start date" id="start_date" name="start_date"
                            class="form-control"  value="{{ request('start_date') }}">
                    </div>
                    <div>
                        <label for="end_date" class="visually-hidden">Fecha fin</label>
                        <input type="date" aria-label="Filter by end date" id="end_date" name="end_date"
                            class="form-control"  value="{{ request('end_date') }}">
                    </div>
                    <div style="flex-grow:1; max-width: 20rem;">
                        <label for="search" class="visually-hidden">Buscar cliente o ID</label>
                        <input type="search" aria-label="Buscar cliente o ID" id="search" name="search" class="form-control"
                            value="{{ request('search') }}" placeholder="Buscar cliente o ID">
                    </div>
                    <div class="section-btn">
                        <button type="submit" class="btn" aria-label="Filtrar solicitudes">Filtrar</button>
                        <a href="{{ route('solicitudes.estado') }}" class="btn btn-outline-secondary" aria-label="Limpiar filtros">Limpiar</a>
                    </div>
                </div>
            </form>
        </section>

        <!-- Resultados info -->
        <section class="results-info" aria-live="polite" aria-atomic="true">
            <p>Mostrando {{ $solicitudes->count() }} resultados para:</p>
            <!-- Aquí podrías poner filtros activos, si quieres -->
        </section>

        <!-- Tabla con clase y roles -->
        <section class="table-container" role="region" aria-label="Order list table">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="text-left">Orden</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Tarifa</th>
                            <th scope="col">Estado</th>
                            <th scope="col" aria-label="Acciones"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($solicitudes as $s)
                            <tr>
                                <td>#{{ $s->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . ($s->usuario?->registro?->avatar ?? 'default-avatar.png')) }}"
                                            alt="Avatar de {{ $s->usuario->registro->nombre }}" class="rounded-circle me-2" width="32" height="32">
                                        <div>
                                            <div>{{ $s->usuario->registro->nombre }}</div>
                                            <small class="text-muted">{{ $s->usuario->registro->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($s->created_at)->format('Y-m-d') }}<br>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($s->created_at)->format('g:i a') }}</small>
                                </td>
                                <td>${{ number_format($s->tarifa, 2) }}</td>
                                <td>
                                    @if ($s->estado->nombre == 'pendiente')
                                        <span class="badge badge-pending" aria-label="Estado pendiente">Pending</span>
                                    @elseif($s->estado->nombre == 'completado')
                                        <span class="badge badge-completed" aria-label="Estado completado">Completed</span>
                                    @else
                                        <span class="badge bg-light text-dark" aria-label="Estado otro">Otro</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('solicitudes.detalle', $s->id) }}" type="button"
                                        class="btn btn-sm btn-primary btn-ver-detalles"
                                        data-solicitud="{{ htmlspecialchars(json_encode($s), ENT_QUOTES, 'UTF-8') }}"
                                        aria-label="Ver detalles de solicitud #{{ $s->id }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No hay solicitudes que mostrar</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        </div>

    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/map-work.js') }}"></script>
    <script src="{{ asset('js/trabajadores-js/service.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endsection
