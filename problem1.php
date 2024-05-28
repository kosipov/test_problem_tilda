<?php
const MAX_VALUE = 100;

$currentValue = 1;
$levelCount = 1;
$index = 0;

while ($currentValue <= MAX_VALUE) {
    print($currentValue);
    $index++;
    $currentValue++;

    if ($index === $levelCount) {
        $index = 0;
        $levelCount++;
        print("\n");
        continue;
    }

    print(" ");
}
