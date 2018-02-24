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
try {
    
//        $top_products = Product::get_products(0, 3,"top");
//        $new_products = Product::get_products(0, 3, "new");
//
    
//    $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
    $offset = $_GET['offset'] ?? 0;
    $count = $_GET['count'] ?? ITEM_PER_PAGE;
    $type = isset($_GET['type']) ? $_GET['type'] : "all";
    $brand = isset($_GET['brand']) ? $_GET['brand'] : "all";
    $products = Product::get_products($offset, $count, $type, $order, $brand);
    foreach ($products as $p) {
        echo("<div class='product'>
            <div class='product-image'>
            <a href='" . BASE_URL . "products/product_detail.php?product_id=$p->id' target='_blank'><img src='" . BASE_URL . "products/catalog/$p->name/$p->image' alt='$p->name' title='Click here to view details' /></a></div>
            <div class='product-title'>$p->name</div>
            <div class='view-count'>$p->view_count views</div>
            <div class='product-price'>$ $p->unit_price</div>
            <div class='spacer11pxH'></div>
            <div class='add-to-cart-box'>
                <form action='" . BASE_URL . "products/process/process_cart.php' method='post'>
                    <input type='hidden' name='action' value='add_to_cart' />
                    <input type='hidden' name='product_id' value='$p->id' />
                    <input type='submit' value='Add to Cart - ' />
                </form>
            </div>
        </div>");
    }
    echo("<div style='clear:both;'></div>");
    $page_nums = Product::pagination(ITEM_PER_PAGE, $brand);
    echo("<div id='pages'>");
    foreach($page_nums as $pNo=>$offset){
        echo("<a href='" . BASE_URL . "products/products.php?offset=$offset&type=$type&order=$order&brand=$brand'>$pNo</a> - ");
    }
    echo("</div>");
} catch (Exception $ex) {
    echo($ex->getMessage());
}
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    

<?php
require_once '../views/footer.php';
