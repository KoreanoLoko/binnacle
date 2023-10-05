<?php

class InputValidation {

    /**
     * Sanear una cadena de texto
     *
     * @param string $cadena
     * @return string
     */
    public function sanitizeString($string) {
        return trim(strip_tags($string));
    }

    /**
     * Sanear un número
     *
     * @param mixed $numero
     * @return float|int
     */
    public function sanitizeNumber($number) {
        if (is_numeric($number)) {
            if (strpos($number, '.') !== false) {
                return (float) $number;
            } else {
                return (int) $number;
            }
        } else {
            return 0;
        }
    }

    /**
     * Validar la presencia de diferentes tipos de caracteres en una contraseña
     *
     * @param string $password
     * @return bool
     */
    public function validateCharactersPassword($password) {
        $containsCapitalLetter = preg_match('/[A-Z]/', $password);
        $containsLowercase = preg_match('/[a-z]/', $password);
        $containsNumber = preg_match('/\d/', $password);
        $containsSpecialCharacter = preg_match('/[!@#$%*&_\-+\/\\\\?]/', $password);

        if ($containsCapitalLetter && $containsLowercase && $containsNumber && $containsSpecialCharacter) {
            return $password;
        } else {
            return false;
        }
    }

    /**
     * Sanear el valor del campo 'cv'
     *
     * @param mixed $valor
     * @return int|string
     */
    public function sanearCV($valor) {
        if (is_numeric($valor)) {
            return (int) $valor;
        } else if ($valor === 'K' || $valor === 'k') {
            return $valor;
        } else {
            return '';
        }
    }

    public function sanearFecha($fecha) {
        $formato = 'Y-m-d';
        $fechaObj = DateTime::createFromFormat($formato, $fecha);
    
        // DateTime::createFromFormat() retorna false si la fecha no está en el formato correcto
        if ($fechaObj && $fechaObj->format($formato) === $fecha) {
            return $fecha;
        } else {
            return null;
        }
    }
    
    public function sanearCorreoElectronico($correo) {
        // Expresión regular para validar correo electrónico
        $patron = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    
        // Se utiliza preg_match para validar que el correo electrónico cumple con la expresión regular
        if (preg_match($patron, $correo)) {
            return $correo;
        } else {
            return null;
        }
    }
    
    /**
     * Sanear un número de teléfono
     *
     * @param mixed $numeroTelefono
     * @return string|null
     */
    public function sanearNumeroTelefono($numeroTelefono) {
        // eliminar cualquier carácter que no sea un dígito
        $numeroTelefono = preg_replace('/\D/', '', $numeroTelefono);
    
        // verificar que el número de teléfono tenga la longitud correcta
        if (strlen($numeroTelefono) == 9) {
            return $numeroTelefono;
        } else {
            return null;
        }
    }
    
    public function sanearDireccion($direccion) {
        // Expresión regular que permitirá solo letras, números, comas, puntos y espacios
        $patron = "/^[a-zA-Z0-9#,\. ]+$/";
    
        // Se utiliza preg_match para validar que la dirección cumple con la expresión regular
        if (preg_match($patron, $direccion)) {
            return trim($direccion);
        } else {
            return null;
        }
    }

    /**
     * Validar y sanear una entrada POST.
     *
     * @param string $clave La clave en la matriz POST para validar y sanear.
     * @param string $tipo El tipo de saneamiento a aplicar.
     *
     * @return mixed El valor saneado o null si no está establecido.
     */
    public function validateSanitizePostEntry($clue, $type = 'string') {
        if (!isset($_POST[$clue])) {
            return null;
        }
    
        switch ($type) {
            case 'fecha':
                return $this -> sanearFecha($_POST[$clue]);
            case 'number':
                return $this -> sanitizeNumber($_POST[$clue]);
            case 'correo':
                return $this -> sanearCorreoElectronico($_POST[$clue]);
            case 'telefono':
                return $this -> sanearNumeroTelefono($_POST[$clue]);
            case 'direccion':
                return $this -> sanearDireccion($_POST[$clue]);
            case 'string':
            default:
                return $this -> sanitizeString($_POST[$clue]);
        }
    }

    public function isNotEmpty($input) {
        return isset($input) && trim($input) !== '';
    }
    
    // Puedes agregar más métodos de validación y saneamiento según tus necesidades
}

?>