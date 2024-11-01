<?php
/*
 Реализовать функцию,
которая принимает на вход массив интов первым параметром и один инт вторым.
Нужно вернуть два индекса элементов из массива, которые в сумме дают второй аргумент.
По условию гарантируется, что такая пара чисел точно есть, и она одна.
Но лучше задавать наводящие вопросы интервьюеру
*/

$ar = [3, 0, 1, 5];
$ar = [3, 0, 2, 6, 1, 5, 4];
$sum = 4;
// filter all bigger

function getSum(array $nums, int $sum): array {
    $knownMembers = [];

    foreach ($nums as $position => $value) {
        $secondMember = $sum - $value;

        if (isset($knownMembers[$secondMember])) {
            return [$position, $knownMembers[$secondMember]];
        }

        $knownMembers[$value] = $position;
    }

    return [];
}

var_dump(getSum($ar, $sum));

// хеш таблица наоборот тут делается всего один проход по массиву N