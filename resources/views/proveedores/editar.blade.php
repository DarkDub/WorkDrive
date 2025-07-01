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
                    <label for="nit">N Documento:</label>
                    <input type="text" id="nit" name="nit" class="form-control"
                        value="{{ old('nit', $prove->numero_documento) }}" required>
                    @error('nit')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="profesion_id">Profesion:</label>
                    <select id="profesion_id" name="profesion_id" class="form-control" required>
                        @foreach ($Profesiones as $profesion)
                            <option value="{{ $profesion->id }}"
                                {{ old('profesion_id', $prove->profesion_id) == $profesion->id ? 'selected' : '' }}>
                                {{ $profesion->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tipo_documento">Tipo de Documento:</label>
                    <select id="tipo_documento" name="tipo_documento" class="form-control" required>
                        @foreach ($Tipo_documentos as $tipo_documento)
                            <option value="{{ $tipo_documento->id }}"
                                {{ old('departamento_id', $prove->tipo_documento) == $tipo_documento->id ? 'selected' : '' }}>
                                {{ $tipo_documento->nombre }}
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
