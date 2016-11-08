<?php
include 'functions.php';
if (isset($_POST['name'])) {
    echo  'Добро пожаловать ' . htmlspecialchars($_POST['name']) . '<br />';
}
$avatar = uploadFile('avatar', 'avatar');

if (!$avatar) {
    die('При загрузке файла произошла ошибка!');
}
?>
<img src="<?= $avatar ?>" />
