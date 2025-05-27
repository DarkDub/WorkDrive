    window.addEventListener('load', () => {
        setTimeout(() => {
            const loader = document.getElementById('global-loader');
            if (loader) {
                loader.style.opacity = '0';
                setTimeout(() => loader.style.display = 'none', 300);
            }
        }, 800); // puedes ajustar el tiempo de espera aquí (800 ms a 1500 ms)
    });