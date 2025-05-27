<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Perfil de Usuario</title>

    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client-style/editProfile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client-style/login.css') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="container">
        <form class="form" method="POST" action="{{ route('profile.update', $user->registro) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <section class="left-panel">
                <div class="avatar-wrapper">
                    <x-avatar class="profile-pic" id="previewImage" />
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
                    <p class="description">Deshabilitar esto enviará un correo de verificación</p>
                    <label class="switch">
                        <input type="checkbox" name="email_verified" checked>
                        <span class="slider"></span>
                    </label>
                </div>
                <div class="btn-danger">
                    <a class="delete-button" type="">Eliminar usuario</a>

                </div>
            </section>
            <!-- Imagen de perfil dentro del formulario -->
            <section class="right-panel">
                <div class="form-group">
                    <label for="fullName">Nombres</label>
                    <input type="text" id="fullName" name="nombres"
                        value="{{ old('Nombres', $user->registro->nombre) }}">
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" id="apellidos" name="apellidos"
                        value="{{ old('Apellidos', $user->registro->apellido) }}">
                </div>

                <div class="form-group">
                    <label for="emailAddress">Correo electrónico</label>
                    <input type="email" id="emailAddress" name="email" value="{{ old('email', $user->email) }}"
                        class="@error('email') is-invalid @enderror" disabled>
                </div>

                <div class="form-group">
                    <label for="phoneNumber">Teléfono</label>
                    <input type="tel" id="phoneNumber" name="telefono"
                        value="{{ old('telefono', $user->registro->telefono) }}">
                </div>

                <div class="form-group">
                    <label for="country">País</label>
                    <select id="country" name="pais_id">
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}"
                                {{ $user->registro->pais_id == $pais->id ? 'selected' : '' }}>
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
                </div>

                <div class="form-group">
                    <label for="role">Rol</label>
                    <input type="text" id="role" name="rol"
                        value="{{ old('rol', $user->rol->nombre ?? '') }}" disabled>
                </div>

                <div class="form-actions">
                    <button type="submit">Guardar cambios</button>
                </div>
            </section>
        </form>
    </main>
</body>

<script src="{{ asset('js/client-js/editProfile.js') }}"></script>
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

</html>
