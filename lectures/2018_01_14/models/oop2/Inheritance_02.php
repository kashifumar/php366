<?php

abstract class ParentA{
    private $private_data;
    
    public function testP(){
        echo("TestP of Parent Called<br>");
    }
    
    public abstract function test_finalP();
    public abstract function test_finalP2();
    public abstract function test_finalP3();
    public abstract function test_finalP4();
}

class ChildA extends ParentA{
    
    public function test_finalP() {
        
    }

    public function test_finalP2() {
        
    }

    public function test_finalP3() {
        
    }

    public function test_finalP4() {
        
    }

}

$p = new ParentA();














?>