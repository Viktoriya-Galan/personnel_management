
<button class="btn btn-primary" type="button"  > 
 <a style="text-decoration: none; color: white;" href="<?= site_url('rating/create/') ?>">
  Додати оцінку</a>
  </button>

<?php if (!empty($ratings) && is_array($ratings)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Працівник</th>
                <th>Оцінки</th>
                <th>Дата оцінки</th>
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
                </tr>
                <td> 
                     <a href="<?= site_url('rating/delete/'.$rating['rating_id']) ?>">
                     Видалити</a>
                  </td>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Оцінок не занйдено</p>
<?php endif; ?>