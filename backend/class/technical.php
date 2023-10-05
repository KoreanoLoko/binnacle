<?php
$rutaDB = __DIR__ . "/../database/conexion.php";

if(file_exists($rutaDB)) {
    $rutaDB = realpath($rutaDB);
    require_once $rutaDB;
} else {
    die("No existe -> ". $rutaDB);
    // Usamos "die" para detener la ejecución en lugar de simplemente imprimir el mensaje.
}

class Technical extends Database {
    private $id;

    public function __construct($id){
        // Corregido el nombre del constructor.
        parent::__construct();
        $this->id = $id;
    }

    public function viewData(){
        $query = "SELECT names, surnames, position
                  FROM technical
                  WHERE id = :id";

        try {
            $querySee = $this->pdo->prepare($query);
            $querySee->bindParam(':id', $this->id, PDO::PARAM_INT);

            if($querySee->execute()) {
                $result = $querySee->fetch(PDO::FETCH_ASSOC);
                return $result ? $result : "No se encontró el usuario";
                // En lugar de comprobar si la consulta fue exitosa y luego si hay un resultado, 
                // simplemente devolvemos el resultado o el mensaje de error directamente.
            }
            throw new Exception("Error al ejecutar la consulta.");
        } catch (Exception $e) {
            // Manejo básico de excepciones.
            return "Error: " . $e->getMessage();
        }
    }
}

?>