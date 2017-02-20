<?php
    require_once 'functions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список анкет</title>
    <style>
        .row-green td {
            color: green;
            font-weight: bold;
        }

        .row-red td {
            color: darkred;
            font-weight: bold;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Имя</th>
        <th>Возраст</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach (getProfiles(getFilter('age')) as $item): ?>

        <?php
        if ($item['age'] > 30) {
            $class = 'row-red';
        } elseif ($item['age'] < 20) {
            $class = 'row-green';
        }
        ?>
        <tr class="<?= isset($class) ? $class : ''; ?>">
            <td><?= $item['name'] ?></td>
            <td><?= $item['age'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
