<?php
session_start();


if (!empty($_GET['session'])) {
    $_SESSION['is_admin'] = 1;
}

if (!empty($_SESSION['is_admin'])) {
    echo $_SESSION['is_admin'];
}
var_dump(session_save_path());
