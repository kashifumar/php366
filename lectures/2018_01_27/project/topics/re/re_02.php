<?php
$data = "EVS Learning. EVS Lahore. EVS Pindi. EVS and Lahore. EVS Pakistan. EVS and Lahore";
//Regular Expression

$reg = "/ /";
$rep = "-";

//$result = preg_replace($reg, $rep , $data);
$result = preg_replace($reg, $rep , $data,2);

echo($result);

?>