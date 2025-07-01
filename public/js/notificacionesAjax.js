$(document).ready(function() {
    // Configuración global para enviar el token CSRF en todas las peticiones AJAX POST
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Cargar notificaciones al cargar la página
    cargarNotificaciones();

    // Recargar automáticamente cada 10 segundos
    setInterval(cargarNotificaciones, 10000);

    function cargarNotificaciones() {
        $.ajax({
            url: '/notificaciones',
            method: 'GET',
            success: function(data) {
                $('#notificacionesList').empty();

                // Actualizar contador y mostrar u ocultar
                if(data.length === 0) {
                    $('#notificaciones-count').text('').hide();
                    $('#notificacionesList').append(
                        '<li class="list-group-item text-muted">No hay notificaciones nuevas.</li>'
                    );
                } else {
                    $('#notificaciones-count').text(data.length).show();
                    data.forEach(function(n) {
                        const foto = n.user?.registro?.avatar || '/images/default-user.png';
                        const nombre = n.user?.registro?.nombre || 'Usuario desconocido';
                        const mensaje = n.message || 'Sin mensaje';
                        const fecha = new Date(n.created_at);
                        const hora = fecha.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
                        const dia = fecha.toLocaleDateString();

                        $('#notificacionesList').append(`
                            <li class="list-group-item d-flex align-items-center gap-3 py-3">
                                <img src="storage/${foto}" alt="Foto" class="rounded-circle">
                                <div class="flex-fill">
                                    <div class="fw-semibold">${nombre}</div>
                                    <div class="text-muted small">${dia} ${hora}</div>
                                    <div class="text-muted small">${mensaje}</div>
                                </div>
                                <button class="btn btn-sm btn-outline-success" onclick="marcarLeida(${n.id})">Leída</button>
                            </li>
                        `);
                    });
                }
            },
            error: function() {
                $('#notificacionesList').empty().append(
                    '<li class="list-group-item text-danger">Error al cargar las notificaciones.</li>'
                );
                $('#notificaciones-count').text('').hide();
            }
        });
    }

    window.marcarLeida = function(id) {
        $.ajax({
            url: '/notificaciones/marcar-leida',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                if (response.success) {
                    cargarNotificaciones(); // Recargar lista después de marcar como leída
                } else {
                    alert('Error al marcar como leída');
                }
            },
            error: function() {
                alert('Error en la petición para marcar como leída');
            }
        });
    }
});
