<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$select_status = "SELECT * FROM services WHERE id=$id";
$services_result = mysqli_query($db_connection, $select_status);
$assoc_services = mysqli_fetch_assoc($services_result);

// echo $assoc_expertise['status'];
if ($assoc_services['status'] == 0) {

  $update = "UPDATE services SET status=1 WHERE id=$id";
  mysqli_query($db_connection, $update);
  header('location:service.php');
} else {

  $update = "UPDATE services SET status=0 WHERE id=$id";
  mysqli_query($db_connection, $update);
  header('location:service.php');
}
