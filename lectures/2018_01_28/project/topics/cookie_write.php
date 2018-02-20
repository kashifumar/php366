<?php
$expire = time() + (60*60*24*15);

setcookie("php366a");

setcookie("php366b", "aaa");
setcookie("php366c", "sss",$expire);
setcookie("php366d", "sss",$expire, "/");
setcookie("php366e", "sss",$expire, "/evs/php366/project/process");

/*
setcookie("php366f", "sss",$expire, "/", "www.ProgrammerPlusPlus.com");
setcookie("php366g", "sss",$expire, "/", "ProgrammerPlusPlus.com");
setcookie("php366h", "sss",$expire, "/", "ProgrammerPlusPlus.com", TRUE);
 * 
 */
?>