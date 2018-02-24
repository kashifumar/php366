<?php
require_once 'DBTrait.php';
class Item {
    use DBTrait;
    private $item_id;
    private $quantity;
    
    public function __construct($item_id, $quantity = 1) {
        $this->setItem_id($item_id);
        $this->setQuantity($quantity);
    }
    
    public function __set($name, $value) {
        $method = "set$name";
        if (!method_exists($this, $method)) {
            throw new Exception("SET Property $name does not exist");
        }
        $this->$method($value);
    }

    public function __get($name) {
        $method = "get$name";
        if (!method_exists($this, $method)) {
            throw new Exception("GET Property $name does not exist");
        }
        return $this->$method();
    }

    public function setItem_id($item_id) {
        $this->item_id = $item_id;
    }
    
    public function getItem_id() {
        return $this->item_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    public function getQuantity() {
        return $this->quantity;
    }

    public function getItem_Name() {
        $query = "select name from products where id = $this->item_id";
//        echo($query);
//        die;
        $obj_db = self::get_obj_db();
        $result = $obj_db->query($query);
        $product = $result->fetch_object();
        return $product->name;
    }

    public function getUnit_Price() {
        $query = "select unit_price from products where id = $this->item_id";
//        echo($query);
//        die;
        $obj_db = self::get_obj_db();
        $result = $obj_db->query($query);
        $product = $result->fetch_object();
        return $product->unit_price;
        
    }

    public function getTotal() {
        $total = $this->quantity * $this->unit_price;
        return $total;
    }

}


?>