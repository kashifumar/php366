<?php

session_start();
require_once '../models/User.php';
$errors = [];
//$obj_user = unserialize($_SESSION['obj_user']);
$obj_user = new User();

try {
    $obj_user->password = $_POST['password'];
} catch (Exception $ex) {
    $errors['password'] = $ex->getMessage();
}

try {
    if(empty($_POST['password2']) || $_POST['password'] != $_POST['password2']){
        throw new Exception("MIssing/Mismatched Password");
    }
} catch (Exception $ex) {
    $errors['password2'] = $ex->getMessage();
}


$count = count($errors);
if ($count == 0) {
    try {
        $obj_user->update_password();
        $msg = "Password Changed";
        $_SESSION['msg'] = $msg;
        header("Location:../my_account.php");
    } catch (Exception $ex) {
        $_SESSION['msg'] = $ex->getMessage();
        header("Location:../change_password.php");
    }
} else {
    $msg = "Check Your Errors";
    $_SESSION['msg'] = $msg;
    $_SESSION['errors'] = $errors;    
    header("Location:../change_password.php");
}
?>