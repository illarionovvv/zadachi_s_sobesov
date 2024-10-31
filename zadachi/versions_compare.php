<?php
/*
 Реализовать функцию, которая принимает две строки с номерами версий такого вида: 1.0.1, 1.1.8.
Функция должна возвращать true, если первая версия больше второй, и false в обратном случае.
Количество точек в версии может быть до бесконечности
*/

$str1 = '1.0.1.0.0.0.1';
$str2 = '1.0.1';

function compare($str1, $str2)
{
    $index1 = 0;
    $index2 = 0;
    $result = false;

    while (!$result && ($index1 !== null || $index2 !== null)) {
        list ($result, $index1, $index2) = compareSub($str1, $str2, $index1, $index2);
    }

    return $result;
}

function compareSub($str1, $str2, $index1, $index2): array
{
    $result = false;
    $isDigit1End = false;
    $isDigit2End = false;
    $digitNext1Counter = null;
    $digitNext2Counter = null;

    $digit1 = '';
    $digit2 = '';

    if ($index1 !== null) {
        while (!$isDigit1End) {
            if (isset($str1[$index1]) && is_numeric($str1[$index1])) {
                $digit1 .= (string)$str1[$index1];
                $index1++;
                $digitNext1Counter = $index1 + 1;
            } else {
                $isDigit1End = true;
            }
        }
    }
    if ($index2 !== null) {

        while (!$isDigit2End) {
            if (isset($str2[$index2]) && is_numeric($str2[$index2])) {
                $digit2 .= (string)$str2[$index2];
                $index2++;
                $digitNext2Counter = $index2 + 1;
            } else {
                $isDigit2End = true;
            }
        }
    }
    if ((int)$digit1 > (int)$digit2) {
        $result = true;
    }

    return [$result, $digitNext1Counter, $digitNext2Counter];
}


echo compare($str1, $str2);

// решил без рекурсии, рекурсия зло))
// тут сложность 2N максимальная