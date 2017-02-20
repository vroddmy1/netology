<?php
    require_once 'functions.php';
    $errors = [];
    $inputData = getInputValues([]);
    if(isPOST()) {
        $inputData = getInputValues(getParam('Data'));
        $errors = validateData($inputData);
        if (empty($errors) && setData($inputData)) {
            echo 'Данные добавлены в файл';
        } else {
            if (empty($errors)) {
                $errors[] = 'При сохранении произошла ошибка';
            }
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
    <title>Форма</title>
</head>
<body>
    <ul>
    <? foreach ($errors as $field => $error): ?>
         <li><?= getLabel($field) ?> - <?= $error ?></li>
    <? endforeach; ?>
    </ul>
    <form method="POST">
        <label for="name">Имя</label>
        <input name="Data[name]" value="<?= $inputData['name'] ?>" id="name"><br />

        <label for="age">Возраст</label>
        <input name="Data[age]" value="<?= $inputData['age'] ?>" id="age">
        <button type="submit" >Отправить</button>
    </form>
</body>
</html>