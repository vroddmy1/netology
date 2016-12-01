<?php
    include  'functions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Бюджетная книжка</title>
</head>
<body>
    <table border="1">
        <?php foreach (getRecords() as $record): ?>
            <tr>
                <td><?= $record['date'] ?></td>
                <td><?= $record['what'] ?></td>
                <td><?= $record['amount'] ?></td>
                <td><?= $record['who'] ?></td>
            </tr>
        <? endforeach; ?>
    </table>
</body>
</html>

