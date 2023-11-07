<?php if (!empty($employmentStatuses) && is_array($employmentStatuses)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Назва статусу</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employmentStatuses as $status): ?>
                <tr>
                    <td><?= $status['employment_status_id'] ?></td>
                    <td><?= $status['status'] ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Статуси не знайдені</p>
<?php endif; ?>