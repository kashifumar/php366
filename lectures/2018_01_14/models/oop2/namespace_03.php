<?php
require_once 'namespace_01.php';
require_once 'namespace_02.php';

$t1 = new NS1\Test();
$t2 = new NS2\Test();

$t1->display();
$t2->display();
?>