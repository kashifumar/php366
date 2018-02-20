<?php
	$data = 20;
	//variabale defined oustide the function has a global scope
	//it is called global variable
	//normally it is available inside of the function in mostly languages
	//but in PHP it is not implicitly available in local scope
	//explicitly we have to make it available by using the global keyword


function display(){
	global $data;
	echo("Value of data inside function is $data<br>");
	$data = 100;
}

display();
	echo("Value of data outside function is $data<br>");









?>