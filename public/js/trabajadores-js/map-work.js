document.addEventListener('DOMContentLoaded', function() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      console.log("Ubicación obtenida:", position.coords); // ✅ Verificación

      fetch('/actualizar-ubicacion', {
        method: 'POST',
          credentials: 'same-origin', 
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content

        },
        body: JSON.stringify({
          latitud: position.coords.latitude,
          longitud: position.coords.longitude
        })
      })
      .then(res => res.json())
      .then(data => {
      //   Toastify({
      //                       text: "ubicacion guardada",
      //                       duration: 3000,
      //                       gravity: "top",
      //                       position: "right",
      //                       style: { background: "#fff" },
      //                       close: true,
      //                       avatar: "https://cdn-icons-png.flaticon.com/512/845/845646.png"
      //                   }).showToast();
      })
      .catch(err => {
        alert('Error al enviar ubicación');
        console.error(err);
      });
    }, function(error) {
      alert('No se pudo obtener la ubicación. Por favor permite el acceso a la ubicación.');
    });
  } else {
    alert("Tu navegador no soporta geolocalización");
  }
  console.log('CSRF token:', document.querySelector('meta[name="csrf-token"]').content);

});
