<x-principal>
    <div class="content-create-prove">
        <div class="text-title-form">
            <h1>Registrar Cliente</h1>
            <p>Agrega un nuevo Cliente a la base de datos.</p>
        </div>

        <form action="{{ route('clientes.store') }}" method="POST" class="form-create-prove">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">nombre de usuario:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                        required>
                    @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"
                        required>
                    @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nit">NIT:</label>
                    <input type="text" id="nit" name="nit" class="form-control" value="{{ old('nit') }}"
                        required>
                    @error('nit')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                        value="{{ old('telefono') }}" required>
                    @error('telefono')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control"
                        value="{{ old('direccion') }}" required>
                    @error('direccion')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email">Correo:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                        required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="codP">Codigo postal:</label>
                    <input type="text" id="codP" name="codigo_postal" class="form-control" value="{{ old('codigo_postal') }}"
                        required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="pais_id">País:</label>
                    <select id="pais_id" name="pais_id" class="form-control" required>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected' : '' }}>
                                {{ $pais->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="departamento_id">Departamento:</label>
                    <select id="departamento_id" name="departamento_id" class="form-control" required>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}"
                                {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                {{ $departamento->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="municipio_id">Municipio:</label>
                    <select id="municipio_id" name="municipio_id" class="form-control" required>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio->id }}"
                                {{ old('municipio_id') == $municipio->id ? 'selected' : '' }}>
                                {{ $municipio->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <a href="{{ route('prove.index') }}" class="btn btn-warning">Regresar</a>
                    <div>
                        <button type="submit" class="btn btn-success me-2">Guardar</button>
                        <button type="button" class="btn btn-danger me-2"
                            onclick="window.location.href='{{ route('clientes.index') }}'">Cancelar</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <!-- Toast Container -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="customToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastMessage">Mensaje</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Cerrar"></button>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            function showToast(message, type = 'success') {
                const toast = document.getElementById('customToast');
                const toastBody = document.getElementById('toastMessage');

                toast.classList.remove('bg-success', 'bg-danger', 'bg-warning');

                if (type === 'success') toast.classList.add('bg-success');
                if (type === 'error') toast.classList.add('bg-danger');
                if (type === 'warning') toast.classList.add('bg-warning');

                toastBody.textContent = message;

                const bsToast = new bootstrap.Toast(toast, {
                    delay: 5000
                });
                bsToast.show();
            }

            document.addEventListener('DOMContentLoaded', function() {
                @if (session('toast_success'))
                    showToast({!! json_encode(session('toast_success')) !!}, 'success');
                @endif

                @if (session('toast_error'))
                    showToast({!! json_encode(session('toast_error')) !!}, 'error');
                @endif

                @if ($errors->any())
                    showToast("Por favor completa los campos obligatorios", 'warning');
                @endif
            });
        </script>
    @endsection
</x-principal>
