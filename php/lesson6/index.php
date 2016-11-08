<?php
include 'functions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма</title>
</head>
<body>
    <form action="form.php" method="post" enctype="multipart/form-data">
        <label for="name">Имя</label>
        <input id="name" name="name" />

        <label for="avatar">Аватарка</label>
        <input type="file" id="avatar" name="avatar" />

        <button type="submit">Отправить</button>
    </form>
</body>
</html>
