@extends('layouts.app')

@section('title', 'Work Drive')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuActive.css') }}">

    <style>
        body {
            background-color: #ffffff;
            color: #1f2937;
            /* text-gray-900 */
            font-family: 'Helvetica Neue', sans-serif;
            /* font-sans */
            -webkit-font-smoothing: antialiased;
            /* antialiased */
        }

        &nbsp;
        &nbsp;

        .max-w-7xl {
            max-width: 80rem;
            /* Tailwind's max-w-7xl */
            margin-left: auto;
            margin-right: auto;
        }

        &nbsp;
        &nbsp;

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        &nbsp;
        &nbsp;

        .py-8 {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        &nbsp;
        &nbsp;

        /* Additional styles for buttons, cards, etc. can be added here */
    </style>
@endsection

@section('content')
    {{-- Menú superior --}}
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
                <li><a href="{{ route('cliente.index') }}"><i class="bi bi-house-door icon-lg"></i> Inicio</a></li>
                <li><a href="{{ route('profile.index') }}"><i class="bi bi-person-circle"></i> Perfil</a></li>
                <li><a href="#"><i class="bi bi-briefcase icon-lg"></i> Servicios</a></li>
                <li><a href="#"><i class="bi bi-telephone icon-lg"></i> Contacto</a></li>
                <li><a href="#"><i class="bi bi-info-circle icon-lg"></i> Acerca de</a></li>
            </x-menu-nav>
        </div>

        {{-- Enlaces secundarios --}}
        <div class="nav-left">
            <a href="#">
                <h5>Sobre nosotros</h5>
            </a>
            <a href="#">
                <h5>Contáctanos</h5>
            </a>
        </div>
    </header>

    {{-- Perfil --}}
    {{-- Contenido principal --}}
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>
            List Page
        </title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
        <style>
            /* Custom scrollbar for horizontal scroll on tabs */
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }

            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
    </head>

    <body class="bg-white text-gray-900 font-sans antialiased">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                <h2 class="text-lg font-extrabold leading-6 text-gray-900 mb-3 sm:mb-0">List</h2>
                <button
                    class="inline-flex items-center gap-2 rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2"
                    type="button">
                    <i class="fas fa-plus"></i> New service
                </button>
            </div>
            <nav aria-label="Breadcrumb"
                class="flex flex-wrap text-xs sm:text-sm font-normal text-gray-700 mb-6 space-x-1 sm:space-x-3">
                <ol class="inline-flex items-center space-x-1 sm:space-x-3 pl-0">
                    <li>
                        <a class="hover:underline text-decoration-none text-[#212121]" href="#">Inicio</a>
                        <span class="mx-2 text-gray-400">·</span>
                    </li>
                    <li>
                        <a class="hover:underline text-decoration-none text-[#212121]" href="#">Servicios</a>
                        <span class="mx-2 text-gray-400">·</span>
                    </li>
                    <li aria-current="page" class="text-gray-400">Lista</li>
                </ol>
            </nav>
            <div class="max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl mb-6">
                <label class="sr-only" for="search">Search</label>
                <div class="relative text-gray-400 focus-within:text-gray-600">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search"></i>
                    </div>
                    <input
                        class="block w-full rounded-md border border-gray-200 bg-white py-2 pl-10 pr-3 text-sm placeholder-gray-400 focus:border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-300"
                        id="search" name="search" placeholder="Search..." type="search" />
                </div>
            </div>
            <div class="flex justify-between items-center mb-6">
                <div class="flex space-x-6 text-sm font-semibold">
                    <button aria-current="page"
                        class="flex items-center gap-2 border-b-2 border-gray-900 text-gray-900 py-1 px-2 rounded-t-md">
                        All <span class="bg-gray-900 text-white rounded-full text-xs font-semibold px-2 py-0.5">19</span>
                    </button>
                    <button class="flex items-center gap-2 rounded-md bg-blue-100 text-blue-700 px-2 py-1" type="button">
                        Published <span
                            class="bg-blue-200 text-blue-900 rounded-full text-xs font-semibold px-2 py-0.5">12</span>
                    </button>
                    <button class="flex items-center gap-2 rounded-md bg-gray-100 text-gray-400 px-2 py-1" type="button">
                        Draft <span class="text-gray-400 rounded-full text-xs font-semibold px-2 py-0.5">7</span>
                    </button>
                </div>
                <div class="flex items-center text-xs font-semibold text-gray-900 select-none cursor-pointer">
                    <span>Sort By:</span>
                    <span class="ml-1">Latest</span>
                    <i class="fas fa-chevron-down ml-1"></i>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Card 1 -->
                <article aria-label="Draft post about The Future of Renewable Energy"
                    class="flex rounded-lg border border-gray-100 shadow-sm overflow-hidden">
                    <div class="flex flex-col justify-between p-4 w-full">
                        <div>
                            <span
                                class="inline-block rounded-md bg-gray-200 px-2 py-0.5 text-xs font-semibold text-gray-600 mb-2">Draft</span>
                            <time class="block text-xs text-gray-400 mb-3" datetime="2025-05-27">27 May 2025</time>
                            <a
                                class="text-[#212121] cursor-pointer no-underline hover:underline  text-sm font-semibold leading-tight mb-2">
                                Luis fernando duncan hernandez</a>
                            <p class="text-xs text-gray-600 leading-relaxed">necesito un plomero en via #40 para que
                                modifique la tuveria de agua.</p>
                        </div>
                        <div class="flex items-center space-x-6 text-xs text-gray-400 mt-4">
                            <button aria-label="More options" class="hover:text-gray-600"><i
                                    class="fas fa-ellipsis-h"></i></button>

                        </div>
                    </div>
                    <div class="relative w-36 flex-shrink-0 rounded-r-lg overflow-hidden">
                        <img alt="Orange planet landscape with mountains and a circular glowing ring in the sky"
                            class="w-full h-full object-cover rounded-2xl rounded-r-none" height="144"
                            src="https://storage.googleapis.com/a1aa/image/e921e36c-9540-481b-994f-3a59bc52311a.jpg"
                            width="144" />
                        <img alt="Avatar of a person with sunglasses and short hair"
                            class="absolute top-2 right-2 w-10 h-10 rounded-full border-2 border-white object-cover"
                            height="40"
                            src="https://storage.googleapis.com/a1aa/image/738836ca-597f-4361-987a-65a203b459db.jpg"
                            width="40" />
                    </div>
                </article>
                <!-- Additional cards can be added here -->
            </div>
        </div>
    </body>

    </html>




@endsection
@section('scripts')
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script src="{{ asset('js/principal-page/modal-page.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('js/principal-page/map.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endsection
