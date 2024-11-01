<?php

// найти кол-во уникальных элементов

function uniqueCount(array $nums) : int {
    $counter = 0;
    $hasTable = [];

    foreach ($nums as $value) {
        if (isset($hasTable[$value])) {
            continue;
        }

        $hasTable[$value] = 1;
        $counter++;
    }

    return $counter;

}


echo uniqueCount([9, 6, 5, 1, 4, 2]). "\n";
echo uniqueCount([9, 6, 5, 1, 5, 2, 2]). "\n";
echo uniqueCount([3, 6, 1]). "\n";
