<?php

print (version_cmp("1.0.1", "1.0.0")) . "\n"; // -> 1
print(version_cmp("1.1.2", "1.12")) . "\n"; // -> -1
print(version_cmp("1.1.1", "1.1")) . "\n"; // -> 1
print(version_cmp("1.1", "1.1.1")) . "\n"; // -> -1
print(version_cmp("1.01", "1.1")) . "\n"; // -> 0
print(version_cmp("1.1.0", "1.1")) . "\n"; // -> 0
function version_cmp(string $str1, string $str2)
{
    $explodedString1 = explode('.', $str1);
    $explodedString2 = explode('.', $str2);

    $count2 = count($explodedString2);
    $count1 = count($explodedString1);


    $countMax = $count2 > $count1 ? $count2 : $count1;

    for ($j = 0; $j < $countMax; $j++) {
        $tmp1 = (isset($explodedString1[$j])) ? (int)$explodedString1[$j] : 0;
        $tmp2 = (isset($explodedString2[$j])) ? (int)$explodedString2[$j] : 0;

        if ($tmp1 > $tmp2) {
            return 1;
        }

        if ($tmp1 < $tmp2) {
            return -1;
        }
    }

    return 0;

}