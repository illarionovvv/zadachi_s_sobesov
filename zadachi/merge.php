<?php

$A1 = [1, 9, 9];
$A2 = [2, 4, 6, 8];
merge($A1, $A2); // [1, 2, 4, 6, 8, 9, 9]


function merge($arr1, $arr2) {
    $count1 = count($arr1);
    $count2 = count($arr2);
    $output = [];
    $pos1 = 0;
    $pos2 = 0;

    for ($i = 0; $i < ($count1 + $count2); $i++) {
        if (empty($arr2[$pos2])) {
            $output[] = $arr1[$pos1];
            $pos1++;
        } elseif (empty($arr1[$pos1])) {
            $output[] = $arr2[$pos2];
            $pos2++;
        } elseif ($arr1[$pos1] >= $arr2[$pos2]) {
            $output[] = $arr2[$pos2];
            $pos2++;
        } else {
            $output[] = $arr1[$pos1];
            $pos1++;
        }
    }

    var_dump($output);

}