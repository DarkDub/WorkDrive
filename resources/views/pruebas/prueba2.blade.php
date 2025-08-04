    $(document).ready(function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    cargarNotificaciones();
    setInterval(cargarNotificaciones, 10000); // Recargar cada 10 segundos

    function cargarNotificaciones() {
    $.ajax({
    url: '/notificaciones',
    method: 'GET',
    success: function (data) {
    const $list = $('#notificacionesList');
    const $counter = $('#notificaciones-count');

    $list.empty();

    if (!data.length) {
    $counter.text('').hide();
    $list.append('<li class="list-group-item text-muted">No hay notificaciones nuevas.</li>');
    return;
    }

    $counter.text(data.length).show();

    data.forEach(function (n) {
    console.log(data);
    const foto = n.user?.registro?.avatar
    ? (n.user.registro.avatar.startsWith('http') ? n.user.registro.avatar : `storage/${n.user.registro.avatar}`)
    : '/images/default-user.png';

    const nombre = n.user?.registro?.nombre || 'Usuario desconocido';
    const mensaje = n.message || 'Sin mensaje';
    const fecha = new Date(n.created_at);
    const hora = fecha.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    const dia = fecha.toLocaleDateString();

    $list.append(`
    <li class="list-group-item d-flex align-items-center gap-3 py-3">
        <img src="${foto}" alt="Foto" class="rounded-circle" style="width:40px;height:40px;object-fit:cover;">
        <div class="flex-fill">
            <div class="fw-semibold">${nombre}</div>
            <div class="text-muted small">${dia} ${hora}</div>
            <div class="text-muted small">${mensaje}</div>
        </div>
        <button class="btn btn-sm btn-outline-success" onclick="marcarLeida(${n.id})">Leída</button>
    </li>
    `);
    });
    },
    error: function () {
    $('#notificacionesList').empty().append(
    '<li class="list-group-item text-danger">Error al cargar las notificaciones.</li>'
    );
    $('#notificaciones-count').text('').hide();
    }
    });
    }

    window.marcarLeida = function (id) {
    $.ajax({
    url: '/notificaciones/marcar-leida',
    method: 'POST',
    data: { id: id },
    success: function (response) {
    if (response.success) {
    cargarNotificaciones();
    } else {
    alert('Error al marcar como leída');
    }
    },
    error: function () {
    alert('Error en la petición para marcar como leída');
    }
    });
    }
    });
