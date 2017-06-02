<?php
$currentTimestamp = time();
if(empty($_COOKIE['test_name_cookie_expire_10'])) {
    setcookie('test_name_cookie_expire_10', date('H:i:s'), $currentTimestamp + 100);
} else {
    echo $_COOKIE['test_name_cookie_expire_10'];
}
//setcookie('test_name_cookie_expire_10', date('H:i:s'), $currentTimestamp - 1);

