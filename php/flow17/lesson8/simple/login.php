<?php
    require_once 'functions.php';
   //Если POST, тогда проверяем корректность логина и пароля
    $errors = [];
    if (isPost()) {
        // Проверка логина и пароля
        if(login($_POST['login'], $_POST['password'])) {
            echo 'Вы авторизовались, можете заходить в админку';
            die;
        } else {
            $errors[] = 'Неверный логин или пароль';
        }
    }

    // А если не POST (т.е. GET) - тогда ничего не делаем, просто выводим нижний HTML.
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Авторизация</title>
</head>
<body>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>Авторизация</h1>
                    <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                    </ul>
                    <form method="POST" id="login-form">
                        <div class="form-group">
                            <label for="lg" class="sr-only">Логин</label>
                            <input type="text" name="login" id="lg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Пароль</label>
                            <input type="password" name="password" id="key" class="form-control">
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Войти">
                    </form>

                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
</body>
</html>