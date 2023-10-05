<?php
/**
 * Clase SessionManager
 * Una clase responsable de gestionar sesiones de usuario en una aplicación web.
 */
class SessionManager {
    public $id;
    protected $sessionName;
    /**
     * Constructor de la clase ManejadorSesion.
     * Verifica si hay una sesión activa y la inicia si no la hay.
     * Inicializa el array $_SESSION['sesiones'] si no existe.
     */
    public function __construct() {
        // Iniciar sesión si no está activa
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Inicializar las variables de sesión para cada rol si no existen
        if (!isset($_SESSION['roles'])) {
            $_SESSION['roles'] = array();
        }
        
        if (!isset($_SESSION['roles']['technical'])) {
            $_SESSION['roles']['technical'] = array();
        }
        
    }

    /**
     * Generar el nombre de la sesión basado en el id y el rol del usuario.
     *
     * @param int $idUsuario El ID del usuario.
     * @param int $roles_id El ID del rol del usuario.
     * @return string El nombre de la sesión generado.
     */
    public function generateSessionName($idUser, $roles_id) {
        $prefix = '';
        
        switch ($roles_id) {
            case 1:
                $prefix = 'technical_';
                break;
        }

        return $prefix . $idUser;
    }

    /**
     * Registrar una nueva sesión para el usuario.
     *
     * @param int $idUser El ID del usuario.
     * @param int $roles_id El ID del rol del usuario.
     * @param array $datosUsuario Los datos del usuario.
     */
    public function registerSession($idUser, $roles_id, $userData) {
        $this->sessionName = $this->generateSessionName($idUser, $roles_id);
        $this->id = $idUser;

        // Almacenar el nombre de la sesión en una variable de sesión
        //$_SESSION['nombreSesion'] = $this->nombreSesion;
        
        switch ($roles_id) {
            case 1:
                $_SESSION['roles']['technical'][$this->sessionName] = $userData;
                break;
        }
    }


    /**
     * Obtener el valor de una clave específica de la sesión.
     *
     * @param string $sessionName El nombre de la sesión.
     * @param string $clue La clave cuyo valor se desea obtener.
     * @return mixed El valor de la clave si existe, de lo contrario, null.
     */
    public function getValue($sessionName, $clue) {
        if (empty($sessionName)) {
            return null;
        }

        $prefix = substr($sessionName, 0, strpos($sessionName, '_'));

        switch ($prefix) {
            case 'technical':
                $sessionArray = $_SESSION['roles']['technical'];
                break;
            default:
                return null;
        }

        if (isset($sessionArray[$sessionName][$clue])) {
            return $sessionArray[$sessionName][$clue];
        } else {
            return null;
        }
    }

    /**
     * Cuenta el número de arrays internos en un array dado.
     *
     * @param array $array El array en el que contar los arrays internos.
     * @return int El número de arrays internos encontrados.
     */
    public function countInternalArrays($array) {
        $numberArrays = 0;
        foreach ($array as $element) {
            if (is_array($element)) {
                $numberArrays++;
            }
        }
        return $numberArrays;
    }

    /**
     * Cerrar la sesión del usuario.
     *
     * @param string $sessionName El nombre de la sesión.
     */
    public function signOff($sessionName) {
        $prefix = substr($sessionName, 0, strpos($sessionName, '_'));

        switch ($prefix) {
            case 'technical':
                if (isset($_SESSION['technical'][$sessionName])) {
                    unset($_SESSION['technical'][$sessionName]);
                }
                break;
            default:
                return;
        }
    }

    public function close() {
        session_unset();
        session_destroy();
        
    }
}
?>