<?php

canonizePath('/dir/subdir/../file.txt'); // /dir/file.txt
canonizePath('/dir/subdir/../../file.txt'); // /file.txt
canonizePath('/dir/subdir/../../../file.txt'); // /file.txt
canonizePath('/dir//file.txt'); // /dir/file.txt
canonizePath('/dir/./file.txt'); // /dir/file.txt
canonizePath('/dir/'); // /dir


function canonize_path($path)
{

}