<?php
require 'functions.php';
$isSave = (bool)getParam('is_save', false);

header('Content-Type: image/png');
if ($isSave) {
    header('Content-Disposition: attachment; filename="card.png"');
}
renderCard(getParam('text', 'Поздравляю, гость!'));
