<?php
// admin Dashboard
require_once 'functions.php';

if (!isAuthorized()) {
    echo 'Вам нужно авторизоваться!';
    die;
}
?>

<h1>Вы в админке!</h1>
<a href="logout.php">Выйти</a>
