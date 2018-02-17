<?php
$data = "EVS Learning. EVS Lahore. EVS Pindi. EVS and Lahore. EVS Pakistan. EVS and Lahore";
//Regular Expression

$reg = "/ /";

//$result = preg_split($reg, $data);
//$result = preg_split($reg, $data,2);
//$result = preg_split($reg, $data,2,PREG_SPLIT_OFFSET_CAPTURE);
$result = preg_split($reg, $data,-1,PREG_SPLIT_OFFSET_CAPTURE);

echo("<pre>");
print_r($result);
echo("</pre>");

?>