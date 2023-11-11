<link rel="stylesheet" type="text/css" href="<?=site_url('css\styles.css') ?>">


  <a class="btn btn-success my-button"  href="<?= site_url('tradeObjects/create') ?>">Додати Магазин</a>
  <a class="btn btn-success my-button" style="margin: 10px" href="<?= site_url('/') ?>">Головна </a>
  <a class="btn btn-success my-button" style="margin: 10px" href="<?= site_url('employees') ?>">Працівники</a>

<?php if (!empty($tradeObjects) && is_array($tradeObjects)): ?>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Назва Магазину</th>
                <th>Адреса</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tradeObjects as $object): ?>
                <tr>
                    <td><?= $object['trade_object_id'] ?></td>
                    <td><?= $object['object_name'] ?></td>
                    <td><?= $object['address'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Посади не знайдені</p>
<?php endif; ?>