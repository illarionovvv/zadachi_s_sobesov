<?php


$map = [
    ['_', '_', '_', '_', '_'],
    ['X', 'X', 'X', '_', '_'],
    ['_', '_', 'X', '_', '_'],
    ['X', '_', 'X', '_', 'X'],
    ['_', 'X', '_', '_', '_'],
];
$visited = [];
var_export(pathExists($map, 0, 0, 4, 4, $visited)); // True
printPath($visited, 4, 4);
// var_export(pathExists($map, 0, 0, 2, 1, $visited)); // False
// printPath($visited, 2, 1);

/**
 * 11X_
 * 11X_
 * 11X_
 * 11X_
 **/
function pathExists($map, $x1, $y1, $x2, $y2, &$visited = [], $pathCount = 0)
{
    $n = count($map);
    $m = count($map[0]);
    $result = false;

    if (empty($visited[$x1])) {
        $visited[$x1] = [];
    }

    $visited[$x1][$y1] = $pathCount + 1;

    if ($x1 == $x2 && $y1 == $y2) {
        return true;
    }

    if ($x1 + 1 < $n && $map[$x1 + 1][$y1] == '_' && empty($visited[$x1 + 1][$y1])) {
        $result = pathExists($map, $x1 + 1, $y1, $x2, $y2, $visited, $pathCount + 1);
    }
    if (!$result && ($y1 + 1) < $m && $map[$x1][$y1 + 1] == '_' && empty($visited[$x1][$y1 + 1])) {
        $result = pathExists($map, $x1, $y1 + 1, $x2, $y2, $visited, $pathCount + 1);
    }
    if (!$result && ($x1 - 1) >= 0 && $map[$x1 - 1][$y1] == '_' && empty($visited[$x1 - 1][$y1])) {
        $result = pathExists($map, $x1 - 1, $y1, $x2, $y2, $visited, $pathCount + 1);
    }
    if (!$result && ($y1 - 1) >= 0 && $map[$x1][$y1 - 1] == '_' && empty($visited[$x1][$y1 - 1])) {
        $result = pathExists($map, $x1, $y1 - 1, $x2, $y2, $visited, $pathCount + 1);
    }

    return $result;
}

function printPath($visited, $x2, $y2)
{
    // 0 1
    // 0 2
    // 1 2
    $length = $visited[$x2][$y2];

    for ($i = $length; $i > 0; $i--) {
        print $x2;
        print ',';
        print $y2 . PHP_EOL;

        if (isset($visited[$x2 - 1][$y2]) && ($visited[$x2 - 1][$y2] - $visited[$x2][$y2] == -1)) {
            $x2 = $x2 - 1;
            $y2 = $y2;
        } else if (isset($visited[$x2 + 1][$y2]) && ($visited[$x2 + 1][$y2] - $visited[$x2][$y2] == -1)) {
            $x2 = $x2 + 1;
            $y2 = $y2;
        } elseif (isset($visited[$x2][$y2 - 1]) && ($visited[$x2][$y2 - 1] - $visited[$x2][$y2] == -1)) {
            $x2 = $x2;
            $y2 = $y2 - 1;
        } elseif (isset($visited[$x2][$y2 + 1]) && ($visited[$x2][$y2 + 1] - $visited[$x2][$y2] == -1)) {
            $x2 = $x2;
            $y2 = $y2 + 1;
        }
    }

}