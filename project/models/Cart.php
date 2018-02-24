<?php
require_once 'Item.php';
class Cart {

    private $items;

    public function __construct() {
        $this->items = [];
    }

//    public function __set($name, $value) {
//        $method = "set$name";
//        if (!method_exists($this, $method)) {
//            throw new Exception("SET Property $name does not exist");
//        }
//        $this->$method($value);
//    }

    public function __get($name) {
        $method = "get$name";
        if (!method_exists($this, $method)) {
            throw new Exception("GET Property $name does not exist");
        }
        return $this->$method();
    }

    public function getItems() {
        return $this->items;
    }
    
    public function getCount() {
        $total = 0;
        foreach($this->items as $item){
            $total += $item->quantity;
        }
        
        return $total;
    }

    public function getTotal() {
        $total = 0;
        foreach($this->items as $item){
            $total += $item->total;
        }
        
        return $total;
    }

    public function add_to_cart(Item $item) {
        $this->items[] = $item;
    }

    public function remove_item(Item $item) {
        
    }

    public function update_cart($qunatities) {
        
    }

    public function empty_cart() {
        
    }

}

?>