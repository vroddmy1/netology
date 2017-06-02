<?php
define('ADMIN_LOGIN', 'admin');
define('ADMIN_PW', 'admin');

if (empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="myRealm"');
    die;
}

if (ADMIN_LOGIN != $_SERVER['PHP_AUTH_USER'] || ADMIN_PW != $_SERVER['PHP_AUTH_PW']) {
    header('WWW-Authenticate: Basic realm="myRealm"');
    die;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basic Auth</title>
</head>
<body>
    Добро пожаловать, <?= $_SERVER['PHP_AUTH_USER'] ?>!
</body>
</html>
