<?php
  require 'includes/db1.php';

  if (isset($_GET['cmt'])) {
    $cmt = $_GET['cmt'];
    $query=mysqli_query($conn,"SELECT * FROM register_db WHERE email='$cmt'");
    $data=mysqli_fetch_array($query);
    $email=$data['email'];
    $username=$data['username'];
    $first_name=$data['first_name'];
    $last_name=$data['last_name'];


  }else{
    // echo "error";
  }

  if (isset($_GET['pf'])) {
    $pf = $_GET['pf'];
    $query=mysqli_query($conn,"SELECT * FROM register_db R,farms F,scheme S WHERE  email='$pf'");
    $data=mysqli_fetch_array($query);
    $email=$data['email'];
    $username=$data['username'];
    $first_name=$data['first_name'];
    $last_name=$data['last_name'];
     $farm_id=$data['farm_id'];
    $farm_name=$data['farm_name'];
    $farm_size=$data['farm_size'];
    $phone=$data['phone'];
    $address=$data['address'];
    $fnumber=$data['fnumber'];
    $scheme_name=$data['scheme_name'];


  }else{
    // echo "error";
  }


if (isset($_GET['order'])) {
    $order = $_GET['order'];
    $query=mysqli_query($conn,"SELECT * FROM register_db R,farms F WHERE email='$order'");
    $data=mysqli_fetch_array($query);
    $email=$data['email'];
    $username=$data['username'];
    $first_name=$data['first_name'];
    $last_name=$data['last_name'];
     $farm_id=$data['farm_id'];
      $user_id=$data['user_id'];
    $farm_name=$data['farm_name'];
    $farm_size=$data['farm_size'];
    $phone=$data['phone'];
    $address=$data['address'];
    $fnumber=$data['fnumber'];


  }else{
    // echo "error";
  }


  //Display Schemes

  if (isset($_GET['updatescheme'])) {
      $updatescheme = $_GET['updatescheme'];
      $query=mysqli_query($conn,"SELECT * FROM scheme WHERE scheme_id='$updatescheme'");
      $data=mysqli_fetch_array($query);
      $scheme_id=$data['scheme_id'];
      $scheme_name=$data['scheme_name'];
      $sup_id=$data['sup_id'];
      $sup_start_date=$data['sup_start_date'];



    }else{
      // echo "error";
    }
