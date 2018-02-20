<?php

$num1 = 20;
$num2 = 10;
$result = $num1 + $num2;

//echo($result);
/**/
#
//$output = $num1 + " add " + $num2 + " = " + $result;
/*
When a string is used in a numeric operation, PHP automatically (implicitly) converts (type-cast) it into a number
if that was a numeric string, the conversion is ok
if that was an alpha-numeric string, it converts the string to 0
*/
$output = $num1 . " + " . $num2 . " = " . $result;
echo($output);



?>