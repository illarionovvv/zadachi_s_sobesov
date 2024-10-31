<?php

// Аннаграммы решение 1

$string1 = '10kjl11';
$string2 = 'jkl0111';

function isAnagram2(string $string1, string $string2): bool
{
    if (mb_strlen($string1) != mb_strlen($string2)) {
        return false;
    }

    $strlen = mb_strlen($string1);

    $strMap = [];
    $strMap2 = [];

    $array1 = mb_str_split($string1);
    $array2 = mb_str_split($string2);

    for ($i = 0; $i < $strlen; $i++) {
        $strMap[$array1[$i]] = isset($strMap[$array1[$i]]) ? $strMap[$array1[$i]]++ : 1;
        $strMap2[$array2[$i]] = isset($strMap2[$array2[$i]]) ? $strMap2[$array2[$i]]++ : 1;

    }

    foreach ($strMap as $key => $value) {

        if (!isset($strMap2[$key])) {
            return false;
        }

        if ($strMap[$key] != $strMap2[$key]) {
            return false;
        }
    }

    return true;
}

print_r((int)isAnagram2($string1, $string2));