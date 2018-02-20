<?php

interface ParentIA {
    //put your code here
    public function test1(int $num1);
    public function test2(float $num2);
}

interface ParentIB {
    //put your code here
    public function test3(string $data) : string;
    public function test4(float $dbl) : int;
}

class ParentA{
    
    
}

trait DataBase{
    private function connection(){
        
    }
}


class CHildA extends ParentA implements ParentIA, ParentIB{
    
    use DataBase;
    
    public function test1(int $num1) {
        $this->connection();
    }

    public function test2(float $num2) {
        
    }

    public function test3(string $data): string {
        
    }

    public function test4(float $dbl): int {
        
    }

    public function test_finalP2() {
        
    }

    public function test_finalP3() {
        
    }

    public function test_finalP4() {
        
    }

}








