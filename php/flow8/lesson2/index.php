<?php
    require_once 'functions.php';
    $name = null;
    $age = null;
    //$page = (int)getParamGet('page', 1);

    $options = [
        'options' => [
            'default' => 1,
            'min_range' => 1,
            'max_range' => 10,
        ],
    ];
    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, $options);


    if (isPost()) {
        $name = trim(getParamPost('name'));
        $age = (int)getParamPost('age');
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
<?php if (isPost()): ?>
    Добро пожаловать, <?= htmlspecialchars($name) ?><br />
    Ваш возраст: <?= $age ?><br />
<?php else: ?>
    <form method="POST">
        <label for="name">Имя</label>
        <input id="name" name="name">
        <label for="age">Возраст</label>
        <input id="age" name="age">
        <button type="submit">Отправить</button>
    </form>
<?php endif; ?>
Вы находитесь на странице: <?= $page; ?>
</body>
</html>