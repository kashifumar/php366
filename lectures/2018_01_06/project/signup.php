<?php
require_once 'views/header.php';
//require_once 'views/banner.php';
//require_once 'views/slider.php';
require_once 'views/middle_left.php';

?>

<!-- +++++++++++++++++++++++++++++++++++++ -->                

<div id="form-container">
<?php
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo("<div><strong>$msg</strong></div>");
    unset($_SESSION['msg']);
}
?>

    <div id="heading-row">Sign Up</div>

    <form action="process/process_signup.php" method="post" id="signup-form">

    <div class="row">
        <div class="cell cell-left">Email</div>
        <div class="cell cell-right">
            <input type="text" id="email" name="email" value="" placeholder="Email"  >            
            <span class="field-msg"></span>
        </div>
        <div class="clear-box"></div>
    </div>

    <div class="row">
        <div class="cell cell-left">User Name</div>
        <div class="cell cell-right">
            <input type="text" id="user_name" name="user_name" value="" placeholder="User Name"  >
            <span class="field-msg"></span>
        </div>
        <div class="clear-box"></div>
    </div>

    <div class="row">
        <div class="cell cell-left">Password</div>
        <div class="cell cell-right">
            <input type="password" id="password" name="password" value="" placeholder="Password"  >
            <span class="field-msg"></span>
        </div>
        <div class="clear-box"></div>
    </div>

    <div class="row">
        <div class="cell cell-left">
            <div class="cell cell-right"><a href="#">Login</a></div>
        </div>
        <div class="cell cell-right">
            <input type="submit" value="Register" >
        </div>
        <div class="clear-box"></div>
    </div>

    </form>

</div>

<!-- +++++++++++++++++++++++++++++++++++++ -->                
<?php
require_once 'views/footer.php';

?>
