let map;
let markers = {};
let userLat, userLon;
const RADIUS_KM = 5;
let profesionSeleccionada = null;
let cargarInterval = null;

// Haversine para calcular distancia entre dos coordenadas
function distanciaKm(lat1, lon1, lat2, lon2) {
  const R = 6371;
  const dLat = (lat2 - lat1) * Math.PI / 180;
  const dLon = (lon2 - lon1) * Math.PI / 180;
  const a = Math.sin(dLat / 2) ** 2 +
            Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
            Math.sin(dLon / 2) ** 2;
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  return R * c;
}

// Icono personalizado para el usuario (color azul)
const iconoUsuario = L.icon({
  iconUrl: 'data:image/svg+xml;utf8,' + encodeURIComponent(`
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" viewBox="0 0 24 24" fill="none" stroke="#1E90FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M12 21C12 21 5 14.5 5 10a7 7 0 0 1 14 0c0 4.5-7 11-7 11z"/>
      <circle cx="12" cy="10" r="3"/>
    </svg>`),
  iconSize: [30, 40],
  iconAnchor: [15, 40],
  popupAnchor: [0, -35]
});

// Icono personalizado para trabajadores (color #212b36)
const iconoTrabajador = L.icon({
  iconUrl: 'data:image/svg+xml;utf8,' + encodeURIComponent(`
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" viewBox="0 0 24 24" fill="none" stroke="#212b36" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M12 21C12 21 5 14.5 5 10a7 7 0 0 1 14 0c0 4.5-7 11-7 11z"/>
      <circle cx="12" cy="10" r="3"/>
    </svg>`),
  iconSize: [30, 40],
  iconAnchor: [15, 40],
  popupAnchor: [0, -35]
});

function inicializarMapa(lat, lon) {
  userLat = lat;
  userLon = lon;

  if (!map) {
    map = L.map('map', {
      center: [lat, lon],
      zoom: 15,
      zoomControl: false,
      attributionControl: false,
    });

    L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.png', {
      maxZoom: 20,
      attribution: '&copy; OpenStreetMap contributors & Stadia Maps',
    }).addTo(map);

    L.control.zoom({ position: 'topright' }).addTo(map);

  } else {
    map.setView([lat, lon], 15);
  }

  // Marcador del usuario con icono personalizado azul
  if (markers['user']) {
    markers['user'].setLatLng([lat, lon]);
  } else {
    markers['user'] = L.marker([lat, lon], { icon: iconoUsuario })
      .addTo(map)
      .bindPopup("¡Estás aquí!")
      .openPopup();
  }

  // Actualizar inputs ocultos con ubicación
  const latInput = document.getElementById('user-lat');
  const lonInput = document.getElementById('user-lon');
  if(latInput) latInput.value = lat;
  if(lonInput) lonInput.value = lon;

  guardarUbicacion(lat, lon);

  if (profesionSeleccionada) {
    cargarTrabajadores();
    if (cargarInterval) clearInterval(cargarInterval);
    cargarInterval = setInterval(cargarTrabajadores, 10000);
  }
}

function guardarUbicacion(lat, lon) {
  fetch('/actualizar-ubicacion', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ latitud: lat, longitud: lon })
  })
  .then(response => response.json())
  .then(data => console.log('Ubicación guardada:', data))
  .catch(error => console.error('Error al guardar ubicación:', error));
}



function cargarTrabajadores() {
  const lista = document.getElementById('lista-trabajadores');
  
  if (!profesionSeleccionada) {
    lista.innerHTML = `<p style="padding: 10px; color: #555;">Selecciona una profesión para ver trabajadores cerca.</p>`;
    ocultarSidebar();
    Object.keys(markers).forEach(id => {
      if (id !== 'user') {
        map.removeLayer(markers[id]);
        delete markers[id];
      }
    });
    return;
  }

  if (!userLat || !userLon) return;

  let url = `/ubicaciones?lat=${userLat}&lon=${userLon}&profesion_id=${profesionSeleccionada}`;

  fetch(url)
    .then(response => response.json())
    .then(data => {
      const idsActuales = data.map(t => t.id);
      lista.innerHTML = ''; // limpiar lista

      if(data.length === 0) {
        lista.innerHTML = `<p style="padding: 10px; color: #555;">No hay trabajadores cerca para esta profesión.</p>`;
        ocultarSidebar();
        Object.keys(markers).forEach(id => {
          if (id !== 'user') {
            map.removeLayer(markers[id]);
            delete markers[id];
          }
        });
        return;
      }

      data.forEach(trabajador => {
        const dist = distanciaKm(userLat, userLon, trabajador.latitud, trabajador.longitud);

        if (dist <= RADIUS_KM) {
          // Popup compacto y profesional
          const popupContent = `
            <div style="
              min-width: 180px; 
              font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
              display: flex; 
              align-items: center; 
              gap: 10px;
              padding: 6px 8px;
              ">
              <img src="${trabajador.imagen_perfil || 'https://via.placeholder.com/40?text=👤'}" 
                   alt="${trabajador.nombre}" 
                   style="
                     width: 40px; 
                     height: 40px; 
                     border-radius: 50%; 
                     object-fit: cover; 
                     border: 1px solid #ccc;
                     flex-shrink: 0;
                   ">
              <div style="flex-grow: 1; min-width: 0;">
                <h4 style="
                  margin: 0 0 2px; 
                  font-size: 1em; 
                  font-weight: 600; 
                  color: #222;
                  white-space: nowrap; 
                  overflow: hidden; 
                  text-overflow: ellipsis;
                  ">
                  ${trabajador.nombre}
                </h4>
                <p style="
                  margin: 0; 
                  font-size: 0.85em; 
                  color: #555;
                  ">
                  📍 ${dist.toFixed(2)} km
                </p>
              </div>
              <button onclick="window.open('/perfil/${trabajador.id}', '_blank')" 
                      style="
                        background: #007bff; 
                        border: none; 
                        border-radius: 4px; 
                        color: white; 
                        padding: 4px 8px; 
                        font-size: 0.8em; 
                        cursor: pointer;
                        flex-shrink: 0;
                      ">
                Ver
              </button>
            </div>
          `;

          // Actualizar o crear marcador
          if (markers[trabajador.id]) {
            markers[trabajador.id].setLatLng([trabajador.latitud, trabajador.longitud]);
            markers[trabajador.id].setPopupContent(popupContent);
          } else {
            markers[trabajador.id] = L.marker([trabajador.latitud, trabajador.longitud], { icon: iconoTrabajador })
              .addTo(map)
              .bindPopup(popupContent);
          }

          // Crear tarjeta (opcional)
          const tarjeta = document.createElement('div');
          tarjeta.className = 'tarjeta-trabajador';
          tarjeta.innerHTML = `
            <img src="${trabajador.imagen_perfil || 'https://via.placeholder.com/48?text=👤'}" alt="${trabajador.nombre}">
            <div class="info">
              <div class="nombre">${trabajador.nombre}</div>
              <div class="distancia">${dist.toFixed(2)} km cerca de ti</div>
            </div>
          `;

          // lista.appendChild(tarjeta);
          requestAnimationFrame(() => {
            tarjeta.classList.add('visible');
          });

        } else {
          if (markers[trabajador.id]) {
            map.removeLayer(markers[trabajador.id]);
            delete markers[trabajador.id];
          }
        }
      });

      // Remover markers no presentes
      Object.keys(markers).forEach(id => {
        if (id !== 'user' && !idsActuales.includes(parseInt(id))) {
          map.removeLayer(markers[id]);
          delete markers[id];
        }
      });
    })
    .catch(err => console.error('Error al cargar ubicaciones:', err));
}


// Listener para seleccionar profesión
document.querySelectorAll('.profesion-item').forEach(item => {
  item.addEventListener('click', () => {
    // Quitar clase activa de todos
    document.querySelectorAll('.profesion-item').forEach(i => i.classList.remove('active'));
    // Agregar clase activa al seleccionado
    item.classList.add('active');

    profesionSeleccionada = item.getAttribute('data-id');
    console.log('Profesión seleccionada:', profesionSeleccionada);

    // Actualizar input oculto del formulario
    const inputProfesion = document.getElementById('profesion_id');
    if(inputProfesion) inputProfesion.value = profesionSeleccionada;

    cargarTrabajadores();

    if (cargarInterval) clearInterval(cargarInterval);
    cargarInterval = setInterval(cargarTrabajadores, 10000);
  });
});

// Geolocalización inicial
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(
    pos => inicializarMapa(pos.coords.latitude, pos.coords.longitude),
    err => {
      alert('No se pudo obtener tu ubicación. Se usará una ubicación por defecto.');
      inicializarMapa(4.6, -74.07);
    }
  );
} else {
  alert("Tu navegador no soporta geolocalización.");
  inicializarMapa(4.6, -74.07);
}
