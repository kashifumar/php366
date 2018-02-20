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
    $obj_user->email = $_POST['email'];
} catch (Exception $ex) {
    $errors['email'] = $ex->getMessage();
}

try {
    $obj_user->password = $_POST['password'];
} catch (Exception $ex) {
    $errors['password'] = $ex->getMessage();
}

$count = count($errors);
if ($count == 0) {
    try {
        $obj_user->signup();
        $msg = "Congratulations";
        $_SESSION['msg'] = $msg;
        header("Location:../msg.php");
        
    } catch (Exception $ex) {
        $_SESSION['msg'] = $ex->getMessage();
        header("Location:../signup.php");
        
    }
} else {
    $msg = "Check Your Errors";
    $_SESSION['msg'] = $msg;
    $_SESSION['errors'] = $errors;
    $_SESSION['obj_user'] = serialize($obj_user);
    header("Location:../signup.php");
}



?>