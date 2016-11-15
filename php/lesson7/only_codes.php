<?php
include 'functions.php';
$id = !empty($_GET['id']) ? (int)$_GET['id'] : null;

showTest($id);
