<?php
//define a function
//function definition
function test()	//signature
{
	//block/body/implementation
}

test();


function sum(int $num1, int $num2)
{
	$total = $num1 + $num2;
	echo($total);
}

//sum(20, 10);
//sum("ss", "aa");


function sum2(int $num1, int $num2) : int
{
	$total = $num1 + $num2;
	return $total;
	//return "ssss";
}

//$result = sum2(20, 10) + sum2(30, 40);
//echo(sum2(10, 20));


function login(string $user_name, string $password) : bool
{
	return TRUE;
}

login("ss", "ss");




































?>