<?php
$data = "EVS Learning. EVS Lahore. EVS Pindi. EVS and Lahore. EVS Pakistan. EVS and Lahore";
//Regular Expression

$reg = "/EVS/";

//$result = preg_match($reg, $data);
//$matches = [];
//$result = preg_match($reg, $data, $matches);
//$result = preg_match($reg, $data, $matches,PREG_OFFSET_CAPTURE);
//$result = preg_match($reg, $data, $matches,PREG_OFFSET_CAPTURE,15);

//$result = preg_match_all($reg, $data);
//$result = preg_match_all($reg, $data,$matches);
//$result = preg_match_all($reg, $data,$matches, PREG_OFFSET_CAPTURE);
$result = preg_match_all($reg, $data,$matches, PREG_OFFSET_CAPTURE,15);

echo("Result - $result");
echo("<pre>");
print_r($matches);
echo("</pre>");









?>