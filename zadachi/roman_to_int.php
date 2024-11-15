<?php

$s = "III"; // 3
$s = "LVIII"; // 58 L = 50, V= 5, III = 3.
$s = 'MCMXCIV'; // 1994  M = 1000, CM = 900, XC = 90 and IV = 4.

function romanToInt(string $s): int
{
    $result = 0;
    $romans = array(
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    );

    foreach ($romans as $key => $value) {
        while (strpos($s, $key) === 0) {
            $result += $value;
            $s = substr($s, strlen($key));
        }
    }
    return $result;
}

echo romanToInt($s);