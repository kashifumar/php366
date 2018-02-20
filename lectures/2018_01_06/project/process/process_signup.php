<?php
session_start();
/*
  echo("<pre>");
  print_r($_POST);
  echo("</pre>");

  echo("Email - " . $_POST['email'] . "<br>");
  echo("User Name - " . $_POST['user_name'] . "<br>");
  echo("Password - " . $_POST['password'] . "<br>");
 */
//$errors = array();
$errors = [];

//$errors['email'] = "Invalid/Missing Email";

$count = count($errors);
if ($count == 0) {
    $msg = "Congratulations";
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['msg'] = $msg;
    header("Location:../msg.php");
} else {
    $msg = "Check Your Errors";
    $_SESSION['msg'] = $msg;
    header("Location:../signup.php");
}
?>