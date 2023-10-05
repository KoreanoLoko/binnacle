<?php
require_once "../../backend/secure/technicalValidation.php";
?>
<main class="container bg-white mt-3 rounded">
    <div class="col-12 text-center pt-3">
        <figure class="text-center">
            <blockquote class="blockquote">
                <h6 class="display-6">Agregar tarea</h6>
            </blockquote>
        </figure>
    </div>
    <form action="../../backend/php/controller/task.php" method="post">
        <div class="row py-2">
            <div class="col-12
                        col-sm-6">
                <label for="task" class="form-label">Tarea</label>
                <input type="text" name="task" class="form-control" required>
            </div>
            <div class="col-12
                        col-sm-6">
                <label for="client" class="form-label">Cliente</label>
                <input type="text" name="client" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="details" class="form-label">Detalles</label>
                <textarea class="form-control" name="details" id="details" cols="2" rows="2" maxlength="250" required></textarea>
                <div class="mt-1" id="count"></div>
            </div>
            <div class="col-12 d-flex justify-content-end text-center mb-1">
                <input type="hidden" name="status" value="iniciado">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="technical-id" value="<?= $technicalId ?>">
                <button type="submit" class="btn btn-primary">
                    Subir actividad
                </button>
            </div>
        </div>
    </form>
</main>
