<?php
session_start();
require '../db.php';
$titl = $_POST['title'];
$subtile = $_POST['subtitle'];

$img = $_FILES['p_img'];

$insert = "INSERT INTO portfolios(title,subtitle) VALUES ('$titl','$subtile')";
$insert_result = mysqli_query($db_connection, $insert);
$last_id = mysqli_insert_id($db_connection);
if (!$img['name']) {
  header('location:portfolio.php');
  $_SESSION['add_portfolio'] = "Portfolio Added With out image.!";
} else {
  $explode = explode('.', $img['name']);
  $extention = end($explode);
  $new_img_name = $last_id . '.' . $extention;

  $new_location = '../uplodes/portfolio/' . $new_img_name;
  move_uploaded_file($img['tmp_name'], $new_location);

  $update = "UPDATE portfolios SET img='$new_img_name' WHERE id=$last_id";
  mysqli_query($db_connection, $update);

  header('location:portfolio.php');
  $_SESSION['add_portfolio'] = "Portfolio Added successfully.!";
}
