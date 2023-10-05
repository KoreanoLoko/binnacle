<?php require_once "backend/class/showMessage.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte | INFORMATICA</title>
    <meta name="author" content="Wladimir Medina Pineda - Desarrollador Web Chile">
    <meta name="description" content="Accede a la bitácora del técnico de soporte informático y sigue sus tareas diarias. Gestiona tus problemas informáticos de manera eficiente.">
    <meta name="keywords" content="Soporte informático, bitácora, tareas, gestión de problemas, eficiencia">
    <meta property="og:title" content="Soporte Informático - Bitácora de tareas">
    <meta property="og:description" content="La aplicación web te permite seguir la bitácora del técnico de soporte informático y gestionar tus problemas informáticos de manera eficiente. ¡Organiza tu soporte IT de la mejor manera!">
    <meta property="og:type" content="website">
    <meta property="og:url" content="URL_DE_TU_SITIO_WEB">
    <meta property="og:image" content="URL_DE_LA_IMAGEN_PRINCIPAL/image/imagen-destacada.jpg">
    <!-- Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap Icon's -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" href="frontend/css/styles.css">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="frontend/icon/icon-tab.png">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans:ital@1&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
    <main class="container-fluid mt-5 rounded shadow custom-container">
        <div class="row align-items-stretch">
            <!-- desarrollo -->
            <div class="col p-4 rounded panel">
                <div class="text-end">
                    <img src="frontend/icon/icon-tab.png" width="48px" alt="">
                </div>
                <h2 class="text-center py-3">
                    Bienvenido
                </h2>
                <?= $messageAlert -> showErrorMessage() ?>
                <!-- LOGIN -->
                <form id="login-form" class="form-session needs-validation" action="backend/validation.php" method="POST" novalidate>
                    <div class="mb-4">
                        <div class="col align-items-center">
                            <label for="rut" class="form-label">R.U.T</label>
                            <a tabindex="0" class="link-secondary mb-1" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-html="true" data-bs-title="Usuario de prueba" data-bs-content="<span>Usuario: 11111111</span>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                </svg>
                            </a>
                        </div>
                        <input type="text" class="form-control" name="rut" pattern="[0-9]{1,9}" maxlength="8" placeholder="Ingrese su Rut" required>
                        <div class="invalid-feedback">
                            Ingrese su R.U.T para poder continuar.
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="col align-items-center">
                            <label for="password" class="form-label">Contraseña</label>
                            <a tabindex="0" class="link-secondary mb-1" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-html="true" data-bs-title="Contraseña de prueba" data-bs-content="<span>Contraseña: Password</span>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                </svg>
                            </a>                          
                        </div>
                        
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" name="password" pattern="[A-Za-z0-9_\-!@]{1,15}" placeholder="Ingrese su contraseña" required>
                            <button id="toggle-password" class="btn btn-outline-secondary" type="button">
                              <i class="bi bi-eye-slash" id="toggle-password-icon"></i>
                            </button>
                          </div>
                          <div class="invalid-feedback">
                            Por favor ingrese su contraseña.
                          </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="log-in" class="btn btn-outline-primary">Iniciar Sesion</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="frontend/js/main.js"></script>
</body>
</html>
