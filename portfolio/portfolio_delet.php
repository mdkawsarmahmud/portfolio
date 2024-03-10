<?php
session_start();
require '../db.php';
$id = $_GET['id'];
echo $id;

$select = "SELECT * FROM portfolios WHERE id=$id";
$portfolio_result = mysqli_query($db_connection, $select);
$assoc_portfolio = mysqli_fetch_assoc($portfolio_result);

$delet_form = '../uplodes/portfolio/' . $assoc_portfolio['img'];
unlink($delet_form);

$delet = "DELETE FROM portfolios WHERE id=$id";
mysqli_query($db_connection, $delet);
$_SESSION['p_update'] = 'Portfolio Delet successfully';
header('location:portfolio.php');
