<?php

function isPost()
{
    return !empty($_POST);
}

function getParamPost($name, $defaultValue = null)
{
    return !empty($_POST[$name]) ? $_POST[$name] : $defaultValue;
}

function getParamGet($name, $defaultValue = null)
{
    return !empty($_GET[$name]) ? $_GET[$name] : $defaultValue;
}

function uploadFile($fieldName)
{
    $allowedExt = ['jpg', 'gif', 'png'];
    $uploadsDir = __DIR__ . '/uploads/';
    $tmpName = $_FILES[$fieldName]['tmp_name'];
    $clientFileName = $_FILES[$fieldName]['name'];
    $ext = substr($clientFileName, strrpos($clientFileName, '.') + 1);
    // Если размер 0 - то это не картинка
    if(!getimagesize($tmpName)) {
        return false;
    }

    if (!in_array($ext, $allowedExt)) {
        return false;
    }
    $newFileName = md5(uniqid($clientFileName, true)) . ".$ext";
    if(move_uploaded_file($tmpName, $uploadsDir . $newFileName)) {
        return $newFileName;
    } else {
        return false;
    }
}