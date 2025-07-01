// Obtener el modal
let modal = document.getElementById("paymentModal");

// Obtener el icono para abrir el modal
let btn = document.getElementById("payment-method");

// Obtener el <span> para cerrar el modal
let span = document.getElementsByClassName("close")[0];

// Obtener referencias a elementos
const openModalBtn = document.getElementById("payment-method");
const paymentModal = document.getElementById("paymentModal");
const closeBtn = document.querySelector(".close");
const metodosPago = document.querySelector(".metodos_pagos");
const selectMetodo = document.getElementById("pago_id_hidden");
const methodText = openModalBtn.querySelector('.method-text');
function showModal() {
    paymentModal.style.display = 'block';
    paymentModal.setAttribute('aria-hidden', 'false');
}

function closeModal() {
    paymentModal.style.display = 'none';
    paymentModal.setAttribute('aria-hidden', 'true');
}

// Abrir modal
openModalBtn.addEventListener('click', showModal);

// Cerrar modal
closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', (e) => {
    if (e.target === paymentModal) {
        closeModal();
    }
});

// Seleccionar método de pago
metodosPago.addEventListener('click', function (event) {
    if (event.target.tagName === 'LI') {
        const metodoId = event.target.getAttribute('data-id');
        selectMetodo.value = metodoId;
        const metodoNombre = event.target.innerText;
        methodText.innerText = metodoNombre
        console.log('Método seleccionado:', metodoId);
        closeModal(); // opcional: cerrar automáticamente
    }
});

 document.addEventListener('DOMContentLoaded', function () {
        const lista = document.querySelector('.list-group');
        const inputHidden = document.getElementById('profesion_id');

        lista.querySelectorAll('li').forEach(item => {
            item.addEventListener('click', function () {
                // Asignar el id de la profesión al input hidden
                const laborId = this.getAttribute('data-id')
                inputHidden.value = laborId;

                // Opcional: marcar visualmente la profesión seleccionada
                lista.querySelectorAll('li').forEach(li => li.classList.remove('active'));
                this.classList.add('active');
                console.log(laborId)
            });
        });
    });
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

