<?php
$data = 20;

function pass_by_value($data){
	echo("Value of data inside function is $data<br>");
	$data = 100;
}

//& ampersend / address operator
function pass_by_reference(&$data){
	echo("Value of data inside function is $data<br>");
	$data = 100;
}

//pass_by_value($data);
pass_by_reference($data);
echo("Value of data outside function is $data<br>");









?>