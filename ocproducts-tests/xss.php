<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('ocproducts.xss_detect', '1');

$x = '';
$y = 'a';
$x .= $y;
echo $x; // should succeed

echo 'test'; // should succeed
echo "\n"; // (just to make output tidier)

echo chr(ord('a')); // should fail
echo "\n"; // (just to make output tidier)

print('hello'); // should succeed
echo "\n"; // (just to make output tidier)

print(chr(ord('b'))); // should fail
echo "\n"; // (just to make output tidier)

var_dump(array(chr(ord('c')))); // should succeed, var_dump is assumed HTML-safe
echo "\n"; // (just to make output tidier)

print_r(array(chr(ord('d')))); // should fail
echo "\n"; // (just to make output tidier)

print('foo' . 'bar'); // should succeed
echo "\n"; // (just to make output tidier)

$x = chr(ord('d'));
var_dump(ocp_is_escaped($x)); // should say false
print('foo' . $x); // should fail
echo "\n"; // (just to make output tidier)

$x = chr(ord('e'));
ocp_mark_as_escaped($x);
var_dump(ocp_is_escaped($x)); // should say true
print('foo' . $x); // should succeed
echo "\n"; // (just to make output tidier)

$x = htmlentities(chr(ord('f')));
print('foo' . $x); // should succeed
echo "\n"; // (just to make output tidier)

$x = htmlspecialchars(chr(ord('g')));
print('foo' . $x); // should succeed
echo "\n"; // (just to make output tidier)

$x = ord('h');
print('foo' . $x); // should succeed (strings coming from numbers are auto-escaped)
echo "\n"; // (just to make output tidier)

$a = 'aaa';
$b = 'bbb';
echo $a . $b; // should succeed
echo "\n"; // (just to make output tidier)

$x = 'aaa';
$x .= 'bbb';
echo $x; // should succeed
echo "\n"; // (just to make output tidier)

ob_start();
echo htmlspecialchars(chr(ord('g'))); // should succeed
ob_end_flush();
echo "\n"; // (just to make output tidier)

ob_start();
echo chr(ord('g')); // should fail
ob_end_flush();
echo "\n"; // (just to make output tidier)

ob_start();
echo "xxx";
$x = ob_get_contents();
ob_end_clean();
echo $x; // should succeed
echo "\n"; // (just to make output tidier)

$foo = $_SERVER['argv'][0];
echo $foo; // should fail

$whatever = htmlentities($foo);
echo $foo; // should fail

$bar = str_replace('xxxxxx', 'xxxxxx', $foo);
ocp_mark_as_escaped($foo);
echo $bar; // should fail
