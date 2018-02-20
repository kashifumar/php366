<?php

class ParentA{
    //inherit in child class
    //visible outside of the class // directly accessible outside of the class
    public $public_data;//both yes
    private $private_data;//both no
    protected $protected_data;//only inherit
    
    public static $public_sdata;
    
    public function testP(){
        echo("TestP of Parent Called<br>");
    }
    
    //cannot over-ride
    public final function test_finalP(){
        echo("TestfinalP of Parent Called<br>");
    }
    
    public static function test_staticP(){
        echo("TestStaticP of Parent Called<br>");
    }        
}

class ChildA extends ParentA{
    
    public function display(){
        ChildA::$public_sdata;
        ChildA::test_staticP();
        
        self::$public_sdata;
        self::test_staticP();
    }
/*    
    public final function test_finalP(){
        echo("TestfinalP of CHild Called<br>");
    }
  */  
    
    //redifne a function inherited from parent class
//    method overriding
    public function testP() {
        echo("TestP of child called<br>");
    }
    
    
}

$p = new ParentA();
$c = new ChildA();

$c->testP();

ChildA::test_staticP();














?>