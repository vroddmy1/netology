<?php
if (empty($_COOKIE['my_cookie_1'])) {
    setcookie('my_cookie_1', '123', time() - 1);
} else {
    echo $_COOKIE['my_cookie_1'];
}

