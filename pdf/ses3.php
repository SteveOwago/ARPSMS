<?php

session_start();


    if (!isset($_SESSION['email'])) {
      $home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/includes/logout.php';
      header('Location:'.$home_url);
      exit();
    }
    if ($_SESSION['role']!='3') {
      $home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/includes/logout.php';
      header('Location:'.$home_url);
      exit();
    }
?>
