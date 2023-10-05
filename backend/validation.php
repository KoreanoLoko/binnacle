<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log-in'])) {
    require_once "class/inputValidation.php";
    $classInputValidation = new InputValidation();
    require_once "class/authenticateUser.php";
    $classUserAuthenticator = new UserAuthenticator();
    require_once "class/sessionManager.php";
    $classSessionManager = new SessionManager();

    if (!$classInputValidation -> isNotEmpty($_POST['rut']) || !$classInputValidation -> isNotEmpty($_POST['password'])) {
        // Redirige al usuario de vuelta al formulario de inicio de sesión con un mensaje de error
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    
    
    $rut = $classInputValidation -> validateSanitizePostEntry('rut', 'number');
    $key = $classInputValidation -> validateCharactersPassword($_POST['password']);

    $user = $classUserAuthenticator -> authenticateUser($rut, $key);

    if($user !== false) {
        switch ($user['roles_id']) {
            case 1:
                $classSessionManager -> registerSession($user['id'], $user['roles_id'], $user);
                $_SESSION['userTechnical'] = $user['id'];
                echo "<pre>";
                echo var_export($_SESSION);
                echo "</pre>";
                
                header("Location: ../frontend/content/homeTechnical.php");
                break;
        }
    } else {
        $content = "Usuario o contraseña incorrecta.";
        $content = base64_encode($content);
        setcookie('errorAcceso', $content, time() + 1, "/");
        header("Location: ../index.php");
    }

} else {
    header("Location: ../index.php");
}
?>