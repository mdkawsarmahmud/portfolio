<?php
require '../db.php';
session_start();
$photo = $_FILES['photo'];
// print_r($photo);
// echo $photo['name'];
$id = $_SESSION['id'];
$extention_find = explode('.', $photo['name']);
$extention = end($extention_find);
$allowed_exten = ['jpg', 'png', 'gif', 'bmp'];
if (in_array($extention, $allowed_exten)) {
  if ($photo['size'] <= 1000000) {
    $select_user = "SELECT * FROM users WHERE id=$id";
    $user_result = mysqli_query($db_connection, $select_user);
    $accoc_image = mysqli_fetch_assoc($user_result);
    if ($accoc_image['photo'] == null) {
      $photo_name = $id . '.' . $extention;

      $new_location = '../uplodes/users/' . $photo_name;
      move_uploaded_file($photo['tmp_name'], $new_location);

      $update = "UPDATE users SET photo='$photo_name' WHERE id=$id";
      mysqli_query($db_connection, $update);

      $_SESSION['pp_update'] = 'Profile picture succesfully dupdated!';
      header('location:/project/users/user_profile.php');
    } else {
      $delete_form = '../uplodes/users/' . $accoc_image['photo'];
      unlink($delete_form);

      $photo_name = $id . '.' . $extention;

      $new_location = '../uplodes/users/' . $photo_name;
      move_uploaded_file($photo['tmp_name'], $new_location);

      $update = "UPDATE users SET photo='$photo_name' WHERE id=$id";
      mysqli_query($db_connection, $update);

      $_SESSION['pp_update'] = 'Profile picture succesfully dupdated!';
      header('location:/project/users/user_profile.php');
    }
  } else {
    $_SESSION['extention_err'] = 'Your image size is bigger than 1 Mb';
    header('location:/project/users/user_profile.php');
  }
} else {
  $_SESSION['extention_err'] = 'Must be use png, jpg, gif image';
  header('location:/project/users/user_profile.php');
}
