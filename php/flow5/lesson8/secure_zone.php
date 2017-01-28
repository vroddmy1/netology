<?php
session_start();
include  'functions.php';

if(isLogged()) {
    echo 'Админ панель!<br />';
    echo '<a href="/lesson8/logout.php">Выйти</a>';
} else {
    header('Location: ' . getLoginPath());
}
