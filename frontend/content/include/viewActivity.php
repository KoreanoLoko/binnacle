<?php
require_once "../../backend/secure/technicalValidation.php";
?>
<main class="container rounded bg-white mt-3">
    <div class="row">
        <div class="col-12">
            <!-- Encabezado -->
            <div class="col-12 text-center pt-3">
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <h6 class="display-6">Tareas Iniciadas</h6>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                    Estas tareas se van completando por orden de llegada.
                    </figcaption>
                </figure>
            </div>
            <div class="table-responsive px-3 py-3">
                <table class="table table-hover table-sm" id="registro-tareas">
                    <thead class="table-info">
                        <tr>
                            <th scope="col" class="rounded-start text-center">ID</th>
                            <th scope="col" class="text-center">Tarea</th>
                            <th scope="col" class="text-center">Designado</th>
                            <th scope="col" class="text-center">Detalle</th>
                            <th scope="col" class="text-center">Estado</th>
                            <th scope="col" class="text-center">F. H. I.</th>
                            <th scope="col" class="text-center">Terminar</th>
                            <th scope="col" class="rounded-end text-center">Pausar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($taskRecords); $i++) {
                        ?>
                        <tr class="text-center align-middle">
                            <td class="rounded-start"><?= htmlspecialchars($taskRecords[$i]['id'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskRecords[$i]['task'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskRecords[$i]['client'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskRecords[$i]['details'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskRecords[$i]['status'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($startDateAndTimeTask, ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <form action="../../backend/php/controller/task.php" method="post">
                                    <input type="hidden" name="status" value="terminado">
                                    <input type="hidden" name="action" value="completed">
                                    <input type="hidden" name="task-id" value="<?= $taskRecords[$i]['id'] ?>">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="bi bi-patch-check"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="rounded-end">
                                <form action="../../backend/php/controller/task.php" method="post">
                                    <input type="hidden" name="status" value="pausado">
                                    <input type="hidden" name="action" value="paused">
                                    <input type="hidden" name="task-id" value="<?= $taskRecords[$i]['id'] ?>">
                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="bi bi-pause-circle"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<section class="container-fluid bg-white mt-3 ps-5 pe-5">
    <div class="row">
        <div class="col-12
                    col-sm-12
                    col-md-6">
            <!-- Encabezado -->
            <div class="col-12 text-center pt-3">
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <h6 class="display-6">Tareas terminadas</h6>
                    </blockquote>
                </figure>
            </div>
            <div class="table-responsive px-3 py-3">
                <table class="table table-primary table-hover table-sm" id="terminadas">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="rounded-start text-center">ID</th>
                            <th scope="col" class="text-center">Tarea</th>
                            <th scope="col" class="text-center">Designado</th>
                            <th scope="col" class="text-center">Detalle</th>
                            <th scope="col" class="text-center">F.H.I.</th>
                            <th scope="col" class="rounded-end text-center">F.H.T.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($i = 0; $i < count($taskFinished); $i++){
                        ?>
                        <tr class="text-center align-middle">
                            <td class="rounded-start"><?= htmlspecialchars($taskFinished[$i]['id'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($taskFinished[$i]['task'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskFinished[$i]['client'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskFinished[$i]['details'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskFinished[$i]['start_date_and_time'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td class="rounded-end"><?= htmlspecialchars($taskFinished[$i]['end_date_and_time'], ENT_QUOTES, 'UTF-8') ?></td>                               
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12
                    col-sm-12
                    col-md-6">
            <!-- Encabezado -->
            <div class="col-12 text-center pt-3">
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <h6 class="display-6">Tareas Pausadas</h6>
                    </blockquote>
                </figure>
            </div>
            <div class="table-responsive px-3 py-3">
                <table class="table table-danger table-hover table-sm" id="pausadas">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col" class="rounded-start text-center">ID</th>
                            <th scope="col" class="text-center">Tarea</th>
                            <th scope="col" class="text-center">Designado</th>
                            <th scope="col" class="text-center">Detalle</th>
                            <th scope="col" class="text-center">F.H.I</th>
                            <th scope="col" class="text-center">F.H.P</th>
                            <th scope="col" class="rounded-end text-center">Reanudar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($i = 0; $i < count($taskPaused); $i++) {
                        ?>
                        <tr class="text-center align-middle">
                            <td class="rounded-start"><?= htmlspecialchars($taskPaused[$i]['id'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($taskPaused[$i]['task'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskPaused[$i]['client'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskPaused[$i]['details'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskPaused[$i]['start_date_and_time'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($taskPaused[$i]['end_date_and_time'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td class="rounded-end">
                                <form action="../../backend/php/controller/task.php" method="post">
                                    <input type="hidden" name="status" value="iniciado">
                                    <input type="hidden" name="action" value="restart">
                                    <input type="hidden" name="task-id" value="<?= $taskPaused[$i]['id'] ?>">
                                    <button type="submit" class="btn btn-info">
                                        <i class="bi bi-skip-end"></i>
                                    </button>
                                </form>
                            </td> 
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>