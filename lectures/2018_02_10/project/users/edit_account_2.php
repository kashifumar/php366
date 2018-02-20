<?php
require_once '../models/User.php';
require_once '../models/Location.php';
require_once '../views/header.php';
require_once '../views/middle_left.php';
?>

<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->
<div id="form-container">
    <form action="process/process_profile.php" method="post" id="update_form">
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
$obj_user = new User();
$obj_user->id = 1;
$obj_user->profile();
//$obj_user = new User();
?>
        <span class="page-msg"></span>
    <div id="heading-row">Update Account</div>

        <div class="form-row">
            <div class="cell cell-left">First Name</div>
            <div class="cell cell-right">
                <input type="text" id="first_name" name="first_name" value="<?php echo($obj_user->first_name);?>" placeholder="First Name"  >
                <span class="field-msg">
                <?php
                if(isset($errors['first_name'])){
                    echo($errors['first_name']);
                }
                ?>
                </span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Middle Name</div>
            <div class="cell cell-right">
                <input type="text" id="middle_name" name="middle_name" value="<?php echo($obj_user->middle_name);?>" placeholder="Middle Name" >
                <span class="field-msg">
                <?php
                if(isset($errors['middle_name'])){
                    echo($errors['middle_name']);
                }
                ?>
                </span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Last Name</div>
            <div class="cell cell-right">
                <input type="text" id="last_name" name="last_name" value="<?php echo($obj_user->last_name);?>" placeholder="Last Name"  >
                <span class="field-msg">
                <?php
                if(isset($errors['last_name'])){
                    echo($errors['last_name']);
                }
                ?>
                </span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Contact Number</div>
            <div class="cell cell-right">
                <input type="text" id="contact_number" name="contact_number" value="<?php echo($obj_user->contact_number);?>" maxlength="16"   placeholder="Contact Number">
                <span class="field-msg">
                <?php
                if(isset($errors['contact_number'])){
                    echo($errors['contact_number']);
                }
                ?>
                </span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Gender : </div>
            <div class="cell cell-right">
                <?php
                $male = "";
                $female = "";
                if($obj_user->gender == "Male"){
                    $male = " checked ";
                }
                else if($obj_user->gender == "Female"){
                    $female = " checked ";
                }
                ?>
                Male <input type="radio" <?php echo($male);?> id="Male" name="gender" value="Male"> -
                Female <input type="radio" <?php echo($female);?> id="Female" name="gender" value="Female">
                <span class="field-msg">
                <?php
                if(isset($errors['gender'])){
                    echo($errors['gender']);
                }
                ?>
                </span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Date Of Birth</div>
            <div class="cell cell-right">
                <input type="text" id="date_of_birth" name="date_of_birth" value="<?php echo($obj_user->date_of_birth);?>" placeholder="dd-mm-YYYY">
                <span class="field-msg">
                <?php
                if(isset($errors['date_of_birth'])){
                    echo($errors['date_of_birth']);
                }
                ?>
                </span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row">
            <div class="cell cell-left">Street Address</div>
            <div class="cell cell-right">
                <textarea id="street_address" name="street_address" class="street_address"   placeholder="Street Address"><?php echo($obj_user->street_address);?></textarea>
                <span class="field-msg"
                <?php
                if(isset($errors['street_address'])){
                    echo($errors['street_address']);
                }
                ?>
                </span>
            </div>
            <div class="clear-box"></div>
        </div>

        <div class="form-row" style="z-index: 5000;">
                <div class="cell cell-left">Country</div>
                <div class="cell cell-right">
                    <select id="country_id" name="country_id" class="selectpicker" data-live-search="true">
                        <option value="">--Country--</option>
                    <?php
                    $obj_loc = new Location();
//                    $obj_loc2 = new Location();
//                    $countries = $obj_loc->get_countries();
                    $countries = Location::get_countries();
//                    $countries2 = $obj_loc2->get_countries();
                    foreach($countries as $c){
                        echo("<option value='$c->id'>$c->country_name</option>");
                    }
                    ?>
                    </select>
                    <span class="field-msg">
                <?php
                if(isset($errors['country_id'])){
                    echo($errors['country_id']);
                }
                ?>
                </span>
                </div>
                <div class="clear-box"></div>
            </div>

        <div class="form-row">
            <div class="cell cell-left">State</div>
            <div class="cell cell-right">
                <select id="state_id" name="state_id" class="selectpicker" data-live-search="true">
                    <option value="">--State--</option>
                </select>
                <span class="field-msg state_id">
                <?php
                if(isset($errors['state_id'])){
                    echo($errors['state_id']);
                }
                ?>
                </span>
            </div>
            <div class="clear-box"></div>
        </div>


        <div class="form-row">
            <div class="cell cell-left">City</div>
            <div class="cell cell-right">
                <select id="city_id" name="city_id" class="selectpicker" data-live-search="true">
                    <option value="">--City--</option>
                </select>
                <span class="field-msg">
                <?php
                if(isset($errors['city_id'])){
                    echo($errors['city_id']);
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

<script>
$("#country_id").change(function(e){
    var country_id = $("#country_id").val();
    if(country_id == ""){
        return;
    }

    var data = {};
    data['country_id'] = country_id;
    data['action'] = "get_states";
    $.ajax({
        url: "<?php echo(BASE_URL)?>users/process/get_location_data.php",
        type: 'POST',
        data: data,
        dataType: 'json',
        beforeSend: function (xhr) {
            $(".state_id").html("<img src='<?php echo(BASE_URL)?>images/ajax-loader.gif'>");
        },
        success: function (data, textStatus, jqXHR) {
            console.log("Success");
            console.log(data);
            console.log(textStatus);
            console.log(jqXHR);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            /*
            console.log("Error");
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            */
        },
        complete: function (jqXHR, textStatus ) {
            $(".state_id").html("");
            console.log("Complete");
            console.log(jqXHR);
            console.log(textStatus);
        }
    });

});

</script>
<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->






<?php
require_once '../views/footer.php';
