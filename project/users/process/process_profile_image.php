<?php

session_start();
require_once '../models/User.php';
$errors = [];
//$obj_user = unserialize($_SESSION['obj_user']);
$obj_user = new User();

try {
    $obj_user->profile_image = $_FILES['profile_image'];
    $obj_user->update_profile_image($_FILES['profile_image']['temp_name']);
    $msg = "Image Changed";
    $_SESSION['msg'] = $msg;
    header("Location:../my_account.php");
} catch (Exception $ex) {
    $errors['profile_image'] = $ex->getMessage();
    header("Location:../change_profile_image.php");
}
?>