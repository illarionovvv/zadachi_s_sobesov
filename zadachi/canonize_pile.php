<?php

echo canonizePath('/dir/subdir/../file.txt'). "\n"; // /dir/file.txt
echo canonizePath('/dir/subdir/../../file.txt'). "\n"; // /file.txt
echo canonizePath('/dir/subdir/../../../file.txt'). "\n"; // /file.txt
echo canonizePath('/dir//file.txt'). "\n"; // /dir/file.txt
echo canonizePath('/dir/./file.txt'). "\n"; // /dir/file.txt
echo canonizePath('/dir/'). "\n"; // /dir

function canonizePath(string $path) {
$result = [];
$pathArray = explode('/', $path);

for ($i = 0; $i< count($pathArray); $i++ ) {
if (in_array($pathArray[$i], ['', '.'])) {
continue;
}

if ($pathArray[$i] == '..') {
unset($result[count($result) -1]);
continue;
}

$result[] = $pathArray[$i];

}

return '/'. implode('/', $result);
}