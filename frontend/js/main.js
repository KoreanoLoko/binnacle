// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })();

  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));

  const passwordInput = document.getElementById('password');
  const togglePasswordButton = document.getElementById('toggle-password');
  const togglePasswordIcon = document.getElementById('toggle-password-icon');

  togglePasswordButton.addEventListener('click', function() {
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      togglePasswordIcon.className = 'bi bi-eye';
    } else {
      passwordInput.type = 'password';
      togglePasswordIcon.className = 'bi bi-eye-slash';
    }
  });