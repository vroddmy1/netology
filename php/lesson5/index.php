<?
error_reporting(E_ALL);
// Считывание данных из файла.
include 'functions.php';

render('template_' . getLanguage() . '.php', ['date' => date('Y-m-d H:i:s')]);
?>

