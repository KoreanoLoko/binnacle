$(document).ready(function() { 

    //Script contador de caracteres
    const textareas = document.querySelectorAll('textarea');
    textareas.forEach((textarea) => {
        const contador = textarea.nextElementSibling;
        contador.classList.add('count');
        
        textarea.addEventListener('input', function() {
            const caracteres = textarea.value.length;
            const maxCaracteres = textarea.getAttribute('maxlength');
            contador.textContent = `${caracteres}/${maxCaracteres} caracteres`;
        });
    });

    $('#registro-tareas').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
        },
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
        "order": [[0, 'desc']],
        "responsive": true  // Añade responsividad para mejorar el diseño en dispositivos móviles
    });

    $('#terminadas').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
        },
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
        "order": [[0, 'desc']],
        "responsive": true  // Añade responsividad para mejorar el diseño en dispositivos móviles
    });

    $('#pausadas').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
        },
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
        "order": [[0, 'desc']],
        "responsive": true  // Añade responsividad para mejorar el diseño en dispositivos móviles
    });

    $('#registro-mes').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
        },
        "pageLength": 5,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
        "order": [[0, 'desc']],
        "responsive": true  // Añade responsividad para mejorar el diseño en dispositivos móviles
    });

    var toastEl = document.querySelector('.toast');
    if (toastEl) {
        var toast = new bootstrap.Toast(toastEl, {
            animation: true,
            autohide: true,
            delay: 3000
        });
        toast.show();

        
    }
});