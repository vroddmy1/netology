<?php
require_once __DIR__ . '/core/functions.php';

$currentUser = getCurrentUser();
if (!$currentUser) {
    redirect('login');
}

echo  'Добро пожаловать, ' . $currentUser['name'];
?>

<ul>
    <li><a href="/logout.php">Выход</a></li>
</ul>

