<?php
// Перенесли функционал в form.php
session_start();
define('USER', 'admin');
define('PASSWORD', 'admin');

if (!empty($_POST['Auth'])) {
    if ($_POST['Auth']['login'] == USER
        && $_POST['Auth']['password'] == PASSWORD) {
        $_SESSION['login'] = $_POST['Auth']['login'];
        header('Location: /lesson8/secure_zone.php');
    } else {
        header('Location: /lesson8/form.php?error=Некорректный пароль');
    }
} else {
    header('Location: /lesson8/form.php?error=Необходимо авторизоваться');
}
