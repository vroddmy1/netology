<?php
$color = 'black';
if (empty($_COOKIE['color']) || !empty($_GET['color'])) {
    if (!empty($_GET['color'])) {
        setcookie('color', $_GET['color'], time() - 1);
    } else {
        setcookie('color', 'red');
    }
} else {
    $color = $_COOKIE['color'];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <p style="color: <?= $color; ?>;">Некий текст</p>
</body>
</html>




