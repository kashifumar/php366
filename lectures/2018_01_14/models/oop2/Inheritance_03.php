<?php

final class ParentA{
    private $private_data;
    
    public function testP(){
        echo("TestP of Parent Called<br>");
    }    
}

class ChildA extends ParentA{
    
}




?>