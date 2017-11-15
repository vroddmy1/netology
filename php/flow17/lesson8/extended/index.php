<?php
// admin Dashboard
require_once 'functions.php';

if (!isAuthorized()) {
    redirect('login');
}
?>

<h1>Добро пожаловать, <?= getAuthorisedUserData()['username'] ?>!</h1>
<a href="logout.php">Выйти</a>
