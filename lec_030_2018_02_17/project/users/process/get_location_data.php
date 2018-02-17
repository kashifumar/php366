<?php

require_once '../../models/Location.php';
//$response = array();
$response = [];

//for(;;){}
$actions = ["get_states", "get_cities"];
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = NULL;
}
//if(!in_array($action, $actions)){
//    $action = NULL;
//}

$response = [];

try {

    switch ($action) {
        case "get_states":
            $country_id = isset($_POST['country_id']) ? $_POST['country_id'] : 0;
            $states = Location::get_states($country_id);
            $response['class'] = "PHP366";
            $response['success'] = TRUE;
            $response['states'] = $states;
            break;

        case "get_cities":
            $state_id = isset($_POST['state_id']) ? $_POST['state_id'] : 0;
            $cities = Location::get_cities($state_id);            
            $response['success'] = TRUE;
            $response['cities'] = $cities;
            break;
        
        default:
            $response['error'] = TRUE;
            $response['msg'] = "Action Parameter Missing";
            break;
    }
} catch (Exception $ex) {
    $response['error'] = TRUE;
    $response['msg'] = $ex->getMessage();
}

$str_response = json_encode($response);
echo($str_response)

?>