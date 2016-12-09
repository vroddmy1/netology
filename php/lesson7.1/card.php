<?php
include 'functions/common.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Открытка</title>
</head>
<body>
    <b>Открытка на день рождения! </b>
    <a href="<?= getUrlByParams('save.php', ['name' => 'fio']) ?>">Сохранить</a>
    <img src="<?= getUrlByParams('image.php', ['name' => 'fio']) ?>" />
</body>
</html>