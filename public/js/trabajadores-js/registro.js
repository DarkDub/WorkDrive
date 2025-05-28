const options = document.querySelectorAll('.role-option');
options.forEach(option => {
    option.addEventListener('click', () => {
        options.forEach(opt => opt.classList.remove('selected'));
        option.classList.add('selected');
        option.querySelector('input').checked = true;
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const selectLabor = document.getElementById("labor");
    const otraLaborInput = document.getElementById("otraLabor");

    selectLabor.addEventListener("change", function () {
        if (this.value === "Otro") {
            otraLaborInput.classList.remove("d-none");
        } else {
            otraLaborInput.classList.add("d-none");
        }
    });
});