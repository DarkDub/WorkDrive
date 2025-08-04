document.addEventListener('DOMContentLoaded', () => {
    const solicitudes = document.querySelectorAll('.solicitud-card');
    const panel = document.getElementById('detalle');
    const modal = new bootstrap.Modal(document.getElementById('modalPropuesta'));

    const form = document.getElementById('formPropuesta');
    const mensaje = document.getElementById('mensajePropuesta');
    const servicioIdInput = document.getElementById('modalServicioId');

    solicitudes.forEach(card => {
        card.addEventListener('click', () => mostrarDetalle(card));
    });

    function mostrarDetalle(card) {
        const id = card.dataset.id;
        const nombre = card.dataset.nombre;
        const descripcion = card.dataset.descripcion;
        const direccion = card.dataset.direccion;
        const fecha = card.dataset.fecha;
        const hora = card.dataset.hora;
        const telefono = card.dataset.telefono;
        const avatar = card.dataset.avatar;

        // Rellenar el panel derecho con la información de la solicitud
        panel.innerHTML = `
            <div class="detail-panel">
                <div class="user-info">
                    <img src="${avatar}" alt="Avatar de ${nombre}" style="width: 80px; height: 80px; border-radius: 50%;">
                    <div class="user-details">
                        <div class="name">${nombre}</div>
                        <div class="estado activo">Activo</div>
                    </div>
                </div>
                <div class="info-block"><label>Descripción:</label><p>${descripcion}</p></div>
                <div class="info-block"><label>Dirección:</label><p>${direccion}</p></div>
                <div class="info-block"><label>Fecha:</label><p>${fecha}</p></div>
                <div class="info-block"><label>Hora:</label><p>${hora}</p></div>
                <div class="info-block"><label>Teléfono:</label><p>${telefono}</p></div>
                <div style="text-align: center; margin-top: 2rem;">
                    <button id="btnMostrarFormulario" class="btn btn-primary">Enviar propuesta</button>
                </div>
            </div>
        `;

        // Agrega evento para abrir modal con el id de la solicitud
        const btnMostrar = document.getElementById('btnMostrarFormulario');
        btnMostrar.addEventListener('click', () => {
            servicioIdInput.value = id;
            mensaje.textContent = '';
            form.reset();
            modal.show();
        });
    }
});
// Lógica de envío del formulario por AJAX
