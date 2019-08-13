<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

intval('abc'); // Should not fail

ini_set('ocproducts.type_strictness', '1');

strlen('xxx'); // Should work
echo "\n";

echo strval(3); // Should work
echo "\n";

$a = '';
$b = 1;
$x = $a / $b; // Should fail
echo "\n";

strlen(1); // Should fail
echo "\n";

intval('abc'); // Should fail

$x = (int)'abc'; // Should fail

echo "Done\n";
