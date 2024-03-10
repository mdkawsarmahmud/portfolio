<?php
require '../db.php';
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$conf_pass = $_POST['conferm_password'];

$exist = "SELECT count(*) as total FROM users WHERE email='$email'";
$exist_result = mysqli_query($db_connection, $exist);
$after_assoc = mysqli_fetch_assoc($exist_result);
$total_email = $after_assoc['total'];
if ($total_email == 1) {
  header('location:user_list.php');
  $_SESSION['exist'] = 'Your email is already esist..!';
} else {
  //After success clear form fild
  $_SESSION['old_name'] = '';
  $_SESSION['old_email'] = '';
  $_SESSION['old_pass'] = '';

  //insert data
  $encript_pass = password_hash($password, PASSWORD_DEFAULT);
  $insert = "INSERT INTO users(name, email, password) VALUES('$name','$email','$encript_pass')";
  mysqli_query($db_connection, $insert);
  header('location:user_list.php');
  $_SESSION['success'] = 'Registration Successfull!';
}
