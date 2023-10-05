<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$rutaValidacion = "../../backend/secure/technicalValidation.php";
if(file_exists($rutaValidacion)) {
    $ruta = realpath($rutaValidacion);
    require_once $ruta;
} else {
    echo "No existe = ". $ruta;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home technical</title>
    <!-- Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap Icon's -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/homeTechnical.css">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../icon/icon-tab.png">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans:ital@1&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
 
 <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex flex-row align-items-center" href="homeTechnical.php">
                <img src="../icon/icon-tab.png" class="d-none d-sm-block" width="40px" height="40px" alt="Icono del creador">
                Soporte Informatico
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header pb-0">
                    <h5 class="offcanvas-title font-title" id="offcanvasDarkNavbarLabel">Interacciones</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="col-12
                            col-md-12
                            ps-3"> 
                    <p class="my-0 py-0 font-sub-title"><?= $names . ' ' . $surnames ?></p>
                </div>
                <div class="col-12
                            col-md-12
                            ps-3">
                            <p class="my-0 py-0 font-sub-title"><?= $position ?></p>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active font-body" aria-current="page" href="homeTechnical.php?part=1">Actividad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="homeTechnical.php?part=2">Agregar actividad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="homeTechnical.php?part=3">Actividades del mes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../backend/php/signOff.php">Cerrar sesion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_GET['part'])) {
        switch ($_GET['part']) {
            case '1':
                require_once "include/viewActivity.php";
                break;
            case '2':
                require_once "include/addActivity.php";
                break;
            case '3':
                require_once "include/viewMonthActivity.php";
                break;
            
            default:
                require_once "include/viewActivity.php";
                break;
        }
    } else {
        require_once "include/viewActivity.php";
    }
    ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="../js/homeTechnical.js"></script>
</body>
</html>