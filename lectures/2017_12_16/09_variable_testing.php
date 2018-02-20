<?php
$num1 = 20;
unset($num1);

if(isset($num1)){
	echo("num1 is $num1");
}

else{
	echo("Undefined variable \$num1");
}

?>