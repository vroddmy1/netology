<?php
    include 'functions.php';
    /*$namePOST = isset($_POST['name']) ? $_POST['name'] : null;
    $nameGET = isset($_GET['name']) ? $_GET['name'] : null;
    if ($namePOST) {
        $name = $namePOST;
    } else {
        $name = $nameGET;
    } */
    $name = getQueryParam('name');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<body>
    <? if ($name): ?>
        Привет <b><?= $name ?></b>
    <? else: ?>
        <form method="POST">
            <label for="name" >Имя</label>
            <input id="name" name="name" />

            <button type="submit">Отправить</button>
        </form>
    <? endif; ?>
</body>
</html>
