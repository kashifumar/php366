<?php
/*
$num1 = 10;
$num2 = 10;
*/
/*
$num1 = 10;
$num2 = 0;
*/

/*
$num1 = 10;
$num2 = "abc";
*/

$num1 = 10;
$num2 = "10";


/*
$num1 = 0;
$num2 = "abc";
*/

/*
When a string is compared with a number, PHP automatically (implicitly) converts (type-cast) it into a number
if that was a numeric string, the conversion is ok
if that was an alpha-numeric string, it converts the string to 0
*/

//logical operations
//if($num1 == $num2)
//identity
if($num1 === $num2)
{

	echo($num1 . " and " . $num2 . " are same");
}
else{
	echo($num1 . " and " . $num2 . " are different");
}




?>