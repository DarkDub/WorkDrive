<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/roles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">

    <title>edit</title>
</head>

<body>

    <x-principal>
        <!-- Modal Agregar Labor -->
        <div class="formEdit">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Agregar Permisos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('permisos.update', $permiso->id) }}" method="POST">
                         @csrf
                        @method('PUT')
                         <div class="mb-3">
                         <label for="nombrePermiso" class="form-label">Nombre del permiso</label>
                         <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $permiso->nombre) }}">
                           @error('nombre')
                         <div class="alert alert-danger">*{{ $message }}</div>
                         @enderror
                        </div>
                        <div class="mb-3">
                            <label for="descripcionPermiso" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion">{{ $permiso['descripcion'] }}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger">*{{ $message }}</div>
                            @enderror
                        </div>

                        </select>
                        <div class="footer d-flex pt-2 w-100 mt-3">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('permisos.index') }}" class="btn btn-danger mx-3">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    </x-principal>

</body>

</html>
