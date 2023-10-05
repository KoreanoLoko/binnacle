<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../../class/activity.php";
    require_once "../../class/inputValidation.php";
    $inputValidation = new InputValidation();
    $action = $inputValidation -> validateSanitizePostEntry('action', 'string');
    
    if ($action == "add") {
        $inputValidation = new InputValidation();
        $task =  $inputValidation -> validateSanitizePostEntry('task', 'string');
        $client =  $inputValidation -> validateSanitizePostEntry('client', 'string');
        $details =  $inputValidation -> validateSanitizePostEntry('details', 'string');
        $status =  $inputValidation -> validateSanitizePostEntry('status', 'string');
        $technicalId =  $inputValidation -> validateSanitizePostEntry('technical-id', 'number');
    }

    if ($action == "completed") {
        $inputValidation = new InputValidation();
        $status = $inputValidation -> validateSanitizePostEntry('status', 'string');
        $taskId = $inputValidation -> validateSanitizePostEntry('task-id', 'number');
    }

    if ($action == "paused") {
        $inputValidation = new InputValidation();
        $status = $inputValidation -> validateSanitizePostEntry('status', 'string');
        $taskId = $inputValidation -> validateSanitizePostEntry('task-id', 'number');
    }

    if ($action == "restart") {
        $inputValidation = new InputValidation();
        $status = $inputValidation -> validateSanitizePostEntry('status', 'string');
        $taskId = $inputValidation -> validateSanitizePostEntry('task-id', 'number');
    }
    
    switch ($action) {
        case 'add':
            $classActivity = new Activity();
            $result = $classActivity -> addTask($task, $client, $details, $status, $technicalId);
            if($result == "La tarea fue ingresada correctamente."){
                $result = base64_encode($result);
                setcookie('exito', $result, time() + 3, '/');
                echo "Ingresado";
                header('Location: ../../../frontend/content/homeTechnical.php?part=1');
            } else {
                echo "No ingresado";
                $result = base64_encode($result);
                setcookie('fallido', $result, time() + 3, '/'); 
                header('Location: ../../../frontend/content/homeTechnical.php?part=1');
            }
            break;
        case 'completed':
            $classActivity = new Activity();
            $result = $classActivity -> taskCompleted($status, $taskId);
            if($result == "La tarea fue completada."){
                $result = base64_encode($result);
                setcookie('exito', $result, time() + 3, '/');
                echo "Ingresado";
                header('Location: ../../../frontend/content/homeTechnical.php?part=1');
            } else {
                echo "No ingresado";
                $result = base64_encode($result);
                setcookie('fallido', $result, time() + 3, '/'); 
                header('Location: ../../../frontend/content/homeTechnical.php?part=1');
            }
            break;
        case 'paused':
            $classActivity = new Activity();
            $result = $classActivity -> taskPaused($status, $taskId);
            if($result == "La tarea fue pausada."){
                $result = base64_encode($result);
                setcookie('exito', $result, time() + 3, '/');
                echo "Ingresado";
                header('Location: ../../../frontend/content/homeTechnical.php?part=1');
            } else {
                echo "No ingresado";
                $result = base64_encode($result);
                setcookie('fallido', $result, time() + 3, '/'); 
                header('Location: ../../../frontend/content/homeTechnical.php?part=1');
            }
            break;
        case 'restart':
            $classActivity = new Activity();
            $result = $classActivity -> taskRestart($status, $taskId);
            if($result == "La tarea fue reanudada."){
                $result = base64_encode($result);
                setcookie('exito', $result, time() + 3, '/');
                echo "Ingresado";
                header('Location: ../../../frontend/content/homeTechnical.php?part=1');
            } else {
                echo "No ingresado";
                $result = base64_encode($result);
                setcookie('fallido', $result, time() + 3, '/'); 
                header('Location: ../../../frontend/content/homeTechnical.php?part=1');
            }
            break;
        default:
            echo "No se logro";
            exit;
            break;
    }
} else {
    echo "no se logro";
    exit;
    header('Location: ../../../index.php');
}
?>