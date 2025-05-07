<x-principal>
    <div class="container">
        <h2>Editar Proveedor</h2>

        <form action="{{ route('prove.update', $prove) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        value="{{ old('nombre', $prove->nombre) }}" required>
                    @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nit">NIT:</label>
                    <input type="text" id="nit" name="nit" class="form-control"
                        value="{{ old('nit', $prove->nit) }}" required>
                    @error('nit')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                        value="{{ old('telefono', $prove->telefono) }}" required>
                    @error('telefono')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control"
                        value="{{ old('direccion', $prove->direccion) }}" required>
                    @error('direccion')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" class="form-control"
                        value="{{ old('correo', $prove->correo) }}" required>
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

                <div class="col-md-6 mb-3">
                    <label for="departamento_id">Departamento:</label>
                    <select id="departamento_id" name="departamento_id" class="form-control" required>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}"
                                {{ old('departamento_id', $prove->departamento_id) == $departamento->id ? 'selected' : '' }}>
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
                                {{ old('municipio_id', $prove->municipio_id) == $municipio->id ? 'selected' : '' }}>
                                {{ $municipio->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <a href="{{ route('prove.index') }}" class="btn btn-warning">Regresar</a>

                    <div>
                        <button type="submit" class="btn btn-success me-2">Guardar Cambios</button>
                        <button type="button" class="btn btn-danger me-2"
                            onclick="window.location.href='{{ route('prove.index') }}'">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-principal>
