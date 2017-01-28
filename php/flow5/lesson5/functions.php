<?php
define('LANG_EN', 'en');
define('LANG_RU', 'ru');

function getProfiles()
{
    /*$profiles = [
        [
            'name' => 'Ivan 3',
            'age' => 18,
        ],
        [
            'name' => 'Ivan 4',
            'age' => 18,
        ]
    ];*/
    $json = file_get_contents('phone_book.json');
    $profiles = json_decode($json, true);
    return $profiles;
}

function render($templateName, $data)
{
    extract($data);

    if (file_exists($templateName)) {
        require $templateName;
    } else {
        echo "Извините, шаблон '$templateName' не существует.";
        die;
    }
}

function getLanguage()
{
    $availableLanguages = [
        LANG_EN,
        LANG_RU
    ];
    $lang = 'ru';
    if (!empty($_GET['lang']) && in_array($_GET['lang'], $availableLanguages)) {
        $lang = $_GET['lang'];
    }

    if ($lang == LANG_EN) {
        echo 'Hi guy!';
    }

    return $lang;
}

