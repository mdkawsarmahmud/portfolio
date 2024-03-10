<?php
session_start();
require '../db.php';
$id = $_GET['id'];

$select_status = "SELECT * FROM expertises WHERE id=$id";
$expertise_result = mysqli_query($db_connection, $select_status);
$assoc_expertise = mysqli_fetch_assoc($expertise_result);
//COUNT 
$select_status_count = "SELECT COUNT(*) as total FROM expertises WHERE status=1";
$expertise_result_count = mysqli_query($db_connection, $select_status_count);
$assoc_expertise_count = mysqli_fetch_assoc($expertise_result_count);

// echo $assoc_expertise['status'];
if ($assoc_expertise['status'] == 0) {
  if ($assoc_expertise_count['total'] >= 6) {
    $_SESSION['limit'] = 'Your Expertis over 6 item';
    header('location:expertise.php');
  } else {
    $update = "UPDATE expertises SET status=1 WHERE id=$id";
    mysqli_query($db_connection, $update);
    header('location:expertise.php');
  }
} else {
  if ($assoc_expertise_count['total'] <= 4) {
    $_SESSION['limit'] = 'Your Expertis minimum 4 item';
    header('location:expertise.php');
  } else {
    $update = "UPDATE expertises SET status=0 WHERE id=$id";
    mysqli_query($db_connection, $update);
    header('location:expertise.php');
  }
}
