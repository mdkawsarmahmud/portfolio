<?php
session_start();
require '../db.php';
$id = $_GET['id'];


$delet_extertis = "DELETE FROM expertises WHERE id=$id";
mysqli_query($db_connection, $delet_extertis);

$_SESSION['expertis_delet'] = 'Expertis Item delet successfully.!';
header('location:expertise.php');
