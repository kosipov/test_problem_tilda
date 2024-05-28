<?php

const ROWS_COUNT = 5;
const COL_COUNT = 7;

$array = createRandValuesArray();
$formattedArray = formatArray($array);
print($formattedArray);
print_r(findSumByCol($array));
print_r(findSumByRow($array));

function createRandValuesArray(): array
{
    $array = [];
    $randStart = 0;
    $randEnd = 10;
    $randStep = 10;

    for ($i = 0; $i < COL_COUNT; $i++) {
        $rowsArray = [];
        for ($j = 0; $j < ROWS_COUNT; $j++) {
            $rowsArray[] = random_int($randStart, $randEnd - 1);
            $randStart += $randStep;
            $randEnd += $randStep;
        }
        $array[] = $rowsArray;
    }

    return $array;
}

function formatArray(array $array): string
{
    $result = '';
    for ($i = 0; $i < ROWS_COUNT; $i++) {
        $currentValues = array_column($array, $i);
        $result .= implode(', ', $currentValues) . PHP_EOL;
    }

    return $result;
}

function findSumByCol(array $array): array
{
    return array_map(fn(array $col) => array_sum($col), $array);
}

function findSumByRow(array $array): array
{
    $result = [];

    for ($i = 0; $i < ROWS_COUNT; $i++) {
        $currentValues = array_column($array, $i);
        $result[] = array_sum($currentValues);
    }

    return $result;
}
