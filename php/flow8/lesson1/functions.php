<?php


function getProfiles($filters = [])
{
    $data = file_get_contents(__DIR__ . '/data.json');
    $array = json_decode($data, true);
    $filteredData = applyFilter($array, $filters);
    return $filteredData;
}

function applyFilter($data, $filters)
{
    $resultData = [];
    foreach ($data as $i => $rowData) {
        foreach ($filters as $key => $row) {
            list($operator, $value) = $row;
            switch ($operator) {
                case '<':
                    if ($rowData[$key] < $value) {
                        $resultData[$i] = $rowData;
                        echo '<pre>';
                    }
                    continue 2;
                case '>':
                    if ($rowData[$key] > $value) {
                        $resultData[$i] = $rowData;
                    }
                    continue 2;
                case '=':
                    if ($rowData[$key] == $value) {
                        $resultData[$i] = $rowData;
                    }
                    continue 2;
            }
        }
    }

    return $resultData;
}