<?php if (!empty($tradeObjects) && is_array($tradeObjects)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Назва TT</th>
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