{{-- @pushOnce('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpushOnce

@pushOnce('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
@endpushOnce

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#{{ $id ?? 'datatable' }}').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                },
                pageLength: 10,
                responsive: true
            });
        });
    </script>
@endpush

<div class="table-responsive">
    <table id="{{ $id ?? 'datatable' }}" class="table table-hover align-middle mb-0 text-center">
        {{ $slot }}
    </table>
</div> --}} 

@props(['id' => 'datatable'])

@pushOnce('styles')
    <!-- Estilos de DataTables con Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpushOnce

@pushOnce('scripts')
    <!-- jQuery y DataTables con Bootstrap 5 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
@endpushOnce

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#{{ $id }}').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                },
                pageLength: 10,
                responsive: true
            });
        });
    </script>
@endpush

<div class="table-responsive shadow-sm bg-white rounded-4 p-3">
    <table id="{{ $id }}" {{ $attributes->merge(['class' => 'table table-hover align-middle text-center']) }}>
        {{ $slot }}
    </table>
</div>

