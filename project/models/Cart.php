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
        foreach ($this->items as $item) {
            $total += $item->quantity;
        }

        return $total;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->total;
        }

        return $total;
    }

    public function add_to_cart(Item $item) {
        if (array_key_exists($item->item_id, $this->items)) {
            $this->items[$item->item_id]->quantity += $item->quantity;
        } else {
            $this->items[$item->item_id] = $item;
        }
    }

    public function remove_item(Item $item) {
        if (array_key_exists($item->item_id, $this->items)) {
            unset($this->items[$item->item_id]);
        }
    }

    public function update_cart($qunatities) {
        foreach ($this->items as $item) {
            if (is_numeric($qunatities[$item->item_id])) {
                if ($qunatities[$item->item_id] > 0) {
                    $item->quantity = $qunatities[$item->item_id];
                }
                else if ($qunatities[$item->item_id] == 0){
                    $this->remove_item($item);
                }
            }
        }
    }

    public function empty_cart() {
        $this->items = [];
    }

}

?>