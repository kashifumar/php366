<?php

session_start();
require_once '../models/User.php';
$errors = [];
$obj_user = new User();

try {
    $obj_user->user_name = $_POST['user_name'];
} catch (Exception $ex) {
    $errors['user_name'] = $ex->getMessage();
}

try {
    $obj_user->password = $_POST['password'];
} catch (Exception $ex) {
    $errors['password'] = $ex->getMessage();
}

$count = count($errors);
if ($count == 0) {
    try {
        $remember = FALSE;
        if(isset($_POST['remember'])){
            $remember = TRUE;
        }
        $obj_user->login($remember);
        header("Location:../index.php");
        
    } catch (Exception $ex) {
        $_SESSION['msg'] = $ex->getMessage();
        header("Location:../login.php");
        
    }
} else {
    $msg = "Check Your Errors";
    $_SESSION['msg'] = $msg;
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_user'] = serialize($obj_user);
    header("Location:../login.php");
}



?>