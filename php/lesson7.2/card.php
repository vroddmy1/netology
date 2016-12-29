<?php
    require 'functions.php';
    if (!checkAvailable()){
        header('Location: /7/error.php');
        die;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <img src="image.php?text=<?= getParam('text') ?>" />
    <div>
        <a href="image.php?is_save=1">Сохранить на компьютер</a>
    </div>
</body>
</html>