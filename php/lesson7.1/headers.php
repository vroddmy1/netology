<?php
include  'functions.php';
ob_start();
initName('Ivan');
//....
$content = ob_get_clean();

/*if (!file_exists(__DIR__ . '/data/data.json')) {
    http_response_code(500);
    echo 'На сервере на найдена база данных';
    die;
}*/
//header('Content-Type: text/html', true, 400);
/*header('MyHeader: 1', false);
header('MyHeader: 2', false);*/
//header('Content-Disposition: attachment; filename="doc1.txt"');
if (!empty($_GET['test'])) {
    echo 'Тестовая среда Для разработки';
} else {
    gotoPartners();
}
echo $content;

