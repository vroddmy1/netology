<?php
    require_once 'functions.php';
    if (isPOST()) {
        if(!auth(getParam('login'), getParam('password'))) {
            die('Данные введены неверно');
        } else {
            header('Location: secure.php');
            die;
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="assets/script.js" ></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" ></script>
    <title>Авторизация</title>
</head>
<body>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>Авторизация</h1>
                    <form role="form" method="post" id="login-form">
                        <div class="form-group">
                            <label for="lg" class="sr-only">Логин</label>
                            <input type="text" name="login" id="lg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Пароль</label>
                            <input type="password" name="password" id="key" class="form-control">
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Show password</span>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                    </form>
                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Page © - 2014</p>
                <p>Powered by <strong><a href="http://www.facebook.com/tavo.qiqe.lucero" target="_blank">TavoQiqe</a></strong></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>