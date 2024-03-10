<?php
require '../db.php';

$logo = $_FILES['logo'];

$afte_explode = explode('.', $logo['name']);
$extention = end($afte_explode);
// echo $extention;
$file_name = 'main_logo' . '.' . $extention;

$select_logo = "SELECT * FROM logos";
$logo_result = mysqli_query($db_connection, $select_logo);
$assoc_logo = mysqli_fetch_assoc($logo_result);
// echo $assoc_logo['logo'];

$delet_from = '../uplodes/logo/' . $assoc_logo['logo'];
unlink($delet_from);

$new_location = '../uplodes/logo/' . $file_name;
move_uploaded_file($logo['tmp_name'], $new_location);

$update = "UPDATE logos SET logo='$file_name'";
mysqli_query($db_connection, $update);
header('location:/project/logo/logo.php');