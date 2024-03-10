<?php
session_start();
require '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

date_default_timezone_set('Asia/Dhaka');
$date = date('y-m-d,h:i:s');

$flag = false;

if (!$name) {
  $flag = true;
  $_SESSION['name_err'] = 'Please Enter Your Name';
}
if (!$email) {
  $flag = true;
  $_SESSION['email_err'] = 'Please Enter Your email';
}

if ($flag) {
  // echo 'mesage';
  header('location:../index.php?#contact');
} else {
  $insert = "INSERT INTO messages(name, email,subject,message,creat_at) VALUES ('$name','$email','$subject','$message','$date')";
  mysqli_query($db_connection, $insert);
  $_SESSION['sent'] = "Your message sent Successfully";
  header('location:../index.php?#contact');
}