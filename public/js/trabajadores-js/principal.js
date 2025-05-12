function mostrarDetalles(cliente, descripcion, direccion, tarifa) {
    // Ocultar mensaje inicial
    document.getElementById('estadoInicial').classList.add('d-none');
    document.getElementById('detalleContenido').classList.remove('d-none');
  
    // Mostrar detalles
    document.getElementById('detalleCliente').textContent = cliente;
    document.getElementById('detalleDescripcion').textContent = descripcion;
    document.getElementById('detalleDireccion').textContent = direccion;
    document.getElementById('detalleTarifa').textContent = tarifa;
  }
  
  function cerrarDetalles() {
    document.getElementById('detalleContenido').classList.add('d-none');
    document.getElementById('estadoInicial').classList.remove('d-none');
  }
  