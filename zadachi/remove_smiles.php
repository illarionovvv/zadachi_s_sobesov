<?php

function removeSmileys(string $text): string
{
    $result = '';
    $length = strlen($text);

    for ($i = 0; $i < $length; $i++) {
        if ($i + 2 < $length && $text[$i] === ':' && $text[$i + 1] === '-') {
            if ($text[$i + 2] === ')') {
            // Пропускаем все последовательные ')'
                while ($i + 2 < $length && $text[$i + 2] === ')') {
                    $i++;
                }
                $i += 2; // Пропускаем сам смайлик ":-)"
            } // Если смайлик с открывающими скобками ":-("
            elseif ($text[$i + 2] === '(') {
            // Пропускаем все последовательные '('
                while ($i + 2 < $length && $text[$i + 2] === '(') {
                    $i++;
                }
                $i += 2; // Пропускаем сам смайлик ":-("
            } else {
                $result .= $text[$i];
            }
        } else {
            $result .= $text[$i];
        }
    }

    return $result;
}

// Пример использования:
$messages = [
    "Hi there :-)))",
    "hi :-) i'm tired:-(((",
    "lol:)",
    "Aaaaa!!!!! :-))((()"
];

foreach ($messages as $message) {
    echo removeSmileys($message) . "\n";
}