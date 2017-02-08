<?php
if(!isset($_COOKIE['my_cookie'])) {
    setcookie('my_cookie', 1024, time() + 3600 * 2);
} else {
    echo $_COOKIE['my_cookie'];
}

