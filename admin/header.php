<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from simpleqode.com/preview/kite/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2016 09:06:49 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/ico/favicon.ico">

  <title>Kite: Dashboard</title>

  <!-- CSS Plugins -->
  <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css">

  <!-- CSS Global -->
  <link href="assets/css/styles.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300,500' rel='stylesheet' type='text/css'>

  </head>

  <body>
  <?php
    ob_start();  
    session_start();
  ?>
  <?php 
  if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
  }
?>