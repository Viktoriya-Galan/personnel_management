<link rel="stylesheet" type="text/css" href="<?=site_url('css\styles.css') ?>">

<button  type="button" class="btn btn-success my-button" > 
  <a style="text-decoration: none; color: white;" href="<?= site_url('positions/create/') ?>">
  Додати посаду</a>
  </button>
  <a class="btn btn-success my-button" style="margin: 10px" href="<?= site_url('/') ?>">Головна </a>
  <a class="btn btn-success my-button" style="margin: 10px" href="<?= site_url('employees') ?>">Працівники</a>

<?php if (!empty($positions) && is_array($positions)): ?>
    <table class="table table-success table-striped">
        <thead>
            <tr class="tr-table-success">
                <th>ID</th>
                <th>Назва посади</th>
                <th>Опис посади</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($positions as $position): ?>
                <tr>
                    <td><?= $position['position_id'] ?></td>
                    <td><?= $position['position_name'] ?></td>
                    <td><?= $position['position_description'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Посади не знайдені</p>
<?php endif; ?>