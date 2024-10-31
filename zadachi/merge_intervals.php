<?php declare(strict_types=1);

// мерж интервалов
function intervals_merge(array $intervals): array
{
    switch (count($intervals)) {
        case 0:
        case 1:
            $result = $intervals;
            break;

        case 2:
            [$a, $b] = $intervals;
            $merge = false;
            if ($a[0] >= $b[0] && $a[0] <= $b[1]) {
                $a[0] = $b[0];
                $merge = true;
            }
            if ($a[1] >= $b[0] && $a[1] <= $b[1]) {
                $a[1] = $b[1];
                $merge = true;
            }
            $result = $merge? [$a] : $intervals;
            break;

        default:
            $head = array_shift($intervals);
            $mergedIntervals = intervals_merge($intervals);
            $mergedIntervals[] = $head;
            $result = intervals_merge($mergedIntervals);
    }

    return $result;
}

function test(array $intervals): string
{
    return json_encode($intervals)
        . ' => ' . json_encode(intervals_merge($intervals));
}

echo test([]), "\n"; // []
echo test([[1, 2]]), "\n"; // [[1,2]]
echo test([[1, 2], [3, 4]]), "\n"; // [[1,2],[3,4]]
echo test([[2, 4], [1, 3]]), "\n"; // [[1,4]]
echo test([[1, 3], [5, 7], [2, 6]]), "\n"; // [[1,7]]
echo test([[6, 7], [6, 7], [6, 7]]), "\n"; // [[6,7]]
echo test([[5, 8], [1, 2], [4, 6]]), "\n"; // [[4,8],[1,2]]
echo test([[5, 8], [1, 2], [4, 6], [2, 4]]), "\n"; // [[1,8]]
echo test([[8, 8], [1, 2], [3, 3], [3, 8]]), "\n"; // [[3,8],[1,2]]