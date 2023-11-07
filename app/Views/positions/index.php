<?php if (!empty($positions) && is_array($positions)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Назва посади</th>
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