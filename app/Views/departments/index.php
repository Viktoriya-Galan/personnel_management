<link rel="stylesheet" type="text/css" href="<?=site_url('css\styles.css') ?>">
<a class="btn btn-success my-button" href="<?= site_url('/') ?>">Головна сторінка</a>
<button  type="button" class="btn btn-success my-button" > 
<a style="text-decoration: none; color: white;" href="<?= site_url('departments/create/') ?>">
  Додати відділ</a>
  </button>
  <a class="btn btn-success my-button" style="margin: 10px" href="<?= site_url('/') ?>">Головна </a>
  <a class="btn btn-success my-button" style="margin: 10px" href="<?= site_url('employees') ?>">Працівники</a>

<?php if (!empty($departments) && is_array($departments)): ?>
    <table class="table table-success table-striped">
        <thead>
            <tr  class="tr-table-success">
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