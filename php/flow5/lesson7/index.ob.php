<?php

ob_start();
echo '123';
printf('Hallo');
//......
$output = ob_get_clean();


header('MyHeader: value1');
echo $output;
?>

