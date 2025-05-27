// const serviciosNotificados = {};

// function checkServicios() {
//   console.log("Consultando servicios...");

//   fetch('/servicios/mis-solicitudes', {
//     headers: {
//       'Accept': 'application/json',
//     }
//   })
//   .then(res => {
//     console.log("Respuesta del servidor:", res.status);
//     return res.json();
//   })
//   .then(servicios => {
//     console.log("Servicios recibidos:", servicios);

//     servicios.forEach(servicio => {
//       if (servicio.estado === 'pendiente' && !serviciosNotificados[servicio.id]) {
//         console.log(`Servicio ${servicio.id} aceptado por ${servicio.trabajador.nombre}`);  

//         Toastify({
//           text: `Tu servicio #${servicio.id} fue aceptado por ${servicio.trabajador.nombre}`,
//           duration: 5000,
//           close: true,
//           gravity: "top",
//           position: "right",
//           backgroundColor: "#4caf50",
//           stopOnFocus: true,
//         }).showToast();

//         serviciosNotificados[servicio.id] = true;
//       }
//     });
//   })
//   .catch(err => console.error('Error al consultar servicios:', err));
// }

// setInterval(checkServicios, 15000);
// checkServicios();
  // Función que hace la consulta periódica
function verificarAceptacion(servicioId) {
    fetch(`/servicios/check-acceptance/${servicioId}`)
        .then(res => {
            if (!res.ok) throw new Error("Error en la petición");
            return res.json();
        })
        .then(data => {
            console.log(`Respuesta checkAcceptance para servicio ${servicioId}:`, data);

            const claveAlerta = `alertaAceptadaServicio_${servicioId}`;
            const yaMostrado = localStorage.getItem(claveAlerta);

            if (data.status === 'accepted' && !yaMostrado) {
                console.log('Mostrando alerta SweetAlert para aceptación del servicio.');

                Swal.fire({
                    title: 'Servicio aceptado',
                    html: `
                        <p>${data.message}</p>
                        <p><strong>Trabajador:</strong> ${data.trabajador.nombre}</p>
                        <p>¿Quieres aceptar a este trabajador para el servicio?</p>
                    `,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar trabajador',
                    cancelButtonText: 'Rechazar trabajador',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log('Usuario aceptó al trabajador.');
                        actualizarEstado(servicioId, 'completado');
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        console.log('Usuario rechazó al trabajador.');
                        actualizarEstado(servicioId, 'activo');
                    }
                });

                localStorage.setItem(claveAlerta, 'true');
                console.log(`localStorage seteado: ${claveAlerta} = true`);
            }

            if (data.estado === 'activo') {
                console.log(`Estado del servicio ${servicioId} es ACTIVO. Eliminando localStorage.`);
                localStorage.removeItem(claveAlerta);
            }
        })
        .catch(err => {
            console.error("Error al consultar aceptación del servicio:", err);
        });
}

function actualizarEstado(servicioId, nuevoEstadoNombre) {
    fetch(`/servicios/update-status/${servicioId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ estado: nuevoEstadoNombre }) // Usamos el nombre del estado
    })
    .then(res => {
        if (!res.ok) throw new Error("Error al actualizar estado");
        return res.json();
    })
    .then(data => {
        console.log(`Estado actualizado a "${nuevoEstadoNombre}" para servicio ${servicioId}:`, data);
        Swal.fire({
            icon: 'success',
            title: 'Estado actualizado',
            text: data.message,
            timer: 1500,
            showConfirmButton: false,
        });

        if (nuevoEstadoNombre === 'activo') {
            const claveAlerta = `alertaAceptadaServicio_${servicioId}`;
            localStorage.removeItem(claveAlerta);
            console.log(`localStorage eliminado: ${claveAlerta}`);
        }
    })
    .catch(err => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: err.message || 'Ocurrió un error al actualizar el estado',
        });
        console.error(err);
    });
}




// Para que esta función se ejecute debes pasarle el servicioId desde tu Blade:
// Por ejemplo, en Blade:

// <script>
//   checkServiceAcceptance({{ $servicio->id }});
// </script>

