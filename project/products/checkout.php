<?php
require_once '../models/Cart.php';
require_once '../models/Brand.php';
require_once '../models/Location.php';
require_once '../models/User.php';
require_once '../views/header.php';
require_once '../views/middle_left.php';

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

if(isset($_SESSION['obj_contact'])){
    $obj_contact = unserialize($_SESSION['obj_contact']);
}
else{
    $obj_contact = new User();
}

?>

    <div id="heading-row">Place Order</div>

    <form action="<?php echo(BASE_URL);?>products/process/process_order.php" method="post" id="order-form">


    <div class="form-row">
        <div class="cell cell-left">First Name</div>
        <div class="cell cell-right">
            <input type="text" id="firstName" name="firstName" value="" placeholder="First Name"  >
            <span class="field-msg"></span>
        </div>
        <div class="clear-box"></div>
    </div>

    <div class="form-row">
        <div class="cell cell-left">Middle Name</div>
        <div class="cell cell-right">
            <input type="text" id="middleName" name="middleName" value="" placeholder="Middle Name" >
            <span class="field-msg"></span>
        </div>
        <div class="clear-box"></div>
    </div>

    <div class="form-row">
        <div class="cell cell-left">Last Name</div>
        <div class="cell cell-right">
            <input type="text" id="lastName" name="lastName" value="" placeholder="Last Name"  >
            <span class="field-msg"></span>
        </div>
        <div class="clear-box"></div>
    </div>

    <div class="form-row">
        <div class="cell cell-left">Contact Number</div>
        <div class="cell cell-right">
            <input type="text" id="contactNumber" name="contactNumber" value="" maxlength="16"   placeholder="Contact Number">
            <span class="field-msg"></span>
        </div>
        <div class="clear-box"></div>
    </div>

    <div class="form-row">
        <div class="cell cell-left">Street Address</div>
        <div class="cell cell-right">
            <textarea id="streetAddress" name="streetAddress" class="street_address"   placeholder="Street Address"></textarea>
            <span class="field-msg"></span>
        </div>
        <div class="clear-box"></div>
    </div>

   <div class="form-row">
        <div class="cell cell-left">Country</div>
        <div class="cell cell-right">
                     <select id="country_id" name="country_id" class="selectpicker" data-live-search="true">
                        <option value="0">--Country--</option>
                    <?php
                    $obj_loc = new Location();
//                    $obj_loc2 = new Location();
//                    $countries = $obj_loc->get_countries();
                    $countries = Location::get_countries();
//                    $countries2 = $obj_loc2->get_countries();
                    foreach($countries as $c){
                        echo("<option value='$c->id' ");
                            if($c->id == $obj_user->country_id){
                                echo(" selected ");
                            }
                        
                        echo(">$c->country_name</option>");
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
                    <option value="0">--State--</option>
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
                    <option value="0">--City--</option>
                </select>
                <span class="field-msg city_id">
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
            <input type="submit" value="Place Order" >
        <div class="clear-box"></div>
    </div>

    </form>

</div>
<script>
//    https://www.sitepoint.com/use-jquerys-ajax-function/
$("#country_id").change(function(e){
    var country_id = $("#country_id").val();
    var state_id = <?php echo($obj_user->state_id);?>;
    if(country_id == ""){
        return;
    }
    $(".page-msg").html("");
    var data = {};
    data['country_id'] = country_id;
    data['action'] = "get_states";
//    console.log(data.action);
    $.ajax({
        url: "<?php echo(BASE_URL)?>users/process/get_location_data.php",
        type: 'POST',
        data: data,
        dataType: 'json',
        beforeSend: function (xhr) {
            $(".state_id").html("<img src='<?php echo(BASE_URL)?>images/ajax-loader.gif'>");
        },
        complete: function (jqXHR, textStatus ) {
            $(".state_id").html("");
//            console.log("Complete");
//            console.log(jqXHR);
//            console.log(textStatus);
            if(jqXHR.status == 200){
//                console.log(jqXHR);
                var result = jqXHR.responseText;
                result = $.parseJSON(result);
//                console.log(result.class);
                if(result.hasOwnProperty('success')){
                    
                    if(result.hasOwnProperty('states')){
                        var output = "<option value='0'>--State--</option>";
                        $.each(result.states, function(key, state){
                            output += "<option value='"+state.id+"' ";
                            if(state.id == state_id){
                                output += " selected " ;
                            }
                            output += " >"+state.state_name+"</option>";
                        });
                        $("#state_id").html(output);
                        $("#state_id").selectpicker("refresh");
                        $("#state_id").trigger("change");
                    }
                    else{
                        $(".page-msg").html("<h3 class='text-danger text-center'>States Key Missing</h3>");
                    }
                }
                else if(result.hasOwnProperty('error')){
                    $(".page-msg").html("<h3 class='text-danger text-center'>" + result.msg + "</h3>");
                }
                else{
                    $(".page-msg").html("<h3 class='text-danger text-center'>Conatct Support - MIssing Response Parameters</h3>");    
                }
            }
            else{
                $(".page-msg").html("<h3 class='text-danger text-center'>Conatct Support - " + jqXHR.status + "</h3>");
            }
        }
    });

});

$("#state_id").change(function(e){
    var state_id = $("#state_id").val();
    var city_id = <?php echo($obj_user->city_id);?>;
    if(state_id == ""){
        return;
    }
    $(".page-msg").html("");
    var data = {};
    data['state_id'] = state_id;
    data['action'] = "get_cities";
//    console.log(data.action);
    $.ajax({
        url: "<?php echo(BASE_URL)?>users/process/get_location_data.php",
        type: 'POST',
        data: data,
        dataType: 'json',
        beforeSend: function (xhr) {
            $(".city_id").html("<img src='<?php echo(BASE_URL)?>images/ajax-loader.gif'>");
        },
        complete: function (jqXHR, textStatus ) {
            $(".city_id").html("");
//            console.log("Complete");
//            console.log(jqXHR);
//            console.log(textStatus);
            if(jqXHR.status == 200){
//                console.log(jqXHR);
                var result = jqXHR.responseText;
                result = $.parseJSON(result);
//                console.log(result.class);
                if(result.hasOwnProperty('success')){
                    
                    if(result.hasOwnProperty('cities')){
                        var output = "<option value='0'>--CIty--</option>";
                        $.each(result.cities, function(key, city){
                            output += "<option value='"+city.id+"' ";
                            if(city.id == city_id){
                                output += " selected ";
                            }
                            output += ">"+city.city_name+"</option>";
                        });
//                        console.log(output);
                        $("#city_id").html(output);
                        $("#city_id").selectpicker("refresh");
                    }
                    else{
                        $(".page-msg").html("<h3 class='text-danger text-center'>States Key Missing</h3>");
                    }
                }
                else if(result.hasOwnProperty('error')){
                    $(".page-msg").html("<h3 class='text-danger text-center'>" + result.msg + "</h3>");
                }
                else{
                    $(".page-msg").html("<h3 class='text-danger text-center'>Conatct Support - MIssing Response Parameters</h3>");    
                }
            }
            else{
                $(".page-msg").html("<h3 class='text-danger text-center'>Conatct Support - " + jqXHR.status + "</h3>");
            }
        }
    });

});

$("#country_id").trigger("change");
</script>

<!-- +++++++++++++++++++++++++++++++++++++ -->                
<?php
require_once '../views/footer.php';

?>
