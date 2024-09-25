document.addEventListener('DOMContentLoaded', () => {
    // Registro de usuario
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('action', 'register');
            fetch('url_del_servidor', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Aquí maneja la respuesta del servidor
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    }
});
