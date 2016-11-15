<?php
include 'functions.php';
/*if (isset($_GET['text'])) {
    $text = $_GET['text'];
} else {
    $text = 'Привет';
}*/
$text = !empty($_GET['text']) ? $_GET['text'] : 'Привет';

$asFile = !empty($_GET['as_file']) ? (int)$_GET['as_file'] : 0;
createImage($text, $asFile);
