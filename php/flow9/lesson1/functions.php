<?php
/**
 * Получает список анкет
 * @param array $filter Фильтр данных
 * @return array|mixed
 */
function getProfiles($filter)
{
    $filePath = __DIR__ . '/data.json';
    if (!file_exists($filePath)) {
        return [];
    }
    $fileData = file_get_contents($filePath);
    $profiles = json_decode($fileData, true);
    if (!$profiles) {
        return [];
    }

    foreach ($profiles as $i => $item) {
        if (!empty($filter['age'])) {
            if (!empty($filter['age']['min']) && $item['age'] < $filter['age']['min']) {
                unset($profiles[$i]);
                continue;
            }
            if (!empty($filter['age']['max']) && $item['age'] > $filter['age']['max']) {
                unset($profiles[$i]);
                continue;
            }
        }
    }

    return $profiles;
}

function getFilter($name)
{
    $input = isset($_GET[$name]) ? $_GET[$name] : '';
    $filterRaw = explode('-', $input);
    if(empty($filterRaw)) {
        return [];
    }
    if (count($filterRaw) == 1) {
        return ['age' => ['min' => $filterRaw[0]]];
    }

    return ['age' => ['min' => $filterRaw[0], 'max' => $filterRaw[1]]];
}