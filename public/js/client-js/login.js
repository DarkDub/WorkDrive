const togglePassword = document.getElementById('togglePassword');
const password = document.getElementById('password');

togglePassword.addEventListener('click', function () {
    const isPassword = password.type === 'password';

    // Alternar tipo de input
    password.type = isPassword ? 'text' : 'password';

    // Alternar ícono
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});