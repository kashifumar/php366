<?php
/*
name
starts with alphabet
only contains alphabets
atleast 1 alphabet
first alphabet is capital
remaining are small
 * 
 */
$data = "Ali";
$reg = "/^[A-Z][a-z]*$/";
$result = preg_match($reg, $data, $matches,PREG_OFFSET_CAPTURE);
echo("Result - $result");
echo("<pre>");
print_r($matches);
echo("</pre>");
