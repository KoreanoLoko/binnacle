<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'database/conexion.php';
class UserAuthenticator extends Database {
    
    public function authenticateUser($rut, $password) {
        $query = "SELECT * 
                  FROM technical
                  WHERE rut = :rut";

        // $pw = password_hash($password, PASSWORD_DEFAULT);
        // $id = 1;
        // $update = "UPDATE technical SET pw = :pw WHERE id = :id";
        // $actualizar = $this -> pdo -> prepare($update);
        // $actualizar -> bindParam('id', $id, PDO::PARAM_INT);
        // $actualizar -> bindParam('pw', $pw);
        // $actualizar -> execute();

        $sentence = $this -> pdo -> prepare($query);
        $sentence -> bindParam(':rut', $rut, PDO::PARAM_INT);
        $sentence -> execute();

        $users = $sentence -> fetchAll(PDO::FETCH_ASSOC);
        
        // Verifica si hay algún usuario con el RUT proporcionado
        if ($users) {
            // Busca un usuario con una contraseña que coincida
            foreach ($users as $user) {
                if (password_verify($password, $user['pw'])) {
                    unset($user['pw']); // Elimina la contraseña del array antes de devolverlo
                    return $user;
                }
            }
        }

        return false;
    }
}
?>