<?php
    // Для того чтобы выводить все ошибки и предупреждения
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    $errors = [];
    if (!empty($_POST)) {

        $fileData = file_get_contents(__DIR__ . '/users.json');
        $users = json_decode($fileData, true);

        foreach ($users as $user) {
            if ($_POST['login'] == $user['login'] && $_POST['password'] == $user['password']) {
                $_SESSION['user'] = $user;
                header('Location: index.php');
                die;
            }
        }
        $errors[] = 'Неверный логин или пароль';
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                        <? endforeach; ?>
                    </ul>
                    <form method="POST">
                        <div class="form-group">
                            <label for="lg" class="sr-only">Логин</label>
                            <input type="text" placeholder="Логин" name="login" id="lg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Пароль</label>
                            <input type="password"  placeholder="Пароль" name="password" id="key" class="form-control">
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
