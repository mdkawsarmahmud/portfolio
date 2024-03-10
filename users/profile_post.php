<?php
require '../db.php';
session_start();
$name=$_POST['name'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
$current_password=$_POST['current_password'];
$user_id=$_POST['id'];
$select_user="SELECT * FROM users WHERE id=$user_id";
$user_result=mysqli_query($db_connection,$select_user);
$accoc_user=mysqli_fetch_assoc($user_result);

if($_POST['password']){
  if(password_verify($current_password,$accoc_user['password'])){
    $update_user = "UPDATE users SET name='$name', password='$password' WHERE id=$user_id";
    mysqli_query($db_connection,$update_user);
    header('location:user_profile.php');
    $_SESSION['profile_up']='Profile Update Succesfully';
  }
  else{
    header('location:user_profile.php');
  $_SESSION['wrong_pass']='Current Password INVALIT!!';
  }

}
else{
  $update_user = "UPDATE users SET name='$name' WHERE id=$user_id";
  mysqli_query($db_connection,$update_user);
  header('location:user_profile.php');
  $_SESSION['profile_up']='Profile Update Succesfully';
}
?>