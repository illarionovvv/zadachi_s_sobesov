<?php

canonize_path('/dir/subdir/../file.txt'); // /dir/file.txt
canonize_path('/dir/subdir/../../file.txt'); // /file.txt
canonize_path('/dir/subdir/../../../file.txt'); // /file.txt
canonize_path('/dir//file.txt'); // /dir/file.txt
canonize_path('/dir/./file.txt'); // /dir/file.txt
canonize_path('/dir/'); // /dir


function canonize_path($path)
{

}