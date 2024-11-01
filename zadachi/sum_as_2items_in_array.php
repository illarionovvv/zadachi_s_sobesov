<?php
/*
 Реализовать функцию,
которая принимает на вход массив интов первым параметром и один инт вторым.
Нужно вернуть два индекса элементов из массива, которые в сумме дают второй аргумент.
По условию гарантируется, что такая пара чисел точно есть, и она одна.
Но лучше задавать наводящие вопросы интервьюеру
*/

$ar = [3, 0, 1, 5];
$sum = 4;
// filter all bigger

function main(array $input, int $sum): ?array
{
    foreach ($input as $key => $value) {
        $nextIndex = findValue($input, $key, $sum);
        if ($nextIndex) {
            return [$key, $nextIndex];
        }
    }

    return null;
}

function findValue(array $in, $key, $sum): ?int
{
    $current = $in[$key];
    for ($i = ($key + 1); $i < count($in); $i++) {
        if ($sum == ($current + $in[$i])) {
            return $i;
        }
    }

    return null;
}

var_dump(main($ar, $sum));

//тут в худшем случае  n + (n -1) + (n-2 ) + ..   =   N*(N–1)/2 что в целом N*N/2