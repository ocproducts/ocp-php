<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('ocproducts.type_strictness', '1');

file_get_contents('configure'); // should fail due to relative path
file_get_contents(getcwd() . '/configure'); // should not fail

file_put_contents(getcwd() . '/tmp_test', '');
unlink(getcwd() . '/tmp_test');
var_dump($_CREATED_FILES); // Expect to see tmp_test
