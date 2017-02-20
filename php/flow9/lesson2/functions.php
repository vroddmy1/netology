<?php
define('FILE_DATA', __DIR__ . '/data.json');

function isPOST()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function getParam($name, $defaultValue = null)
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $defaultValue;
}

function setData($inputData)
{
    $data = getData();
    $data[] = $inputData;
    //array_push($data, $inputData);
    if(file_put_contents(FILE_DATA, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT))) {
        return true;
    } else {
        return false;
    }
}

function getLabel($name)
{
    $labels =  [
        'name' => 'Имя',
        'age' => 'Возраст',
    ];

    return isset($labels[$name]) ? $labels[$name] : $name;
}


function validateData($inputData)
{
    $rules = [
        'age' => ['min_range' => 10, 'max_range' => 100],
    ];
    $errors = [];
    foreach ($rules as $fieldName => $rule) {
        if (isset($inputData[$fieldName])) {
            $options = [
                'options' => [
                    'min_range' => $rule['min_range'],
                    'max_range' => $rule['max_range']
                ],
            ];
            if(filter_var($inputData[$fieldName], FILTER_VALIDATE_INT, $options) === false) {
                $message = sprintf(' должно быть числом от %d до %d', $rule['min_range'], $rule['max_range']);
                $errors[$fieldName] = $message;
            }
        }
    }

    return $errors;
}

function getInputValues($inputData)
{
    $defaultInputData = [
        'name' => '',
        'age' => '',
    ];

    return array_merge($defaultInputData, $inputData);
}

function getData()
{
    $data = [];
    if (file_exists(FILE_DATA)) {
        $data = json_decode(file_get_contents(FILE_DATA));
        if (!$data) {
            return [];
        }
    }
    return $data;
}