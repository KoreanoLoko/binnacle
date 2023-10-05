<?php
class ShowAlert {
    
    public function showErrorMessage() {
        $nameCookie = '';
        $typeAlert = '';

        if (isset($_COOKIE['errorAcceso'])) {
            $nameCookie = 'errorAcceso';
            $typeAlert = 'warning';
        } elseif (isset($_COOKIE['errorCredenciales'])) {
            $nameCookie = 'errorCredenciales';
            $typeAlert = 'danger';
        } elseif (isset($_COOKIE['sesionCerrada'])) {
            $nameCookie = 'sesionCerrada';
            $typeAlert = 'info';
        } elseif (isset($_COOKIE['inactivo'])) {
            $nameCookie = 'inactivo';
            $typeAlert = 'info';
        }

        if ($nameCookie) {
            $messageError = base64_decode($_COOKIE[$nameCookie]);
            
            echo '<div class="alert alert-' . $typeAlert . ' mb-4 text-center" role="alert">';
            echo $messageError;
            echo '</div>';
        }
    }

    public function displayToastMessage() {
        if(isset($_COOKIE['exito'])) {
            $contentCookie = base64_decode($_COOKIE['exito']);
            echo '
                <div class="toast-container position-fixed bottom-0 start-0 p-3">
                    <div id="liveToast" class="toast shadow" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header header-toast-exito">
                            <img src="../../frontend/icon/icon-tab.png" width="30px" height="30px" class="rounded me-2" alt="Icono">
                            <strong class="me-auto text-center">Exito!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body rounded body-toast-exito">
                            '. $contentCookie .'
                        </div>
                    </div>
                </div>
            ';
        } elseif (isset($_COOKIE['fallido'])) {
            $contentCookie = base64_decode($_COOKIE['fallido']);
            echo '
            <div class="toast-container position-fixed bottom-0 start-0 p-3">
                <div id="liveToast" class="toast shadow" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header header-toast-fallido">
                        <img src="../../frontend/icon/icon-tab.png" width="30px" height="30px" class="rounded me-2" alt="Icono">
                        <strong class="me-auto text-center">Error!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body rounded body-toast-fallido">
                        '. $contentCookie .'
                    </div>
                </div>
            </div>
            ';
        }
    }
}

$messageAlert = new ShowAlert();
?>