@props(['id', 'route', 'name', 'mensaje', 'tipo'])

<!-- Modal de Confirmación de Eliminación (Minimalista) -->
<div class="modal fade" id="confirmDeleteModal-{{ $id }}" tabindex="-1"
    aria-labelledby="confirmDeleteModalLabel-{{ $id }}" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel-{{ $id }}">Confirmar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">¿Está seguro de {{ strtolower($mensaje) }} {{ strtolower($tipo) }}</p>
                <p class="fw-bold">{{ $name }} ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ $route }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">{{ $mensaje }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
