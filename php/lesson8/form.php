<?
include  'functions.php';
session_start();
$homeUrl = '/lesson8/secure_zone.php';
if (!empty($_POST['Auth'])) {
   $isLogged = login($_POST['Auth']['login'], $_POST['Auth']['password']);
   if ($isLogged) {
       header('Location: ' . $homeUrl);
   } else {
       header('Location: ' . getLoginPath());
       die;
   }
}

if (isLogged()) {
    header('Location: ' . $homeUrl);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
    <b style="color: red;"><?= getError() ?></b>
    <form method="post">
        <label for="login" >Логин</label>
        <input id="login" name="Auth[login]" />

        <label for="password" >Пароль</label>
        <input type="password" id="password" name="Auth[password]" />
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
<? clearError(); ?>