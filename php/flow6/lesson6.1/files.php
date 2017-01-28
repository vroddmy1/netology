<?php
    include 'functions.php';
    if (isPOST()) {
        if (!isAllowedExt(getUploadedFileClientName())) {
            echo 'Разрешено загружать только картинки.';
            die;
        }
        // Загружаем в нужную папку аватарку
        if(!uploadFile('avatar', getUploadedFileNewName())) {
            echo 'Файл не смог загрузиться';
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
    <title>Загрузку файлов на сервер</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
    <? if(isGET()): ?>
    <div>
        <label for="name">ФИО</label>
        <input type="text" id="fio" name="fio"/>
    </div>
    <div>
        <label for="name">Аватарка</label>
        <input type="file" id="avatar" name="avatar"/>
    </div>
    <button type="submit">Отправить</button>
    <? else: ?>
        Здравствуйте, <?= getQueryParam('fio') ?><br/>
        <img src="data/<?= getUploadedFileNewName() ?>">
    <? endif; ?>
</form>
</body>
</html>