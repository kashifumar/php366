<?php
require_once 'views/header.php';
require_once 'views/banner.php';
require_once 'views/slider.php';
require_once 'views/middle_left.php';

?>

<!-- +++++++++++++++++++++++++++++++++++++ -->                

<h1>
<?php
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo($msg);
    unset($_SESSION['msg']);
//   $email = $_SESSION['email'];
//    echo("<br>$email");
     
}
?>
    
</h1>

<!-- +++++++++++++++++++++++++++++++++++++ -->                
<?php
require_once 'views/footer.php';

?>
