<?php
session_start();
require '../db.php';
$id = $_POST['id'];
$title = $_POST['title'];
$subtitle = $_POST['subtitle'];
$image = $_FILES['img'];

$select = "SELECT * FROM portfolios WHERE id=$id";
$portfolio_result = mysqli_query($db_connection, $select);
$assoc_portfolio = mysqli_fetch_assoc($portfolio_result);

if ($image['name'] == '') {
  $update = "UPDATE portfolios SET title='$title',subtitle='$subtitle' WHERE id=$id";
  mysqli_query($db_connection, $update);
  $_SESSION['p_update'] = 'Portfolio Update successfully';
  header('location:portfolio.php');
} else {
  if ($assoc_portfolio['img'] == '') {
    $explode = explode('.', $image['name']);
    $extention = end($explode);
    $img_name = $id . '.' . $extention;

    $new_location = '../uplodes/portfolio/' . $img_name;
    move_uploaded_file($image['tmp_name'], $new_location);

    $update = "UPDATE portfolios SET title='$title',subtitle='$subtitle',img='$img_name' WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['p_update'] = 'Portfolio Update successfully';
    header('location:portfolio.php');
  } else {
    $delet_form = '../uplodes/portfolio/' . $assoc_portfolio['img'];
    unlink($delet_form);

    $explode = explode('.', $image['name']);
    $extention = end($explode);
    $img_name = $id . '.' . $extention;

    $new_location = '../uplodes/portfolio/' . $img_name;
    move_uploaded_file($image['tmp_name'], $new_location);

    $update = "UPDATE portfolios SET title='$title',subtitle='$subtitle',img='$img_name' WHERE id=$id";
    mysqli_query($db_connection, $update);
    $_SESSION['p_update'] = 'Portfolio Update successfully';
    header('location:portfolio.php');
  }
}
