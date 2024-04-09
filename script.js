document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById('login-form');
    const clienteForm = document.getElementById('cliente-form');

    // Manejar el envío del formulario de inicio de sesión
    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto

        // Obtener datos del formulario
        const formData = new FormData(loginForm);

        // Enviar datos al servidor utilizando AJAX
        fetch('login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === 'success') {
                // Mostrar formulario de registro de cliente
                clienteForm.style.display = 'block';
            } else {
                alert('Nombre de usuario o contraseña incorrectos');
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Manejar el envío del formulario de registro de cliente
    clienteForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto

        // Obtener datos del formulario
        const formData = new FormData(clienteForm);

        // Enviar datos al servidor utilizando AJAX
        fetch('guardar_cliente.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Mostrar mensaje de éxito o error
            // Limpiar el formulario después de guardar el cliente
            clienteForm.reset();
        })
        .catch(error => console.error('Error:', error));
    });
});
