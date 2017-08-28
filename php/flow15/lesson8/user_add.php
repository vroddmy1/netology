<?php
require_once 'core/core.php';
$errors = [];
if (isPost()) {
    if(addUser(getParam('login'), getParam('password'), getParam('username'))) {
        redirect('index');
    } else {
        $errors[] = 'Не получилось добавить...';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Вход</title>
</head>
<body>
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Добавление пользователя</h3>
                </div>
                <div class="panel-body">

                    <?php if(!empty($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>

                    <form method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Login" name="login" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" value="">
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Добавить">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
