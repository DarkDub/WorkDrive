




@extends('layout.guest')

@section('title', 'Registro')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/registro2.css') }}" />
@endsection

@section('content')
    <div class="login-content">
        <div class="login-container">
            <iconify-icon icon="carbon:user-avatar" class="logo" style="font-size: 50px;"></iconify-icon>
            <h5 class="text-center fw-bold mb-3">Crear cuenta</h5>
            <p class="text-center small mb-4">
                ¿Tienes cuenta? <a href="{{ route('login') }}">Iniciar sesión</a>
            </p>

            <form method="POST" action="{{ route('registro') }}">
                @csrf

                <!-- Nombre -->
                <div class="mt-3 mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input id="name" type="text" name="nombre"
                        class="form-control"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Apellido -->
                <div class="mt-3 mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input id="apellido" type="text" name="apellido"
                        class="form-control"
                        required autocomplete="apellido" />
                    <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                </div>

                <!-- Teléfono -->
                <div class="mt-3 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input id="telefono" type="text" name="telefono"
                        class="form-control"
                        required autocomplete="telefono" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-3 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email"
                        class="form-control"
                        required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-3 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" name="password"
                        class="form-control"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-3 mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="form-control"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Selección de rol -->
                <div class="mt-3 mb-3">
                    <label class="form-label fw-bold">¿Qué deseas hacer?</label>
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="role-option w-100" id="option-empleado">
                                <input type="radio" name="userRole" value="empleado"
                                    {{ old('userRole') == 'empleado' ? 'checked' : '' }} />
                                <x-input-error :messages="$errors->get('userRole')" class="mt-2" />
                                <div>
                                    <iconify-icon icon="mdi:hammer-wrench" width="30"></iconify-icon>
                                    <div class="mt-2">Empleado</div>
                                </div>
                            </label>
                        </div>
                        <div class="col-6">
                            <label class="role-option w-100" id="option-cliente">
                                <input type="radio" name="userRole" value="cliente"
                                    {{ old('userRole') == 'cliente' ? 'checked' : '' }} />
                                <x-input-error :messages="$errors->get('userRole')" class="mt-2" />
                                <div>
                                    <iconify-icon icon="mdi:account" width="30"></iconify-icon>
                                    <div class="mt-2">Cliente</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="d-grid mt-3">
                    <button class="btn btn-dark" type="submit">Crear cuenta</button>
                </div>
            </form>

            <p class="text-center small mt-4">
                Al registrarme, acepto <a href="#">los Términos de servicio</a> y la
                <a href="#">Política de privacidad</a>.
            </p>
        </div>
    </div>
@endsection

@section('js')
    <script defer src="{{ asset('js/registro.js') }}"></script>
    <script defer src="{{ asset('js/eyes-pass.js') }}"></script>
@endsection
