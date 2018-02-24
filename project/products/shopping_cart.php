<?php
require_once '../models/Cart.php';
require_once '../models/User.php';
require_once '../models/Brand.php';
require_once '../models/Product.php';
require_once '../views/header.php';
require_once '../views/middle_left.php';
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
<?php
//echo("<pre>");
//print_r($obj_cart->items);
//echo("</pre>");
//die;
if($obj_cart->items){
    echo("<table class='table-bordered col-xs-12 table-striped table-hover'>"
            . "<tr>"
            . "<th>X</th>"
            . "<th>Item Name</th>"
            . "<th>View Detail</th>"
            . "<th>Unit Price</th>"
            . "<th>Quantity</th>"
            . "<th>Total</th>"
            . "</tr>");

            foreach($obj_cart->items as $item){
            echo("<tr>"
            . "<td><a href='" . BASE_URL . "products/process/process_cart.php?action=remove_item&product_id=$item->item_id'>X</a></th>"
            . "<td>$item->item_name</td>"
            . "<td><a href='" . BASE_URL . "products/product_detail.php?product_id=$item->item_id' target='_blank'>View Detail</a></td>"
            . "<td>$item->unit_price</td>"
            . "<td>$item->quantity</td>"
            . "<td>$item->total</td>"
            . "</tr>");
                
            }

    echo("<tr>"
            . "<th>Shop More</th>"
            . "<th>Empty Cart</th>"
            . "<th>Update Cart</th>"
            . "<th>Check Out</th>"
            . "<th>TOTAL</th>"
            . "<th>$obj_cart->total</th>"
            . "</tr>"
            . "</table>");
}
else{
    echo("<h1>Your Cart Is Empty</h1>");
}
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    

<?php
require_once '../views/footer.php';
