// Obtener el modal
var modal = document.getElementById("paymentModal");

// Obtener el icono para abrir el modal
var btn = document.getElementById("payment-method");

// Obtener el <span> para cerrar el modal
var span = document.getElementsByClassName("close")[0];

// Cuando el usuario haga clic en el ícono, abrir el modal
btn.onclick = function () {
    modal.style.display = "block";
}

// Cuando el usuario haga clic en <span> (x), cerrar el modal
span.onclick = function () {
    modal.style.display = "none";
}

// Cuando el usuario haga clic fuera del modal, también cerrarlo
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

