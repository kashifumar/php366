<?php
$num1 = 20;
$num2 = "10";

if(gettype($num1) == gettype($num2) && gettype($num1) == "integer")
{
	if($num1 == $num2)
	{
	
		echo($num1 . " and " . $num2 . " are same");
	}
	else{
		echo($num1 . " and " . $num2 . " are different");
	}
}
else{
	echo("Invalid Data Type");
}



?>