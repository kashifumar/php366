<?php
require_once '../models/User.php';
require_once '../views/header.php';
require_once '../views/middle_left.php';
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->
<div id="form-container">
<?php
//$user_id = $_GET['user_id'] ?? 0;
//$obj_user = new User();
//$obj_user->id = $user_id;

$obj_user->profile();

?>
    <div id="heading-row">MY Account</div>


        <div class="form-row">
            <div class="cell cell-left">
                <a href="<?php echo(BASE_URL);?>users/edit_account.php">Edit Account</a> - 
                <a href="<?php echo(BASE_URL);?>users/change_password.php">Change Password</a>
            </div>
            <div class="cell cell-right">
                <img src='<?php // echo($obj_user->profile_image);?>'>
            </div>
            <div class="clear-box"></div>
        </div>


        <div class="form-row">
            <div class="cell cell-left">First Name</div>
            <div class="cell cell-right">
                <?php echo($obj_user->first_name);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Middle Name</div>
            <div class="cell cell-right">
                <?php echo($obj_user->middle_name);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Last Name</div>
            <div class="cell cell-right">
                <?php echo($obj_user->last_name);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Email</div>
            <div class="cell cell-right">
                <?php echo($obj_user->email);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">User Name</div>
            <div class="cell cell-right">
                <?php echo($obj_user->user_name);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Contact Number</div>
            <div class="cell cell-right">
                <?php echo($obj_user->contact_number);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Gender : </div>
            <div class="cell cell-right">
                <?php echo($obj_user->gender);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Date Of Birth</div>
            <div class="cell cell-right">
                <?php echo($obj_user->date_of_birth);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Street Address</div>
            <div class="cell cell-right">
                <?php echo($obj_user->street_address);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>


        <div class="form-row">
            <div class="cell cell-left">City</div>
            <div class="cell cell-right">
                <?php echo($obj_user->city);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">State</div>
            <div class="cell cell-right">
                <?php echo($obj_user->state);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Country</div>
            <div class="cell cell-right">
                <?php echo($obj_user->country);?>
                <span class="field-msg"></span>
            </div>
            <div class="clear-box"></div>
        </div>        

</div>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->

<?php
require_once '../views/footer.php';
