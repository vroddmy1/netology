<?php

function getQueryParam($name)
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}

/**
 * @param string $fieldName Имя поля формы
 * @param string $newName Новое имя загружаемого файла
 */
function uploadFile($fieldName, $newName)
{
    $newPath = __DIR__ . '/data';
    $tmpFile = $_FILES[$fieldName]['tmp_name'];
    if(!move_uploaded_file($tmpFile, $newPath . '/' . $newName)) {
       return false;
    } else {
        return true;
    }
}

function isPOST()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isGET()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function getUploadedFileClientName()
{
    return isset($_FILES['avatar']) ? $_FILES['avatar']['name'] : null;
}

function getUploadedFileNewName()
{
    return md5(getUploadedFileClientName()) . '.png';
}


function isAllowedExt($imageName)
{
    $allowedExt = ['png', 'jpg', 'jpeg'];
    if (!in_array(getExtFile($imageName), $allowedExt)) {
        return false;
    } else {
        return true;
    }
}

function getExtFile($fileName)
{
    return substr($fileName, strrpos($fileName, '.') + 1);
}