<x-principal>
    <div class="container">
        <h2>Editar Cliente</h2>

        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control"
                        value="{{ old('nombre', $cliente->nombre) }}" required>
                    @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nit">Apellido:</label>
                    <input type="text" id="nit" name="nit" class="form-control"
                        value="{{ old('nit', $cliente->apellido) }}" required>
                    @error('nit')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                        value="{{ old('telefono', $cliente->telefono) }}" required>
                    @error('telefono')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="direccion">Codigo Postal:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control"
                        value="{{ old('direccion', $cliente->codigo_postal) }}" required>
                    @error('direccion')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="email" class="form-control"
                        value="{{ old('correo', $cliente->email) }}" required>
                    @error('correo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="pais_id">País:</label>
                    <select id="pais_id" name="pais_id" class="form-control" required>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}"
                                {{ old('pais_id', $cliente->pais_id) == $pais->id ? 'selected' : '' }}>
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
                                {{ old('departamento_id', $cliente->departamento_id) == $departamento->id ? 'selected' : '' }}>
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
                                {{ old('municipio_id', $cliente->municipio_id) == $municipio->id ? 'selected' : '' }}>
                                {{ $municipio->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <a href="{{ route('clientes.index') }}" class="btn btn-warning">Regresar</a>

                    <div>
                        <button type="submit" class="btn btn-success me-2">Guardar Cambios</button>
                        <button type="button" class="btn btn-danger me-2"
                            onclick="window.location.href='{{ route('clientes.index') }}'">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
{{-- 
<div class="container">
    <h1>Editar Cliente</h1>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $cliente->email }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $cliente->telefono }}">
        </div>

        <div class="form-group mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $cliente->direccion }}">
        </div>

        <div class="form-group mb-3">
            <label>NIT</label>
            <input type="text" name="nit" class="form-control" value="{{ $cliente->nit }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Código Postal</label>
            <input type="text" name="codigo_postal" class="form-control" value="{{ $cliente->codigo_postal }}">
        </div>

        <div class="form-group mb-3">
            <label>País</label>
            <select name="pais_id" class="form-control" required>
                @foreach ($paises as $pais)
                    <option value="{{ $pais->id }}" {{ $cliente->pais_id == $pais->id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Departamento</label>
            <select name="departamento_id" class="form-control" required>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" {{ $cliente->departamento_id == $departamento->id ? 'selected' : '' }}>{{ $departamento->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Municipio</label>
            <select name="municipio_id" class="form-control" required>
                @foreach ($municipios as $municipio)
                    <option value="{{ $municipio->id }}" {{ $cliente->municipio_id == $municipio->id ? 'selected' : '' }}>{{ $municipio->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div> --}}

</x-principal>
