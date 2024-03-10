<?php
session_start();
require 'db.php';
$select_logo = "SELECT * FROM logos";
$logo_result = mysqli_query($db_connection, $select_logo);
$assoc_logo = mysqli_fetch_assoc($logo_result);
// echo $assoc_logo['logo'];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="portfolio,creative,business,company,agency,multipurpose,modern,bootstrap4">

  <meta name="author" content="themeturn.com">

  <title>Ratsaan| Creative portfolio template</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Themeify Icon Css -->
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <!-- owl carousel -->
  <link rel="stylesheet" href="plugins/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="plugins/owl/assets/owl.theme.default.min.css">
  <!-- Slick slider CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="portfolio" id="top">


  <!-- Navigation start -->
  <!-- Header Start -->

  <nav class="navbar navbar-expand-lg bg-transprent py-4 fixed-top navigation" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img width="120" src="/project/uplodes/logo/<?= $assoc_logo['logo'] ?>" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="ti-view-list"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navbarsExample09">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link smoth-scroll" href="#skillbar">Expertise</a></li>
          <li class="nav-item"><a class="nav-link smoth-scroll" href="#service">Services</a></li>
          <li class="nav-item"><a class="nav-link smoth-scroll" href="#portfolio">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link smoth-scroll" href="#testimonial">Testimonial</a></li>
          <li class="nav-item"><a class="nav-link smoth-scroll" href="#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>



  <!-- Navigation End -->