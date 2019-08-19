<?php
  if(!isset($_SESSION))
  {
  session_start();
  }

  if( !isset($_SESSION['login']) )
  {
    header('location: login');
    exit();
  }  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pelayanan Mahasiswa SPs - Pascasarjana IPB</title>
    <meta name="description" content="Website sistem pelayanan mahasiswa Pascasarjana IPB.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../mahasiswa/assets/icons/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="../mahasiswa/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../mahasiswa/assets/icons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../mahasiswa/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../mahasiswa/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="../mahasiswa/assets/icons/site.webmanifest">
    <link rel="mask-icon" href="../mahasiswa/assets/icons/safari-pinned-tab.svg" color="#5bbad5">
  </head>
  <body class="app sidebar-mini rtl  pace-done">
    <?php include 'header.php';?>
    <?php include 'beranda.php';?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Tampilan loading garis diatas -->
    <script src="js/plugins/pace.min.js"></script>
  </body>
</html>