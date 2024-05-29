<h2><?= esc($Make) ?></h2>

<?php if (! empty($Cars) && is_array($Cars)): ?>

    <?php foreach ($Cars as $Cars_item): ?>

        <h3><?= esc($Cars_item['Make']) ?></h3>

        <div class="main">
            <?= esc($Cars_item['Year']) ?>
        </div>
        <p><a href="/Cars/<?= esc($Cars_item['Model'], 'url') ?>">View details</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No </h3>

    <p>Unable to find any Car for you.</p>

<?php endif ?>