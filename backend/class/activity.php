<?php
$rutaDB = __DIR__ . "/../database/conexion.php";
if(file_exists($rutaDB)) {
    $rutaDB = realpath($rutaDB);
    require_once $rutaDB;
} else {
    echo "No existe -> ". $rutaDB;
}

class Activity extends Database {
    public function viewTask($technicalId) {
        $query = "SELECT id, task, client, details, status, start_date_and_time, technical_id 
                  FROM activities
                  WHERE status = 'iniciado'
                  AND technical_id = :technical_id";

        $queryView = $this -> pdo -> prepare($query);

        $queryView -> bindParam(':technical_id', $technicalId, PDO::PARAM_INT);

        $queryView -> execute();

        $result = $queryView -> fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function seeTaskPaused($technicalId) {
        $query = "SELECT id, task, client, details, status, start_date_and_time, end_date_and_time, technical_id 
                  FROM activities
                  WHERE status = 'pausado'
                  AND technical_id = :technical_id";

        $querySee = $this -> pdo -> prepare($query);

        $querySee -> bindParam(':technical_id', $technicalId, PDO::PARAM_INT);

        $querySee -> execute();

        $result = $querySee -> fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function seeFinishedTask($technicalId) {
        $query = "SELECT id, task, client, details, status, start_date_and_time, end_date_and_time, technical_id 
                  FROM activities
                  WHERE status = 'terminado'
                  AND technical_id = :technical_id";

        $querySee = $this -> pdo -> prepare($query);

        $querySee -> bindParam(':technical_id', $technicalId, PDO::PARAM_INT);

        $querySee -> execute();

        $result = $querySee -> fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addTask($task, $client, $details, $status, $technicalId) {
        $query = "INSERT INTO activities 
                  (task, client, details, status, technical_id)
                  VALUES
                  (:task, :client, :details, :status, :technical_id)";
        
        $queryAdd = $this -> pdo -> prepare($query);

        $queryAdd -> bindParam(':task', $task);
        $queryAdd -> bindParam(':client', $client);
        $queryAdd -> bindParam(':details', $details);
        $queryAdd -> bindParam(':status', $status);
        $queryAdd -> bindParam(':technical_id', $technicalId);

        if ($queryAdd -> execute()) {
            return "La tarea fue ingresada correctamente";
        } else {
            return "La terea no fue ingresada correctamente";
        }
    }

    public function taskCompleted($status, $taskId) {
        $query = "UPDATE activities
                  SET status = :status
                  WHERE id = :id";
        
        $queryUpdate = $this -> pdo -> prepare($query);

        $queryUpdate -> bindParam(':status', $status);
        $queryUpdate -> bindParam(':id', $taskId);

        if ($queryUpdate -> execute()) {
            return "La tarea fue completada.";
        } else {
            return "La terea no fue completada correctamente.";
        }
    }

    public function taskPaused($status, $taskId) {
        $query = "UPDATE activities
                  SET status = :status
                  WHERE id = :id";
        
        $queryUpdate = $this -> pdo -> prepare($query);

        $queryUpdate -> bindParam(':status', $status);
        $queryUpdate -> bindParam(':id', $taskId);

        if ($queryUpdate -> execute()) {
            return "La tarea fue pausada.";
        } else {
            return "La terea no fue pausada correctamente.";
        }
    }

    public function taskRestart($status, $taskId) {
        $query = "UPDATE activities
                  SET status = :status
                  WHERE id = :id";
        
        $queryUpdate = $this -> pdo -> prepare($query);

        $queryUpdate -> bindParam(':status', $status);
        $queryUpdate -> bindParam(':id', $taskId);

        if ($queryUpdate -> execute()) {
            return "La tarea fue reanudada.";
        } else {
            return "La terea no fue reanudada correctamente.";
        }
    }

    public function taskMonth($technicalId, $month) {
        $query = "SELECT id, task, client, details, status, start_date_and_time, end_date_and_time, technical_id
                  FROM activities
                  WHERE technical_id = :technical_id
                  AND month(start_date_and_time) = :month
                  AND year(start_date_and_time) = year(CURDATE())
                  AND status = 'terminado'";  // Filtramos por el año actual
    
        $queryMonth = $this->pdo->prepare($query);
    
        $queryMonth->bindParam(':technical_id', $technicalId, PDO::PARAM_INT);
        $queryMonth->bindParam(':month', $month, PDO::PARAM_INT);
    
        $queryMonth->execute();
    
        // Aquí podrías devolver los resultadosu
        return $queryMonth->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>