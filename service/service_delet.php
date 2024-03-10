<?php
session_start();
require '../db.php';
$id = $_GET['id'];


$delet_services = "DELETE FROM services WHERE id=$id";
mysqli_query($db_connection, $delet_services);

$_SESSION['services_delet'] = 'services Item delet successfully.!';
header('location:service.php');
