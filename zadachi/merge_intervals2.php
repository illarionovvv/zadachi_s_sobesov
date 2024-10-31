<?php

/**
 * php -f ./merge_intervals2.php
 */
// мерж интервалов

echo mergeIntervals([]), "\n"; // []
echo mergeIntervals([[1, 2]]), "\n"; // [[1,2]]
echo mergeIntervals([[1, 2], [3, 4]]), "\n"; // [[1,2],[3,4]]
echo mergeIntervals([[2, 4], [1, 3]]), "\n"; // [[1,4]]
echo mergeIntervals([[1, 3], [5, 7], [2, 6]]), "\n"; // [[1,7]]
echo mergeIntervals([[6, 7], [6, 7], [6, 7]]), "\n"; // [[6,7]]
echo mergeIntervals([[5, 8], [1, 2], [4, 6]]), "\n"; // [[4,8],[1,2]]
echo mergeIntervals([[5, 8], [1, 2], [4, 6], [2, 4]]), "\n"; // [[1,8]]
echo mergeIntervals([[8, 8], [1, 2], [3, 3], [3, 8]]), "\n"; // [[3,8],[1,2]]


function mergeIntervals(array $arrays): string
{

    if (count($arrays) < 2) {
        return arrayToString($arrays). ' => '. arrayToString($arrays);
    }
    $result = [];

    array_multisort($arrays);


    $counter = 0;
    $tmp1 = $arrays[$counter];

    while (true) {
        $counter++;
        $tmp2 = $arrays[$counter] ?? null;

        if (!$tmp2) {
            if ($tmp1) {
                $result[] = $tmp1;
            }
            break;
        }



        if ($tmp1[1] >= $tmp2[0]) {
            $tmp1 = [$tmp1[0], $tmp2[1]];
        } else {
            $result[] = $tmp1;
            $tmp1 = $tmp2;
        }


    }

    return arrayToString($arrays). ' => '. arrayToString($result);
}

/**
 * @param array[] $array
 * @return string
 */
function arrayToString(array $array): string {
    $result = '';
    foreach ($array as $value) {
        $result .= "[" . implode("][", $value). "] ";
    }
    return $result;
}
