<?php
require_once '../models/User.php';
require_once '../models/Location.php';
require_once '../views/header.php';
require_once '../views/middle_left.php';
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
<div id="form-container">    
    <form action="process/process_password.php" method="post">
        <?php
        if (isset($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];
            echo("<div><strong>$msg</strong></div>");
            unset($_SESSION['msg']);
        }
        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors'];
            unset($_SESSION['errors']);
        }
        ?>
        <div id="heading-row">Change Password</div>

        <div class="form-row">
            <div class="cell cell-left">New Password</div>
            <div class="cell cell-right">
                <input type="password" id="password" name="password" value="" placeholder="Password"  >
                <span class="field-msg">
                    <?php
                    if (isset($errors['password'])) {
                        echo($errors['password']);
                    }
                    ?>                

                </span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Re-type Password</div>
            <div class="cell cell-right">
                <input type="password" id="password2" name="password2" value="" placeholder="Re-type Password"  >
                <span class="field-msg">
                    <?php
                    if (isset($errors['password2'])) {
                        echo($errors['password2']);
                    }
                    ?>                

                </span>
            </div>
            <div class="clear-box"></div>
        </div>


        <div class="form-row">
            <div class="cell cell-left"><input type="submit" value="Update"></div>            
            <div class="clear-box"></div>
        </div>


    </form>
</div>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    

<?php
require_once '../views/footer.php';
