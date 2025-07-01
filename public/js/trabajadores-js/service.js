document.addEventListener('DOMContentLoaded', () => {
    //   Manejar click y teclado en solicitudes
    const solicitudes = document.querySelectorAll('.solicitud-card');
    solicitudes.forEach(card => {
        card.addEventListener('click', () => handleMostrarDetalle(card));
        card.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                handleMostrarDetalle(card);
            }
        });
    });

    function handleMostrarDetalle(card) {
        const id = card.dataset.id;
        const nombre = card.querySelector('.solicitud-info h4').textContent;
        const descripcion = card.querySelector('.extra-info p').textContent;
        const imagen = card.querySelector('img.avatar').src;
        const direccion = card.dataset.direccion || 'Sin dirección';
        const fecha = card.dataset.fecha || '';
        const hora = card.dataset.hora || '';
        const telefono = card.dataset.telefono || 'No disponible';
        const trabajadorId = card.dataset.trabajador;
        const estado = card.classList.contains('aceptado') ? 'Pendiente' : 'Disponible';

        mostrarDetalle(
            id,
            nombre,
            descripcion,
            imagen,
            direccion,
            fecha,
            hora,
            telefono,
            trabajadorId
        );
    }

    window.mostrarDetalle = function (id, nombre, descripcion, imagen, direccion, fecha, hora, telefono, trabajadorId) {
        const panel = document.getElementById('detalle');

        const aceptado = trabajadorId && trabajadorId !== 'null' && trabajadorId !== '';

        //   Contenido del detalle
        let html = `
  <div class="detail-panel">
    <div class="user-info">
      <img src="${imagen}" alt="Avatar de ${nombre}" />
      <div class="user-details">
        <div class="name">${nombre}</div>
        <div class="estado ${aceptado ? 'pendiente' : 'Activo'}">
          <span id="estado-span">${aceptado ? 'Pendiente' : 'Activo'}</span>
        </div>
      </div>
    </div>

    <div class="info-block">
      <label>Descripción del servicio:</label>
      <p>${descripcion}</p>
    </div>

    <div class="info-block">
      <label>Dirección:</label>
      <p>${direccion}</p>
    </div>

    <div class="info-block">
      <label>Fecha:</label>
      <p>${fecha}</p>
    </div>

    <div class="info-block">
      <label>Hora:</label>
      <p>${hora}</p>
    </div>

    <div class="info-block">
      <label>Teléfono:</label>
      <p>${telefono}</p>
    </div>
  </div>
`;


        if (!aceptado) {
            html += `
                     <form id="formAceptar" method="POST" aria-label="Aceptar servicio">
                         <input type="hidden" name="_token" value="${document.querySelector('meta[name=csrf-token]').getAttribute('content')}">
                         <button id="btnAceptar" type="submit">Aceptar Servicio</button>
                     </form>
                     <div id="mensajeExito" style="display:none;"></div>
                 `;
        } else {
            html += `<div id="mensajeExito" style="margin-top: 2rem; font-weight: bold; color: #16a34a;">Servicio Aceptado</div>`;
        }

        panel.innerHTML = html;

        if (!aceptado) {
            const form = document.getElementById('formAceptar');
            const mensaje = document.getElementById('mensajeExito');
            const boton = document.getElementById('btnAceptar');

            form.addEventListener('submit', async function (e) {
                e.preventDefault();
                boton.disabled = true;
                mensaje.style.display = 'none';

                try {
                    const response = await fetch(`/servicio/${id}/aceptar`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': this._token.value,
                            'Accept': 'application/json',
                        },
                    });

                    if (response.ok) {
                        document.getElementById('estado-span').innerText = 'Pendiente';

                        mensaje.style.display = 'block';
                        mensaje.style.color = '#16a34a';
                        mensaje.textContent = '¡Servicio aceptado!';

                        boton.style.display = 'none';

                        //   Actualizar clase de tarjeta
                        const tarjeta = document.querySelector(`.solicitud-card[data-id='${id}']`);
                        if (tarjeta) {
                            tarjeta.classList.add('aceptado');
                            tarjeta.setAttribute('data-trabajador', 'accepted');
                            tarjeta.setAttribute('aria-label', `Solicitud ${nombre} (Aceptada)`);
                        }

                        //   Refrescar detalle después de un tiempo sin botón
                        setTimeout(() => {
                            mostrarDetalle(id, nombre, descripcion, imagen, direccion, fecha, hora, telefono, 'accepted');
                        }, 2000);
                    } else {
                        throw new Error('No se pudo aceptar el servicio.');
                    }
                } catch (error) {
                    mensaje.style.display = 'block';
                    mensaje.style.color = '#dc2626';
                    mensaje.textContent = error.message;
                    boton.disabled = false;
                }
            });
        }
    };
});

