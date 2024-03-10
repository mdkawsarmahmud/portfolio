<?php
session_start();
require '../db.php';
$s_name = $_POST['name'];
$s_details = $_POST['discription'];

if ($s_name == '' || $s_details == '') {
  $_SESSION['s_warning'] = 'Service Entity is blank!';

  header('location:service.php');
} else {
  $insert = "INSERT INTO services(name,description) VALUES ('$s_name','$s_details')";
  mysqli_query($db_connection, $insert);
  header('location:service.php');
  $_SESSION['s_success'] = 'Expertise Added Successfully.!';
}
