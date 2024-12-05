document.addEventListener('DOMContentLoaded', () => {
    const alerta = document.getElementById('mensaje-alerta');

    if (alerta && alerta.textContent.trim() !== '') {
        alerta.classList.add('mostrar'); 
        
        setTimeout(() => {
            alerta.classList.remove('mostrar'); 
            alerta.classList.add('ocultar'); 

            setTimeout(() => {
                alerta.style.display = 'none';
            }, 500); 
        }, 2000); 
    }
});
