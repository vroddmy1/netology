<?php
require_once 'functions.php';

if (empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="myRealm"');
    die;
}
$user = getUser($_SERVER['PHP_AUTH_USER']);
if (!$user || $user['password'] != $_SERVER['PHP_AUTH_PW']) {
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
    <title>Basic Auth Example</title>
</head>
<body>
<h1>Добро пожаловать, <?= $user['name'] ?></h1>
</body>
</html>