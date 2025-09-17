<x-principal>
    <div class="container">
        <h2>Editar Usuario</h2>

        <form action="{{ route('usuariosAdmins.update', $users->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">name:</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name', $users->name) }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email">Correo:</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ old('email', $users->email) }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="rol">Rol</label>
                    <input type="text" id="rol" name="rol" class="form-control"
                        value="{{ old('rol', $users->rol) }}" required>
                    @error('rol')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <a href="{{ route('usuariosAdmins.index') }}" class="btn btn-warning">Regresar</a>

                    <div>
                        <button type="submit" class="btn btn-success me-2">Guardar Cambios</button>
                        <button type="button" class="btn btn-danger me-2"
                            onclick="window.location.href='{{ route('usuariosAdmins.index') }}'">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-principal> 

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
