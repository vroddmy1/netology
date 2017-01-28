<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Пример циклов и альтернативного синтаксиса</title>
</head>
<body>
Текущее время: <?php echo $date ?>
<?php foreach (getProfiles() as $profile): ?>
    <?php foreach ($profile as $fieldName => $fieldValue): ?>
        <div>
            <?php if ($fieldName == 'name'): ?>
                <b><?= $fieldName ?> = <?= $fieldValue ?></b>
            <?php else: ?>
                <i><?= $fieldName ?> = <?= $fieldValue ?></i>
            <? endif; ?>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>
</body>
</html>
