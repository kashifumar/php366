<?php
require_once 'models/User.php';
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
if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
/**
 * 2018_01_27
 
if(isset($_SESSION['obj_user'])){
    $obj_user = unserialize($_SESSION['obj_user']);
//    unset($_SESSION['obj_user']);
}
else{
    $obj_user = new User();
}
/**
 * 2018_01_27
 */

?>

    <div id="heading-row">Login</div>

    <form action="process/process_login.php" method="post" id="signup-form">


    <div class="form-row">
        <div class="cell cell-left">User Name</div>
        <div class="cell cell-right">
            <input type="text" id="user_name" name="user_name" value="<?php echo($obj_user->user_name);?>" placeholder="User Name"  >
            <span class="field-msg">
                <?php
                if(isset($errors['user_name'])){
                    echo($errors['user_name']);
                }
                ?>                
            </span>
        </div>
        <div class="clear-box"></div>
    </div>

    <div class="form-row">
        <div class="cell cell-left">Password</div>
        <div class="cell cell-right">
            <input type="password" id="password" name="password" value="" placeholder="Password"  >
            <span class="field-msg">
                <?php
                if(isset($errors['password'])){
                    echo($errors['password']);
                }
                ?>                
                
            </span>
        </div>
        <div class="clear-box"></div>
    </div>

    <div class="form-row">
        <div class="cell cell-left">
            <div class="cell cell-right">
                <input type="checkbox" id="remember" name="remember" value="remember"> Remember Me
            </div>
        </div>
        <div class="cell cell-right">
            <input type="submit" value="Login" >
        </div>
        <div class="clear-box"></div>
    </div>

    </form>

</div>

<!-- +++++++++++++++++++++++++++++++++++++ -->                
<?php
require_once 'views/footer.php';

?>
