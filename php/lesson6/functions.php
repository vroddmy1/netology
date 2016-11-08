<?php

function getExt($fileName)
{
    return substr($fileName, strrpos($fileName, '.') + 1);
}

function uploadFile($inputFile, $fileName, $allowedExt = ['jpg', 'gif', 'png'])
{
    $uploadDir = 'files';
    if (isset($_FILES[$inputFile])) {

        $ext = getExt($_FILES[$inputFile]['name']);
        if (!in_array($ext, $allowedExt)) {
            return false;
        }

        $sourceFile = $_FILES[$inputFile]['tmp_name'];
        if (getimagesize($sourceFile) === false) {
            return false;
        }

        $fileName = "$fileName.$ext";
        $destinationFile = realpath(__DIR__ . "/$uploadDir") . '/' . $fileName;
        if(move_uploaded_file($sourceFile, $destinationFile)) {
            return "$uploadDir/$fileName";
        } else {
            return false;
        }
    }
}
