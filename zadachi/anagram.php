<?php

// Аннаграммы решение 1

$string1 = '10kjl11';
$string2 = 'jkl0111';


function isAnagram(string $string1, string $string2): bool
{
    if (mb_strlen($string1) != mb_strlen($string2)) {
        return false;
    }

    $strlen = mb_strlen($string1);
    $stringSorted1 = mb_str_split($string1);
    $stringSorted2 = mb_str_split($string2);

    sort($stringSorted1);
    sort($stringSorted2);

    for ($i = 0; $i < $strlen; $i++) {
        if ($stringSorted1[$i] != $stringSorted2[$i]) {
            return false;
        }
    }

    return true;
}

print_r(' first result ' . (int)isAnagram($string1, $string2));
