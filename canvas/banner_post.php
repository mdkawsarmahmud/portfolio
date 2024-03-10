<?php
require '../db.php';
$designation = $_POST['deg'];
$name = $_POST['name'];
$watermark = $_POST['w_mark'];
$description = $_POST['desp'];
$action_button = $_POST['a_button'];
$action_link = $_POST['a_link'];
$banner_img = $_FILES['b_img'];

if ($banner_img['name'] == '') {
  $update = "UPDATE banners SET deg ='$designation',name='$name',watermark='$watermark',description='$description',a_button='$action_button',a_link='$action_link'";
  mysqli_query($db_connection, $update);
  header('location:/project/canvas/banner.php');
} else {

  $select_banner = "SELECT * FROM banners";
  $banner_result = mysqli_query($db_connection, $select_banner);
  $assoc_banner = mysqli_fetch_assoc($banner_result);

  echo $assoc_banner['b_img'];
  echo $banner_img['name'];


  $delet_from = '../uplodes/banner/' . $assoc_banner['b_img'];
  unlink($delet_from);

  $after_explored = explode('.', $banner_img['name']);
  $extention = end($after_explored);
  $file_name = random_int(100, 1000) . '.' . $extention;
  echo $file_name;
  $new_location = '../uplodes/banner/' . $file_name;
  move_uploaded_file($banner_img['tmp_name'], $new_location);




  $update = "UPDATE banners SET deg ='$designation',name='$name',watermark='$watermark',description='$description',a_button='$action_button',a_link='$action_link',b_img='$file_name'";
  mysqli_query($db_connection, $update);
  header('location:/project/canvas/banner.php');
}
