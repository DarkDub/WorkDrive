@extends('layouts.app')

@section('title', 'Editar Perfil')


@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client-style/editProfile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menuActive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <style>
        .content {
            width: 100%;
        }
    </style>
@endsection

@section('content')
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
    <form class="form" method="POST" action="{{ route('profile.update', $user->registro) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <section class="left-panel">
            <div class="avatar-wrapper">
                <img class="profile-pic" id="previewImage" src="{{ asset('storage/' . $user->registro->avatar) }}"
                    alt="Foto de perfil actual "">
                <div class="upload-overlay">
                    <i class="fa fa-camera"></i>
                    <span>Subir foto</span>
                </div>
                <input class="file-upload" type="file" name="avatar" accept="image/*" id="avatarInput">
            </div>

            <p class="note">
                Archivos permitidos: *.jpeg, *.jpg, *.png, *.gif<br>
                Tamaño máximo: 3 MB
            </p>

            <div class="toggle-section">
                <label class="label">Cuenta deshabilitada</label>
                <p class="description">Aplica una desactivación de cuenta</p>
                <label class="switch">
                    <input type="checkbox" name="banned" checked>
                    <span class="slider"></span>
                </label>
            </div>

            <div class="toggle-section">
                <label class="label">Email verificado</label>
                <p class="description">
                    Al deshabilitar esto, se enviará automáticamente al usuario un correo electrónico de verificación.

                </p>
                <label class="switch">
                    <input type="checkbox" name="email_verified" checked>
                    <span class="slider"></span>
                </label>
            </div>
            <div class="btn-danger">
                <a href="" class="delete-button" type="">Eliminar usuario</a>
            </div>
        </section>
        <!-- Imagen de perfil dentro del formulario -->
        <section class="right-panel">
            <div class="form-group">
                <label for="fullName">Nombres</label>
                <input type="text" id="fullName" name="nombres" value="{{ old('Nombres', $user->registro->nombre) }}">
                <x-input-error :messages="$errors->get('nombres')" />
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos"
                    value="{{ old('Apellidos', $user->registro->apellido) }}">
                <x-input-error :messages="$errors->get('Apellidos')" />

            </div>

            <div class="form-group">
                <label for="emailAddress">Correo electrónico</label>
                <input type="email" id="emailAddress" name="email" value="{{ old('email', $user->email) }}"
                    class="@error('email') is-invalid @enderror" disabled>
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div class="form-group">
                <label for="phoneNumber">Teléfono</label>
                <input type="tel" id="phoneNumber" name="telefono"
                    value="{{ old('telefono', $user->registro->telefono) }}">
                <x-input-error :messages="$errors->get('telefono')" />
            </div>

            <div class="form-group">
                <label for="country">País</label>
                <select id="country" name="pais_id">
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->id }}" {{ $user->registro->pais_id == $pais->id ? 'selected' : '' }}>
                            {{ $pais->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="departament">Departamento</label>
                <select id="departament" name="departamento_id">
                    @foreach ($departamentos as $dpt)
                        <option value="{{ $dpt->id }}"
                            {{ $user->registro->departamento_id == $dpt->id ? 'selected' : '' }}>
                            {{ $dpt->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="municipio">Municipios</label>
                <select id="municipio" name="municipio_id">
                    @foreach ($municipios as $muni)
                        <option value="{{ $muni->id }}"
                            {{ $user->registro->municipio_id == $muni->id ? 'selected' : '' }}>
                            {{ $muni->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="zipCode">Código postal</label>
                <input type="text" id="zipCode" name="codigo_postal"
                    value="{{ old('codigo_postal', $user->registro->codigo_postal ?? '') }}">
                <x-input-error :messages="$errors->get('codigo_postal')" />
            </div>

            <div class="form-group">
                <label for="role">Rol</label>
                <input type="text" id="role" name="rol" value="{{ old('rol', $user->rol->nombre ?? '') }}"
                    disabled>
            </div>

            <div class="form-actions">
                <button type="submit">Guardar cambios</button>
            </div>
        </section>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('js/client-js/editProfile.js') }}"></script>
    <script src="{{ asset('js/principal-page/menuActive.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @if (session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: -1,
                gravity: "top",
                position: "right",
                backgroundColor: "#ffffff",
                close: true,
                avatar: "https://cdn-icons-png.flaticon.com/512/845/845646.png"
            }).showToast();
        </script>
    @endif
@endsection