<?php


function display(){
	$data = 20;
	//variabale defined inside teh function has a local scope
	//it is called local variable
	//it is never available outside of teh function in any language
	echo("Value of data inside function is $data<br>");
}

display();
	echo("Value of data outside function is $data<br>");









?>