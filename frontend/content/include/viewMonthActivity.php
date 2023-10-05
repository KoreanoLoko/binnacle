<main class="container bg-white mt-3">
    <div class="row">
        <!-- Encabezado -->
        <div class="col-12 text-center pt-3">
                <figure class="text-center">
                    <blockquote class="blockquote">
                        <h6 class="display-6">Seleccione el mes</h6>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                    Que desea visualizar las actividades.
                    </figcaption>
                </figure>
            </div>
        <form action="#" method="post" class="d-flex flex-column
                                              d-lg-flex flex-lg-row">
            <div class="col-12
                        col-sm-12
                        col-md-12
                        col-lg-10">
                <select class="form-select form-select-lg text-center" aria-label="Default select example" name="month" required>
                    <option value=""<?= empty($selectedMonth) ? 'selected' : ''; ?>>Escoga el mes</option>
                    <option value="01" <?= $selectedMonth === '01' ? 'selected' : ''; ?>>Enero</option>
                    <option value="02" <?= $selectedMonth === '02' ? 'selected' : ''; ?>>Febrero</option>
                    <option value="03" <?= $selectedMonth === '03' ? 'selected' : ''; ?>>Marzo</option>
                    <option value="04" <?= $selectedMonth === '04' ? 'selected' : ''; ?>>Abril</option>
                    <option value="05" <?= $selectedMonth === '05' ? 'selected' : ''; ?>>Mayo</option>
                    <option value="06" <?= $selectedMonth === '06' ? 'selected' : ''; ?>>Junio</option>
                    <option value="07" <?= $selectedMonth === '07' ? 'selected' : ''; ?>>Julio</option>
                    <option value="08" <?= $selectedMonth === '08' ? 'selected' : ''; ?>>Agosto</option>
                    <option value="09" <?= $selectedMonth === '09' ? 'selected' : ''; ?>>Septiembre</option>
                    <option value="10" <?= $selectedMonth === '10' ? 'selected' : ''; ?>>Octubre</option>
                    <option value="11" <?= $selectedMonth === '11' ? 'selected' : ''; ?>>Noviembre</option>
                    <option value="12" <?= $selectedMonth === '12' ? 'selected' : ''; ?>>Diciembre</option>
                </select>
            </div>
            <div class="col-12
                        col-sm-12
                        col-md-12
                        col-lg-2
                        text-center
                        my-2 my-lg-0
                        ps-0 ps-sm-2 ps-md-0
                        d-flex justify-content-center align-items-center">
                <button class="btn btn-primary
                               me-2"
                               name="buscar" type="submit">
                    Buscar
                </button>
                <button class="btn btn-success" name="excel" type="submit">
                    Excel
                </button>
            </div>
        </form>
        <div class="col-12">
            <div class="table-responsive px-3 py-3">
                <table class="table table-hover table-sm" id="registro-mes">
                    <thead class="table-info">
                        <tr>
                            <th scope="col" class="rounded-start text-center">ID</th>
                            <th scope="col" class="text-center">Tarea</th>
                            <th scope="col" class="text-center">Designado</th>
                            <th scope="col" class="text-center">Detalle</th>
                            <th scope="col" class="text-center">Estado</th>
                            <th scope="col" class="text-center">F. H. I.</th>
                            <th scope="col" class="rounded-end text-center">F. H. T.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($taskRecordsForMonth); $i++) {
                        ?>
                        <tr class="text-center align-middle">
                            <td class="rounded-start"><?= htmlspecialchars($taskRecordsForMonth[$i]['id'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskRecordsForMonth[$i]['task'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskRecordsForMonth[$i]['client'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskRecordsForMonth[$i]['details'], ENT_QUOTES, 'UTF-8') ?></td>                               
                            <td><?= htmlspecialchars($taskRecordsForMonth[$i]['status'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($taskRecordsForMonth[$i]['start_date_and_time'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($taskRecordsForMonth[$i]['end_date_and_time'], ENT_QUOTES, 'UTF-8') ?></td>
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