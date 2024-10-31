<?php
// полиндром


echo isPalindrome('abbbba'). "\n";
echo isPalindrome('aa'). "\n";
echo isPalindrome('a'). "\n";
echo isPalindrome('aaa'). "\n";
echo isPalindrome('bbaab'). "\n"; // false

function isPalindrome(string $string): int
{
$left = 0;
$right = strlen($string)-1;

$result = true;

for ($i=0; $i < round( strlen($string)); $i++) {
if ($left >= $right) {
return 1;
}

if ($string[$left] != $string[$right]) {
return 0;
}
$left++;
$right--;
}

return (int)$result;
}