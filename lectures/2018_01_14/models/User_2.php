<?php
class User {
    //put your code here
    public $email;
    public $user_name;
    public $password;
    public $first_name;
}

//create an object of class User
//instatiate an object of class User 
$obj_user = new User();
$obj_user1 = new User();
$user1 = [];
$user2 = [];
$user3 = [];
$user4 = [];

echo("<pre>");
print_r($obj_user);
echo("</pre>");


die;
$user1['user_name'] = "123456";
$obj_user->user_name = "123456";
echo("User Name - $obj_user->user_name<br>");

$obj_user->password = "123456";
echo("Password - $obj_user->password<br>");


$obj_user->email = "123456";
echo("Email - $obj_user->email<br>");


?>