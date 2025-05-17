import './bootstrap';
import Alpine from 'alpinejs';

// Inicializa Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Tu código personalizado
document.addEventListener('DOMContentLoaded', function() {
    console.log('Aplicación cargada correctamente');
    
    // Ejemplo mejorado de interacción
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', function(e) {
            // Evita el alert si se clickea un enlace dentro de la card
            if (e.target.tagName === 'A') return;
            
            // Opcional: Usa un toast en lugar de alert
            Toastify({
                text: "Card clickeada",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
            }).showToast();
        });
    });
});