<?php
include 'functions.php';
ob_start();
example();
$buff = ob_get_clean();

header('Content-Type: application/json');
echo $buff;
?>



