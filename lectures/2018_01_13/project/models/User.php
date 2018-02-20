<?php

class User {

    private $user_name;
    private $password;

    public function __construct() {
        echo("Construct called<br>");
    }
    public function __set($name, $value) {

//        $name = "user_name";
        $method_name = "set$name";
        if (!method_exists($this, $method_name)) {
            throw new Exception("SET: Property $name does not exist");
        }

        $this->$method_name($value);
    }

    public function __get($name) {
        $method = "get$name";
        if (!method_exists($this, $method)) {
            throw new Exception("GET: Property $name does not exist");
        }
        return $this->$method();
    }

    private function setUser_Name($user_name) {
        $reg = "/^[a-z][a-z0-9]{5,19}$/";
        if (!preg_match($reg, $user_name)) {

//            $ex = new Exception("*Invalid/Missing User Name");            
//            throw $ex;

            throw new Exception("*Invalid/Missing User Name");
        }
        $this->user_name = $user_name;
    }

    private function getUser_Name() {
        return $this->user_name;
    }

    public function login(){
        
    }
}

//create an object of class User
$obj_user = new User();
//die;

try {
    $obj_user->user_name = "ali123";
    echo("User Name : $obj_user->user_name<br>");
} catch (Exception $ex) {
    echo("MSg " . $ex->getMessage() . "<br>");
    echo("File " . $ex->getFile() . "<br>");
    echo("Line " . $ex->getLine() . "<br>");
}

?>