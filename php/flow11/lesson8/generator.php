<?php
require_once 'core.php';
if (!isAuthorized()) {
    location('login');
}
$salt = getSalt();
if (!empty($_GET['password'])) {
    echo getHashPassword($_GET['password']);
}