<?php

/**
 * Дан массив целых положительных чисел, нужно найти подотрезок с заданной суммой target, либо сказать, что это невозможно.
 *
 * @param array $nums
 * @param int $target
 * @return int[]
 */
function findTargetSum(array $nums, int $target) : array {
    $start =0;
    $end = 0;
    $windowSum = 0;

    while ($end < count($nums)) {
        $windowSum += $nums[$end];
        $end++;

        while ($windowSum > $target && $start < $end) {
            $windowSum -= $nums[$start];
            $start++;
        }

        if ($windowSum == $target) {
            return [$start, $end - 1];
        }
    }
    return [-1, -1];
}


echo implode(' ', findTargetSum([9, 6, 5, 1, 4, 2], 10)). "\n"; // [2 4]
echo implode(' ', findTargetSum([9, 6, 5, 1, 5, 2], 10)). "\n"; // [-1 -1]
echo implode(' ', findTargetSum([3, 6, 1], 10)). "\n"; // [0, 2]
