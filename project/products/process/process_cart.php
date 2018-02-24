<?php

session_start();
require_once '../../models/Cart.php';

if (isset($_SESSION['obj_cart'])) {
    $obj_cart = unserialize($_SESSION['obj_cart']);
} else {
    $obj_cart = new Cart();
}

if (isset($_POST['action'])) {

    switch ($_POST['action']) {
        case "add_to_cart":
//            $item = new Item();
//            $item->item_id = $_POST['product_id'];
//            $item->quantity = 1;
            
//            $item = ['item_id'=>$_POST['product_id'], 'quantity'=>1];
            
//            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
//            $item = new Item("sss", -1);

            $quantity = $_POST['quantity'] ?? 1;
            $item = new Item($_POST['product_id'], $quantity);
            $obj_cart->add_to_cart($item);

            break;
    }
}


$_SESSION['obj_cart'] = serialize($obj_cart);

header("Location:" . $_SERVER['HTTP_REFERER']);
?>