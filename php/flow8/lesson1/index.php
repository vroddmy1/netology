<?php
    require_once 'functions.php';
    $filter = [
        'age' => ['<', 30],
        'weight' => ['>', 40],
    ];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        tr.light td {
            color: green;
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
            <th>Вес</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach (getProfiles($filter) as $item): ?>
        <?php
            $class = '';
            if ($item['weight'] < 50) {
                $class = 'light';
            }
        ?>
        <tr class="<?= $class ?>">
            <td><?= $item['name'] ?></td>
            <td><?= $item['age'] ?></td>
            <td><?= $item['weight'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>