<?php
require_once 'DBTrait.php';
require_once 'User.php';
require_once 'Cart.php';
class Order {
    use DBTrait;
    public static function  place_order($obj_user, $obj_cart, $obj_contact){
        $obj_db = self::get_obj_db();
        //with $obj_user->id
        $query_insert_address = "";
        $obj_db->query($query_insert_address);
        $address_id = $obj_db->insert_id;
        $today = date("Y-m-d");
        $query_insert_order = "insert into orders "
                . " (id, user_id, order_date, order_status, address_id) "
                . " values "
                . " (NULL, $obj_user->id, '$today', 'pending', $address_id)";
        $obj_db->query($query_insert_order);
        $order_id = $obj_db->insert_id;
        
        foreach($obj_cart->items as $item){
            $query_insert_item = "INSERT INTO orderitems "
                    . " (id, order_id, product_id, unit_price, quantity) "
                    . " VALUES "
                    . " (NULL, $order_id, $item->item_id, $item->unit_price, $item->quantity);";
            $obj_db->query($query_insert_item);
        }
    }
    
    
}
