@extends('layouts.app')

@section('title', 'Detalles del Servicio')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuActive.css') }}">
    <style>
        :root {
            --color-primary: #1C252E;
            --color-primary-hover: #2c3844;
            --color-primary-dark: #2563eb;
            --color-success: #22c55e;
            --color-success-dark: #166534;
            --color-warning: #fbbf24;
            --color-warning-dark: #92400e;
            --color-gray-light: #f9fafb;
            --color-gray-medium: #6b7280;
            --color-gray-dark: #374151;
            --font-family-base: 'Helvetica Neue', sans-serif;
        }

        body {
            background-color: #ffffff;
            color: var(--color-gray-dark);
            font-family: var(--font-family-base);
            -webkit-font-smoothing: antialiased;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 80rem;
            margin: 2rem auto;
            padding: 0 1rem;
            display: flex;
            gap: 2rem;
            min-height: 80vh;
            flex-wrap: wrap;
        }

        /* Panel central */
        .service-details {
            flex: 3 1 60%;
            background: var(--color-gray-light);
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.07);
            color: var(--color-gray-dark);
            display: flex;
            flex-direction: column;
        }

        .breadcrumb {
            font-size: 0.875rem;
            color: var(--color-gray-medium);
            margin-bottom: 1.25rem;
        }

        .breadcrumb a {
            color: var(--color-gray-dark);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
            color: var(--color-primary);
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--color-gray-dark);
        }

        .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 1.25rem;
            font-size: 1rem;
            color: var(--color-gray-medium);
            line-height: 1.4;
        }

        .info-row i {
            margin-right: 0.75rem;
            color: var(--color-gray-medium);
            width: 24px;
            text-align: center;
            font-size: 1.2rem;
        }

        .status {
            display: inline-block;
            padding: 0.25rem 0.85rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.875rem;
            margin-left: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .status.pending {
            background-color: var(--color-warning);
            color: var(--color-warning-dark);
        }

        .status.in-progress {
            background-color: var(--color-primary);
            color: var(--color-primary-dark);
        }

        .status.completed {
            background-color: var(--color-success);
            color: var(--color-success-dark);
        }

        p.description {
            color: var(--color-gray-medium);
            font-size: 1rem;
            line-height: 1.6;
            margin-top: -1rem;
            margin-bottom: 0;
            padding-left: 2.5rem;
        }

        /* Panel derecho */
        .user-panel {
            flex: 1 1 30%;
            background: #fff;
            border-radius: 0.5rem;
            padding: 2rem 1.5rem;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.07);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 1rem;
            font-size: 1rem;
            color: var(--color-gray-dark);
            min-width: 280px;
        }

        .user-photo {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 0 0 4px var(--color-gray-light);
            margin-bottom: 0.8rem;
        }

        .user-name {
            font-weight: 700;
            font-size: 1.4rem;
            color: var(--color-gray-dark);
        }

        .user-role {
            font-style: italic;
            color: var(--color-gray-medium);
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .user-contact,
        .user-phone,
        .user-location {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            margin-bottom: 0.5rem;
            color: var(--color-gray-medium);
        }

        .user-contact i,
        .user-phone i,
        .user-location i {
            color: var(--color-gray-light);
            background-color: var(--color-primary);
            padding: 6px 7px;
            border-radius: 6px;
            font-size: 1rem;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-rating {
            margin: 1.25rem 0;
            color: var(--color-warning);
            font-size: 1.2rem;
            font-weight: 600;
        }

        .action-buttons {
            margin-top: auto;
            width: 100%;
            display: flex;
            gap: 1rem;
        }

        .btn {
            flex: 1;
            padding: 0.85rem 1rem;
            border-radius: 0.375rem;
            font-weight: 700;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease, box-shadow 0.2s ease;
            font-size: 1rem;
            box-shadow: 0 2px 8px rgb(0 0 0 / 0.1);
            user-select: none;
        }

        .btn-contact {
            background-color: var(--color-primary);
            color: white;
        }


        .btn-contact:hover {
            background-color: var(--color-primary-hover);
            color: white;
            outline: none;
        }

        .btn-contact:focus {
            background-color: var(--color-primary-hover);
        }

        .btn-edit {
            background-color: var(--color-gray-medium);
            color: white;
        }

        .btn-edit:hover {
            background-color: var(--color-primary);
            outline: none;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .container {
                flex-direction: column;
                max-width: 95%;
            }

            .service-details,
            .user-panel {
                flex: 1 1 100%;
            }

            .user-panel {
                margin-top: 2rem;
                min-width: auto;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">

        {{-- Panel central con datos del servicio --}}
        <section class="service-details" role="region" aria-labelledby="service-title">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('cliente.index') }}">Inicio</a> &raquo;
                <a href="{{ route('servicios.index') }}">Servicios</a> &raquo;
                <span>Detalles del Servicio</span>
            </nav>

            <h1 id="service-title">Servicio de Plomería</h1>

            <div class="info-row">
                <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                Fecha: <strong>27 de Mayo, 2025</strong>
            </div>

            <div class="info-row">
                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                Lugar: <strong>Calle 40 #123, Bogotá</strong>
            </div>

            <div class="info-row">
                <i class="fas fa-dollar-sign" aria-hidden="true"></i>
                Tarifa: <strong>$150.000</strong>
            </div>

            <div class="info-row">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
                Estado:
                <span class="status in-progress text-white" aria-label="Estado del servicio: En progreso">En Progreso</span>
            </div>

            <div class="info-row" style="margin-bottom: 2rem;">
                <i class="fas fa-align-left" aria-hidden="true"></i>
                Descripción:
            </div>
            <p class="description">
                Reparación de tuberías y desagües en baño principal. Incluye cambio de válvulas y limpieza de cañerías.
            </p>
        </section>

        {{-- Panel derecho con datos del usuario --}}
        <aside class="user-panel" role="complementary" aria-label="Información del proveedor del servicio">
            <img src="{{ asset('images/user.jpg') }}" alt="Foto del proveedor" class="user-photo" />

            <div class="user-name">Juan Pérez</div>
            <div class="user-role">Plomero Certificado</div>

            <div class="user-contact">
                <i class="fas fa-envelope" aria-hidden="true"></i>
                <a href="mailto:juan.perez@example.com" style="color: inherit; text-decoration: none;"
                    aria-label="Correo electrónico">juan.perez@example.com</a>
            </div>

            <div class="user-phone">
                <i class="fas fa-phone" aria-hidden="true"></i>
                <a href="tel:+573001112233" style="color: inherit; text-decoration: none;"
                    aria-label="Número de teléfono">+57 300 111 2233</a>
            </div>

            <div class="user-location">
                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                Bogotá, Colombia
            </div>

            <div class="user-rating" aria-label="Calificación del usuario: 4.5 de 5 estrellas">
                <i class="fas fa-star"></i> 4.5
            </div>

            <div class="action-buttons">
                <button type="button" class="btn btn-contact" aria-label="Contactar al proveedor">Contactar</button>
                {{-- <button type="button" class="btn btn-edit" aria-label="Editar información del proveedor">Editar</button> --}}
            </div>
        </aside>

    </div>
@endsection
