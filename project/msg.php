<?php
require_once 'models/Cart.php';
require_once 'models/Brand.php';
require_once 'models/User.php';
require_once 'views/header.php';
//require_once 'views/banner.php';
//require_once 'views/slider.php';
require_once 'views/middle_left.php';

?>

<!-- +++++++++++++++++++++++++++++++++++++ -->                

<h1>
<?php
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo("$msg<br><hr>");
    unset($_SESSION['msg']);
//   $email = $_SESSION['email'];
//    echo("<br>$email");
     
}
if(isset($_SESSION['msg_acc'])){
    $msg_acc = $_SESSION['msg_acc'];
    echo("$msg_acc<br><hr>");
    unset($_SESSION['msg_acc']);
     
}
?>
    
</h1>

<!-- +++++++++++++++++++++++++++++++++++++ -->                
<?php
require_once 'views/footer.php';

?>
