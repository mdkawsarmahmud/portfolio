<?php
session_start();
require '../db.php';

$id = $_GET['id'];
echo $id;

$set_delet = "UPDATE users set status=1 WHERE id=$id";
mysqli_query($db_connection, $set_delet);
header('location:/project/users/user_list.php');
$_SESSION['move_trash'] = 'user move to trash !..';
