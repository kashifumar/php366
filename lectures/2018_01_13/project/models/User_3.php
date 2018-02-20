<?php

class User {

    //put your code here
    //data members, always private
    private $user_name;
    private $first_name;
    
    private $password;

    public function __set($name, $value) {
//        echo("Name - $name<br>"
//                . "Value - $value");
//        die;
        $method = "set$name";
        if (!method_exists($this, $method)) {
            throw new Exception("SET: Property $name does not exist");
        }
        $this->$method($value);
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
            throw new Exception("*Invalid/Missing User Name");
        }
        $this->user_name = $user_name;
    }

    private function getUser_Name() {
        return $this->user_name;
    }

    private function setFirst_Name($first_name) {
        $reg = "/^[a-z][a-z0-9]{5,19}$/";
        if (!preg_match($reg, $first_name)) {
            throw new Exception("*Invalid/Missing First Name");
        }
        $this->first_name = $first_name;
    }

    private function getFirst_Name() {
        return $this->first_name;
    }
    
}

//create an object of class User
//instatiate an object of class User 
$obj_user = new User();


try {
    $obj_user->user_name = "abc123";
    echo("User Name - $obj_user->user_name<br>");
} catch (Exception $ex) {
    echo("Msg - " . $ex->getMessage() . "<br>");
    echo("Line - " . $ex->getLine() . "<br>");
    echo("FIle - " . $ex->getFile() . "<br>");
}

echo("<br><hr>");
try {
    $obj_user->first_name = "123456";
    echo("First Name - $obj_user->first_name<br>");
} catch (Exception $ex) {
    echo("Msg - " . $ex->getMessage() . "<br>");
    echo("Line - " . $ex->getLine() . "<br>");
    echo("FIle - " . $ex->getFile() . "<br>");
}


?>