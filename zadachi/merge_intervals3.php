<?php

merge_intervals([[1, 6], [5, 7], [9, 10], [8, 9]]); // -> [[1, 7], [8, 10]]
merge_intervals([[1, 3], [2, 6], [6, 10]]); // -> [[1, 10]]
merge_intervals([[2, 3], [4, 5], [6, 7], [1, 8]]); // -> [[1, 8]]
merge_intervals([[1, 4], [0, 4]]); // -> [[0, 4]]

function merge_intervals($array)
{
    usort($array, function ($a, $b) {
        return $a[0] > $b[0] ? 1 : -1;
    });
//var_dump($array);

    $mergedArray = array_reduce($array, function ($prev, $curr) {
        if (empty($prev)) {
            return [$curr];
        }

        $len = count($prev);
        $lastEl = $prev[$len - 1];
        if ($lastEl[1] >= $curr[0]) {
            $newEdge = $curr[1] > $lastEl[1] ? $curr[1] : $lastEl[1];

            $prev[$len - 1][1] = $newEdge;
        } else {
            $prev[] = $curr;
        }
        return $prev;
    }, []);

    var_dump($mergedArray);
}