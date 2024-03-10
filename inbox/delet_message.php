<?php
session_start();
require '../db.php';
$id = $_GET['id'];
$delet = "DELETE FROM messages WHERE id=$id";
mysqli_query($db_connection, $delet);
$_SESSION['delet'] = 'Message Successfully Delet';
header('location:/project/inbox/inbox.php');
