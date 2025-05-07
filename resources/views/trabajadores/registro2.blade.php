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

    <link rel="stylesheet" href="{{ asset('css/trabajador-style/registro2.css') }}">
    </link>
    <script defer src="{{ asset('js/trabajadores-js/registro.js') }}"></script>
    <script defer src="{{ asset('js/eyes-pass.js') }}"></script>

    <style>
        select:invalid {
            color: #707070;
            /* Color del "placeholder" */
        }

        /* Opcional: cuando el usuario selecciona algo, vuelve al color normal */
        select option {
            color: #707070;
        }
    </style>
</head>

<body>

    <x-header></x-header>
    <div class="content">

        <div class="card">
            <!-- Icono de usuario en lugar del logo -->
            <iconify-icon icon="carbon:user-avatar" class="logo" style="font-size: 50px;"></iconify-icon>
            <h5 class="text-center fw-bold mb-3">Crear cuenta</h5>
            <p class="text-center small mb-4">Tienes cuenta? <a href="#">Iniciar session</a></p>

            <form>

                <div class="mb-3">
                    <select class="form-control" required>
                        <option value="" disabled selected>Seleccione tipo de documento</option>
                        <option value="cc">Cédula de ciudadanía</option>
                        <option value="ce">Cédula de extranjería</option>
                        <option value="ti">Tarjeta de identidad</option>
                        <option value="pasaporte">Pasaporte</option>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Número de documento" required />
                </div>

                {{-- <div class="mb-3">
                    <select class="form-control" required>
                        <option value="" disabled selected>Seleccione una labor</option>
                        <option value="plomero">Plomero</option>
                        <option value="electricista">Electricista</option>
                        <option value="jardinero">Jardinero</option>
                        <option value="pintor">Pintor</option>
                        <option value="otro">Otro</option>
                        <!-- Agrega más labores si lo deseas -->
                    </select>
                </div> --}}

                <div class="mb-3">
                    <select class="form-control form-select" id="labor" required>
                        <option value="" disabled selected>Seleccione una labor</option>
                        <option value="Electricista">Electricista</option>
                        <option value="Plomero">Plomero</option>
                        <option value="Carpintero">Carpintero</option>
                        <option value="Otro">Otro</option>
                    </select>

                    <!-- Este input se mostrará solo si se elige "Otro" -->
                    <input type="text" class="form-control d-none" id="otraLabor"
                        placeholder="Especifique su labor" />
                </div>

                <div class="custom-file-upload">
                    <label for="cvFile" class="file-label">
                        <span id="file-name">Seleccionar hoja de vida</span>
                        <i class="bi bi-upload ms-2"></i>
                    </label>
                    <input type="file" id="cvFile" class="file-input" required>
                </div>





                <div class="d-grid mt-3">
                    <button class="btn btn-dark" type="submit">Create account</button>
                </div>
            </form>


            <p class="text-center small mt-3">
                Al registrarme, acepto <a href="#">los Términos de servicio</a> y la <a href="#">Política de
                    privacidad</a>.
            </p>

        </div>
    </div>


</body>
<script>
    document.getElementById('cvFile').addEventListener('change', function() {
        const fileName = this.files[0]?.name || 'Seleccionar hoja de vida';
        document.getElementById('file-name').textContent = fileName;
    });
</script>

</html>
