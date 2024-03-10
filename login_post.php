<?php
session_start();

require 'db.php';
$email = $_POST['email'];
$password = $_POST['password'];


$check = "SELECT count(*) as total FROM users WHERE email='$email'";
$check_result = mysqli_query($db_connection, $check);
$check_assoc = mysqli_fetch_assoc($check_result);
$total_email = $check_assoc['total'];

if ($total_email == 1) {
  $select_pass = "SELECT * FROM users WHERE email='$email'";
  $select_pass_result = mysqli_query($db_connection, $select_pass);
  $Pass_accoc = mysqli_fetch_assoc($select_pass_result);
  $stor_pass = $Pass_accoc['password'];
  if ($Pass_accoc['status'] == 0) {
    if (password_verify($password, $stor_pass)) {
      $_SESSION['islogin'] = '';
      header('location:dashbord.php');
      $_SESSION['id'] = $Pass_accoc['id'];
      $_SESSION['name'] = $Pass_accoc['name'];
    } else {
      header('location:login.php');
      $_SESSION['wrong_pass'] = 'Please Insert correct Password';
    }
  } else {
    $_SESSION['exist'] = 'YOUR Email SUSPEND';
    header('location:login.php');
  }
} else {
  $_SESSION['exist'] = 'Your Email doesnot exist';
  header('location:login.php');
}
