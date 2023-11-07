<button class="btn btn-primary" type="button"  > 
 <a style="text-decoration: none; color: white;" href="<?= site_url('departments/create/') ?>">
  Додати відділ</a>
  </button>
<?php if (!empty($departments) && is_array($departments)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Назва відділу</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departments as $department): ?>
                <tr>
                    <td><?= $department['department_id'] ?></td>
                    <td><?= $department['department_name'] ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>відділи не знайдені</p>
<?php endif; ?>