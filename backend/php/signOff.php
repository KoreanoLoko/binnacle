<?php
require_once "../class/sessionManager.php";

/**
 * Cierra la sesión del usuario y redirige a la página de inicio.
 *
 * @param SessionManager $manejadorSesion Una instancia de la clase ManejadorSesion.
 */
function signOff(SessionManager $sessionManager) {
    // Cierra la sesión
        $sessionManager -> close();

    // Establece una cookie para indicar que la sesión se ha cerrado
    $content =  'Se a cerrado la sesion';
    $content = base64_encode($content);
    setcookie('sesionCerrada', $content, time() + 1, '/');

    // Redirige al usuario a la página de inicio
    header('Location: ../../index.php');

    // Termina la ejecución del script
    exit();
}

// Crea una nueva instancia de ManejadorSesion
$sessionManager = new SessionManager();

// Llama a la función cerrarSesion con la instancia de ManejadorSesion
signOff($sessionManager);
?>