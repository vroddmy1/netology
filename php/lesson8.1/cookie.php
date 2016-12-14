<?php
if (!empty($_GET['cookie'])) {
    setcookie('my_cookie_die', 'die', time() + 60);
    setcookie('my_cookie', $_SERVER['REMOTE_ADDR'], null, '/');
} else {
    if (!empty($_COOKIE['my_cookie'])) {
        echo $_COOKIE['my_cookie'];
    }
    if (!empty($_COOKIE['my_cookie_die'])) {
        echo $_COOKIE['my_cookie_die'];
    }
}