<?php
require_once 'User.php';
class Customer extends User {
    //put your code here
    
    protected function setFirst_Name(string $first_name) {
        $first_name = trim($first_name);
        if(!empty($first_name)){
            parent::setFirst_Name($first_name);
        }
        $this->first_name = $first_name;
    }
}
