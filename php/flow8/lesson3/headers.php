<?php
error_reporting(E_ALL);
ob_start();
echo '{"message": "Привет"}';
$output = ob_get_clean();

 // Много много кода...

header('Content-Type: application/json');
echo $output;
