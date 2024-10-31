<?php

/***
 * Расстояние Левенштейна - это минимальное количество вставок, замен и удалений символов, необходимое для преобразования str1 в str2.
 * Сложность алгоритма равна O(m*n), где n и m - длины строк str1 и str2 (неплохо по сравнению с similar_text(),
 * имеющей сложность O(max(n,m)**3), но все же довольно много).
 *
 * В простейшей форме функция принимает в качестве аргументов две строки и возвращает минимальное количество вставок
 *
 * cats cat cast
 */

function distance($source, $dest) {
    if ($source == $dest) {
        return 0;
    }

    list($slen, $dlen) = [strlen($source), strlen($dest)];

    if ($slen == 0 || $dlen == 0) {
        return $dlen ? $dlen : $slen;
    }

    $dist = range(0, $dlen);

    for ($i = 0; $i < $slen; $i++) {
        $_dist = [$i + 1];
        for ($j = 0; $j < $dlen; $j++) {
            $cost = ($source[$i] == $dest[$j]) ? 0 : 1;
            $_dist[$j + 1] = min(
                $dist[$j + 1] + 1,   // deletion
                $_dist[$j] + 1,      // insertion
                $dist[$j] + $cost    // substitution
            );
        }
        $dist = $_dist;
    }

    return $dist[$dlen];
}

$source = 'PHP';
$dest = 'new PHP test';

echo distance($source, $dest) . "\n";
echo levenshtein($source, $dest); // built-in PHP function