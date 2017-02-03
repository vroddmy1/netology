<?php
    require_once 'functions.php';

    $name = getParamPost('name');
    if (isPost()) {
        $fileName = uploadFile('file');
        if(!$fileName) {
            echo 'При загрузке файла произошла ошибка!';
            die;
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Загрузка файлов</title>
</head>
<body>
    <?php if(isPost()): ?>
        Привет, <?=  htmlspecialchars($name); ?><br/>
        <img src="/6/uploads/<?= $fileName ?>">
    <?php else: ?>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Имя</label>
        <input id="name" name="name">
        <label for="file">Файл</label>
        <input type="file" id="file" name="file">

        <button type="submit">Отправить</button>
    </form>
    <?php endif;; ?>
</body>
</html>