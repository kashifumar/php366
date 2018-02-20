<?php
require_once '../models/User.php';
require_once '../models/Location.php';
require_once '../views/header.php';
require_once '../views/middle_left.php';
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->    
<div id="form-container">    
    <form action="process/process_profile_image.php" method="post" enctype="multipart/form-data">
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
        
//$obj_user->profile();
$obj_user = new User();        
        ?>
        <div id="heading-row">Change Image</div>

        <div class="form-row">
            <div class="cell cell-left">Select Image</div>
            <div class="cell cell-right">
                <input type="file" id="profile_image" name="profile_image">
                <span class="field-msg">
                    <?php
                    if (isset($errors['profile_image'])) {
                        echo($errors['profile_image']);
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
