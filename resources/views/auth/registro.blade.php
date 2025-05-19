<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Register </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <!-- Fuente Public Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/trabajador-style/registro.css') }}">
    <script defer src="{{ asset('js/trabajadores-js/registro.js') }}"></script>
    <script defer src="{{ asset('js/eyes-pass.js') }}"></script>
</head>

<body>

    <x-header></x-header>

    <div class="content">

        <div class="card">
            <!-- Icono de usuario en lugar del logo -->
            <iconify-icon icon="carbon:user-avatar" class="logo" style="font-size: 50px;"></iconify-icon>
            <h5 class="text-center fw-bold mb-3">Crear cuenta</h5>
            <p class="text-center small mb-4">Tienes cuenta? <a href="{{ route('login') }}">Iniciar sesión</a></p>

            <form method="POST" action="{{ route('registro') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="First name" name="nombre" id="nombre" value="{{ old('nombre') }}" required
                            autofocus />
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                            placeholder="Last name" name="apellido" id="apellido" value="{{ old('apellido') }}"
                            required />
                        @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email address" name="email" id="email" value="{{ old('email') }}"
                        required />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                        placeholder="Phone number" name="telefono" id="phone" value="{{ old('telefono') }}"
                        required />
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- password -->
                <div class="mb-3">
                    <div class="password-container position-relative">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Password" required autocomplete="new-password"
                            value="{{ old('password') }}" />
                        <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-2"
                            id="togglePassword" style="cursor: pointer;"></i>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- confirm password -->
                <div class="mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña"
                        required autocomplete="new-password" />
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">¿Qué deseas hacer?</label>
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="role-option w-100" id="option-worker">
                                <input type="radio" name="userRole" value="trabajador" />
                                <div>
                                    <iconify-icon icon="mdi:hammer-wrench" width="30"></iconify-icon>
                                    <div class="mt-2">Trabajador</div>
                                </div>
                            </label>
                        </div>
                        <div class="col-6">
                            <label class="role-option w-100" id="option-client">
                                <input type="radio" name="userRole" value="cliente" />
                                <div>
                                    <iconify-icon icon="mdi:account" width="30"></iconify-icon>
                                    <div class="mt-2">Cliente</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    @error('userRole')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid mt-3">
                    <button class="btn btn-dark" type="submit">Create account</button>
                </div>
            </form>

            <p class="text-center small mt-3">
                Al registrarme, acepto <a href="#">los Términos de servicio</a> y la <a href="#">Política
                    de privacidad</a>.
            </p>

        </div>
    </div>

</body>

</html>
