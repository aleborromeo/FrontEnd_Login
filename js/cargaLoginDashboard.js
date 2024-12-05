const LOGIN_URL = 'http://login_mc.test/controllers/controladorLogin.php';  

document.getElementById('login-submit').addEventListener('click', async () => {
    const username = document.getElementById('txtusername').value.trim();
    const password = document.getElementById('txtpassword').value.trim();

    try {
        const response = await fetch(LOGIN_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: new URLSearchParams({
                txtusername: username,
                txtpassword: password,
            }),
        });

        const result = await response.json();

        if (result.success && result.redirect) {
            window.location.href = result.redirect;
        } else if (!result.success && result.redirect) {
            window.location.href = result.redirect;
        } else {
            const output = document.getElementById('output');
            output.textContent = result.message || 'Error al iniciar sesión';
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        const output = document.getElementById('output');
        output.textContent = 'Ocurrió un error al procesar el inicio de sesión.';
    }
});
