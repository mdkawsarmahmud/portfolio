<?php
session_start();
require '../db.php';
$id = $_GET['id'];


$break_id = explode('.', $id);

$newid = $break_id[0];

if ($id == $newid . '.del') {
  $set_delet = "UPDATE users set status=0 WHERE id=$newid";
  mysqli_query($db_connection, $set_delet);
  header('location:/project/users/user_list.php');
  $_SESSION['move_trash'] = 'user restor sucesfull !..';
} else {
  $set_delet = "DELETE FROM users WHERE id=$newid";
  mysqli_query($db_connection, $set_delet);
  header('location:/project/users/user_list.php');
  $_SESSION['delet_user'] = 'User succesfully DElETE !..';
}
