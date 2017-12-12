<?php
    require_once 'functions.php';
    if (!isAuthorized()) {
        redirect('login');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
</head>
<body>
    <p>Привет, <?= $_SESSION['user']['username'] ?></p>
    <a href="logout.php">Выйти</a>
</body>
</html>
