<?php

// Course sir ( people worthy horses { add entire ) suffer }. Painful so he an { comfort ( is ) manners } .
// How one dull get busy ) dare ( far. To things so denied admire.

echo parse('( people worthy horses { add entire ) suffer }. Painful so he an { comfort ( is ) manners }'); // false (({())
echo parse('( people worthy { horses ( add entire ) suffer }. Painful so he an { comfort ( is ) manners })'); // true ({})()

function parse(string $str): int
{
    $openedBrasses = [];
    $length = strlen($str);

    for ($i = 0; $i < $length; $i++) {
        if (in_array($str[$i], ['(', '{'])) {
            $openedBrasses[] = $str[$i];
        }

        if (in_array($str[$i], [')', '}'])) {
            if (empty($openedBrasses)) {
                return 0;
            }

            $lastCount = count($openedBrasses) - 1;
            $lastBrass = $openedBrasses[$lastCount] ?? null;

            if ($str[$i] == ')') {
                if ($lastBrass !== '(') {
                    var_dump('t');
                    return 0;
                }
                unset($openedBrasses[$lastCount]);
                $openedBrasses = array_values($openedBrasses);
            }

            if ($str[$i] == '}') {
                if ($lastBrass !== '{') {
                    var_dump('t2'. $lastBrass);
                    return 0;
                }
                unset($openedBrasses[$lastCount]);
                $openedBrasses = array_values($openedBrasses);
            }
        }
    }


    if (empty($openedBrasses)) {
        return 1;
    }

    return 0;
}