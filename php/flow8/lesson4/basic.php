<?php
require_once 'functions.php';
if (!basicAuth()) {
    echo 'Вам доступ запрещен';
    die;
}
echo 'Добро пожаловать';
