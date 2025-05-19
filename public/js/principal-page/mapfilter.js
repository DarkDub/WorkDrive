let profesionSeleccionada = null;

document.querySelectorAll('.profesion-item').forEach(item => {
  item.addEventListener('click', () => {
    profesionSeleccionada = item.getAttribute('data-id');
    console.log('Profesión seleccionada:', profesionSeleccionada);
    cargarTrabajadores(); // recarga trabajadores filtrados
  });
});
function cargarTrabajadores() {
  let url = `/ubicaciones?lat=${userLat}&lon=${userLon}`;
  
  if (profesionSeleccionada) {
    url += `&profesion_id=${profesionSeleccionada}`;  // agregar filtro de profesión
  }

  fetch(url)
    .then(response => response.json())
    .then(data => {
      // Aquí tu lógica actual para mostrar marcadores en el mapa
      // ...
    })
    .catch(err => console.error('Error al cargar ubicaciones:', err));
}
