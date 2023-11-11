
 <a class="btn btn-success my-button" style="margin: 10px" href="<?= site_url('rating/create/') ?>">
  Додати оцінку</a>

  <a class="btn btn-success my-button" style="margin: 10px" href="<?= site_url('/') ?>">Головна </a>
  <a class="btn btn-success my-button" style="margin: 10px" href="<?= site_url('employees') ?>">Працівники</a>

<?php if (!empty($ratings) && is_array($ratings)): ?>
    <table class="table table-success table-striped">
        <thead>
            <tr class="tr-table-success">
                <th>ID</th>
                <th>ID працівника</th>
                <th>Працівник</th>
                <th>Оцінки</th>
                <th>Дата оцінки</th>
                <th>Додатково</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ratings as $rating): ?>
                <tr>
                    <td><?= $rating['rating_id'] ?></td>
                    <td><?= $rating['employee_id'] ?></td>
                    <td>
    <?php
    $employeeName = "";
    foreach ($employees as $employee) {
        if ($employee['employee_id'] == $rating['employee_id']) {
            $employeeName = $employee['first_name'].''.$employee['last_name'].''.$employee['middle_name'];
            break;
        }
    }
    echo $employeeName;
    ?>
</td>
                    <td><?= $rating['rating'] ?></td>
                    <td><?= $rating['rating_date'] ?></td>
                    <td> 
                     <a class="btn btn-success" href="<?= site_url('rating/delete/'.$rating['rating_id']) ?>">
                     Видалити</a>
                  </td>
                </tr>
                
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Оцінок не занйдено</p>
<?php endif; ?>