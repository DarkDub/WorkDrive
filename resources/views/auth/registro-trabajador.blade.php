<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registro Trabajador</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Fuente Public Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600&display=swap" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/registro2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/trabajador-style/registro.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/tarjeta.css') }}">
    <!-- Scripts personalizados -->
    <script defer src="{{ asset('js/trabajadores-js/registro.js') }}"></script>
    <script defer src="{{ asset('js/eyes-pass.js') }}"></script>

    <style>
        select:invalid {
            color: #707070;
        }

        select option {
            color: #707070;
        }
    </style>
</head>

<body>

    <x-header></x-header>

    <div class="content">
        <div class="card p-4 mx-auto" style="max-width: 400px;">
            <iconify-icon icon="carbon:user-avatar" class="logo d-block mx-auto"
                style="font-size: 50px;"></iconify-icon>
            <h5 class="text-center fw-bold mb-3">Crear cuenta - Trabajador</h5>
            <p class="text-center small mb-4">esta a un paso de ser trabajador!! </p>

            <!-- Mostrar errores -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('trabajador.registrar', ['registro_id' => $registro_id]) }}" method="POST"
                enctype="multipart/form-data" novalidate>
                @csrf

                <div class="mb-3">
                    <input name="nombre" type="text" class="form-control" placeholder="Nombre completo"
                        value="{{ old('nombre') }}" required />
                </div>

                <div class="mb-3">
                    <select name="tipo_documento" class="form-control" required>
                        <option value="" disabled {{ old('tipo_documento') ? '' : 'selected' }}>Seleccione tipo de
                            documento</option>
                        @foreach ($tipo_documentos as $tipoD)
                            <option value="{{ $tipoD->id }}"
                                {{ old('tipo_documento') == $tipoD->id ? 'selected' : '' }}>{{ $tipoD->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <input name="numero_documento" type="text" class="form-control" placeholder="Número de documento"
                        value="{{ old('numero_documento') }}" required />
                </div>

                <div class="mb-3">
                    <select name="profesion_id" class="form-control form-select" id="labor" required>
                        <option value="" disabled {{ old('profesion_id') ? '' : 'selected' }}>Seleccione una
                            labor</option>
                        @foreach ($profesiones as $profesion)
                            <option value="{{ $profesion->id }}"
                                {{ old('profesion_id') == $profesion->id ? 'selected' : '' }}>{{ $profesion->nombre }}
                            </option>
                        @endforeach
                        {{-- <option value="otro" {{ old('profesion_id') == 'otro' ? 'selected' : '' }}>Otro</option> --}}
                    </select>
                </div>

                <div class="mb-3">
                    <input name="otra_labor" type="text"
                        class="form-control {{ old('profesion_id') == 'otro' ? '' : 'd-none' }}" id="otraLabor"
                        placeholder="Especifique su labor" value="{{ old('otra_labor') }}" />
                </div>

                <div class="custom-file-upload mb-3">
                    <label for="cvFile" class="file-label d-flex align-items-center">
                        <span id="file-name" class="flex-grow-1">Seleccionar hoja de vida</span>
                        <i class="bi bi-upload ms-2"></i>
                    </label>
                    <input name="hoja_vida" type="file" id="cvFile" class="file-input form-control" required>
                </div>
                <div class="custom-file-upload mb-3">
                    <label for="cvFile" class="file-label d-flex align-items-center">
                        <span id="file-name" class="flex-grow-1">Subir foto de documento "imagen clara"!</span>
                        <i class="bi bi-upload ms-2"></i>
                    </label>
                    <input name="foto_documento" type="file" id="cvFile" class="file-input form-control" required>
                </div>

                <input type="hidden" name="registro_id" value="{{ $registro_id }}">
                <div class="d-grid mt-3">
                    <button class="btn btn-dark" type="submit">Crear cuenta</button>
                </div>
            </form>

            <p class="text-center small mt-3">
                Al registrarme, acepto <a href="#">los Términos de servicio</a> y la <a href="#">Política de
                    privacidad</a>.
            </p>
        </div>
    </div>

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
    <script>
        document.getElementById('cvFile').addEventListener('change', function() {
            const fileName = this.files[0]?.name || 'Seleccionar hoja de vida';
            document.getElementById('file-name').textContent = fileName;
        });

        document.getElementById('labor').addEventListener('change', function() {
            const otraLabor = document.getElementById('otraLabor');
            if (this.value === 'otro') {
                otraLabor.classList.remove('d-none');
                otraLabor.setAttribute('name', 'otra_labor');
                otraLabor.required = true;
            } else {
                otraLabor.classList.add('d-none');
                otraLabor.removeAttribute('name');
                otraLabor.required = false;
                otraLabor.value = '';
            }
        });
    </script>

</body>

</html>
