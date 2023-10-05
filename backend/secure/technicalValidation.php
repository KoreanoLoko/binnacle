<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../../frontend/libs/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function generateExcel($records, $month) {
    $meses = [
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    ];

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    // Definir los encabezados de las columnas (adapta esto a tus necesidades)
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Tarea');
    $sheet->setCellValue('C1', 'Cliente');
    $sheet->setCellValue('D1', 'Detalles');
    $sheet->setCellValue('E1', 'Estado');
    $sheet->setCellValue('F1', 'Fecha de inicio');
    $sheet->setCellValue('G1', 'Fecha de termino');
    // ... Continúa con otros encabezados según necesites ...

    // Ahora, llenar los datos en las filas
    $row = 2; // Empezar en la fila 2 porque la 1 ya tiene los encabezados
    foreach ($records as $record) {
        $sheet->setCellValue('A' . $row, $record['id']);
        $sheet->setCellValue('B' . $row, $record['task']);
        $sheet->setCellValue('C' . $row, $record['client']);
        $sheet->setCellValue('D' . $row, $record['details']);
        $sheet->setCellValue('E' . $row, $record['status']);
        $sheet->setCellValue('F' . $row, $record['start_date_and_time']);
        $sheet->setCellValue('G' . $row, $record['end_date_and_time']);
        // ... Continúa con otros campos según necesites ...
        $row++;
    }

    $nombreDelMes = $meses[$month]; // Obtener el nombre del mes
    header('Content-Disposition: attachment; filename="Tareas del mes de ' . $nombreDelMes . '.xlsx"');

    // Finalmente, genera el archivo Excel y fuerza la descarga
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    $writer->save('php://output');
    exit;
}

$ruta = __DIR__ . "/../class/sessionManager.php";
if(file_exists($ruta)) {
    $ruta = realpath($ruta);
    require_once $ruta;
} else {
    echo "No existe -> ". $ruta;
}

$rutaAcceso = __DIR__ . "/../class/accessException.php";
if(file_exists($rutaAcceso)) {
    $rutaAcceso = realpath($rutaAcceso);
    require_once $rutaAcceso;
} else {
    echo "No existe -> ". $rutaAcceso;
}

$rutaActivity = __DIR__ . "/../class/activity.php";
if(file_exists($rutaActivity)) {
    $rutaActivity = realpath($rutaActivity);
    require_once $rutaActivity;
} else {
    echo "No existe -> ". $rutaActivity;
}

$pathTechnical = __DIR__ . "/../class/technical.php";
if(file_exists($pathTechnical)) {
    $pathTechnical = realpath($pathTechnical);
    require_once $pathTechnical;
} else {
    echo "No existe -> ". $pathTechnical;
}

$classSessionManager = new SessionManager();

function verifyAccess($classSessionManager, $rol) {
    if (!isset($_SESSION['userTechnical'])) {
        throw new AccesoException('No puedes acceder, ya que intentas ingresar con otro usuario en el mismo navegador.');
    }
    
    $users = $_SESSION['roles'][$rol];
    $numberArrays = $classSessionManager -> countInternalArrays($users);
    
    if ($rol == 'technical' && $numberArrays != 1) {
        throw new AccesoException('Debe haber exactamente un tecnico en el mismo navegador.');
    }
    
    if ($rol != 'technical' && $numberArrays > 0) {
        throw new AccesoException('No deben haber otros roles en el mismo navegador.');
    }
}

/**
 * Verifica el acceso para cada rol y maneja las excepciones.
 */
try {
    verifyAccess($classSessionManager, 'technical');
} catch (AccesoException $e) {
    $classSessionManager -> close();
    $content = $e -> getMessage();
    $content = base64_encode($content);
    setcookie('errorAcceso', $content, time() + 1, "/");
    header('Location: ../../index.php?error=2usuariosFis');
}


$technicalId = $_SESSION['userTechnical'];
$technicalInstance = new Technical($technicalId);

$data = $technicalInstance -> viewData();

$names = $data['names'];
$surnames = $data['surnames'];
$position = $data['position'];

$classActivity = new Activity();

$taskRecords = $classActivity -> viewTask($technicalId);
$taskPaused = $classActivity -> seeTaskPaused($technicalId);
$taskFinished = $classActivity -> seeFinishedTask($technicalId);

if(!empty($_POST['month'])) {
    $month = $_POST['month'];
    $taskRecordsForMonth = $classActivity->taskMonth($technicalId, $month);
} else {
    $taskRecordsForMonth = array();
}

$selectedMonth = isset($_POST['month']) ? $_POST['month'] : '';


if (isset($_POST['excel'])) {
    if (!empty($taskRecordsForMonth)) {
        generateExcel($taskRecordsForMonth, $month);
    } else {
        // Puedes manejar un mensaje de error aquí si lo deseas.
    }
}


// Para el taskRecords
if (!empty($taskRecords)) {
    $startDateAndTimeTask = $taskRecords[0]['start_date_and_time'];
    $startDateAndTimeTask = str_replace(' ', ' / ', $startDateAndTimeTask);
} else {
    $startDateAndTimeTask = "Fecha y hora de inicio no disponibles";
}


?>