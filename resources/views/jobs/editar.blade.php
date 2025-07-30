<x-principal>
    <div class="container">
        <h2>Editar Trabajador</h2>

        <form action="{{ route('trabajadores.update', $trabajador) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        value="{{ old('nombre', $trabajador->nombre) }}" required>
                    @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nit">NIT:</label>
                    <input type="text" id="nit" name="nit" class="form-control"
                        value="{{ old('nit', $trabajador->nit) }}" required>
                    @error('nit')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                        value="{{ old('telefono', $trabajador->telefono) }}" required>
                    @error('telefono')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control"
                        value="{{ old('direccion', $trabajador->direccion) }}" required>
                    @error('direccion')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" class="form-control"
                        value="{{ old('correo', $trabajador->correo) }}" required>
                    @error('correo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="pais_id">País:</label>
                    <select id="pais_id" name="pais_id" class="form-control" required>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}"
                                {{ old('pais_id', $prove->pais_id) == $pais->id ? 'selected' : '' }}>
                                {{ $pais->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <a href="{{ route('jobs.index') }}" class="btn btn-warning">Regresar</a>

                    <div>
                        <button type="submit" class="btn btn-success me-2">Guardar Cambios</button>
                        <button type="button" class="btn btn-danger me-2"
                            onclick="window.location.href='{{ route('jobs.index') }}'">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-principal>