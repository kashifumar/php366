<?php
session_start();
require_once '../models/User.php';
$errors = [];
//$obj_user = new User();
//$_SERVER['HTTP_REFERER']

if (isset($_SESSION['obj_user'])) {
    $obj_user = unserialize($_SESSION['obj_user']);

    if ($obj_user->id > 0) {
        try {
            $obj_user->logout();
        } catch (Exception $ex) {
            $_SESSION['msg'] = $ex->getMessage();
        }
    } else {
        $_SESSION['msg'] = "UN-AUTHORIZED ACCESS";
    }
} else {
    $_SESSION['msg'] = "UN-AUTHORIZED ACCESS";
}
header("Location:../msg.php");
?>