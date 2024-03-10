<?php
session_start();
require '../db.php';

$e_name = $_POST['e_name'];
$e_persent = $_POST['e_persent'];
// echo $e_name;
// echo $e_persent;
if ($e_name == '' || $e_persent == '') {
  $_SESSION['e_warning'] = 'Expertise Entity is blank!';
  header('location:expertise.php');
} else {
  $insert = "INSERT INTO expertises(name,persent) VALUES ('$e_name','$e_persent')";
  mysqli_query($db_connection, $insert);
  header('location:expertise.php');
  $_SESSION['e_success'] = 'Expertise Added Successfully.!';
}
