<?php
include 'functions.php';
header('Content-Type: image/png');
if (getParamGet('download')) {
    header('Content-Disposition: attachment; filename="Капча.png"');
}
$text = generateCaptchaText(5);
saveCaptcha($text);
renderCaptcha($text);
?>
