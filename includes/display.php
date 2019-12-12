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

  //Administrator

 if (isset($_GET['addactivity'])) {
    $addactivity = $_GET['addactivity'];
    $query=mysqli_query($conn,"SELECT * FROM register_db WHERE email='$addactivity'");
    $data=mysqli_fetch_array($query);
    $username=$data['username'];
    $first_name=$data['first_name'];


  }else{
    // echo "error";
  }


  //Edit Supervisor

 if (isset($_GET['esuper'])) {
    $esuper = $_GET['esuper'];
    $query=mysqli_query($conn,"SELECT * FROM register_db R,scheme S WHERE R.user_id= S.sup_id AND S.scheme_id = '$esuper'");
    $data=mysqli_fetch_array($query);
    $username=$data['username'];
    $first_name=$data['first_name'];
    $last_name=$data['last_name'];
    $email=$data['email'];
    $scheme_name=$data['scheme_name'];
    $sup_start_date=$data['sup_start_date'];




  }else{
    // echo "error";
  }

  //View Supervisor

 if (isset($_GET['vsuper'])) {
    $vsuper = $_GET['vsuper'];
    $query=mysqli_query($conn,"SELECT * FROM register_db R,scheme S WHERE R.user_id= S.sup_id AND S.scheme_id = '$vsuper'");
    $data=mysqli_fetch_array($query);
    $username=$data['username'];
    $first_name=$data['first_name'];
    $last_name=$data['last_name'];
    $email=$data['email'];
    $scheme_name=$data['scheme_name'];
    $sup_start_date=$data['sup_start_date'];




  }else{
    // echo "error";
  }

  //View Farmers

 if (isset($_GET['vfarmers'])) {
    $vfarmers = $_GET['vfarmers'];
    $query=mysqli_query($conn,"SELECT * FROM register_db R,farms F,scheme S WHERE R.user_id = F.farm_id AND F.scheme_id = S.scheme_id AND S.scheme_id = '$vfarmers'");
    $data=mysqli_fetch_array($query);
    $username=$data['username'];
    $first_name=$data['first_name'];
    $last_name=$data['last_name'];
    $email=$data['email'];
    $scheme_name=$data['scheme_name'];
    $phone=$data['phone'];
    $fnumber=$data['fnumber'];
    $sup_start_date=$data['sup_start_date'];




  }else{
    // echo "error";
  }


//Activities
  if (isset($_GET['addactivity'])) {
    $addactivity = $_GET['addactivity'];
    $query=mysqli_query($conn,"SELECT * FROM register_db WHERE email='$addactivity'");
    $data=mysqli_fetch_array($query);
    $username=$data['username'];
    $first_name=$data['first_name'];


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
    $phone2=$data['phone2'];
    $fnumber=$data['fnumber'];
    $scheme_name=$data['scheme_name'];


  }else{
    // echo "error";
  }


if (isset($_GET['order'])) {
    $order = $_GET['order'];
    $query=mysqli_query($conn,"SELECT * FROM register_db R,scheme S,farms F WHERE R.user_id = F.user_id AND S.scheme_id = F.scheme_id AND email='$order'");
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
    $phone2=$data['phone2'];
    $fnumber=$data['fnumber'];
     $scheme_name=$data['scheme_name'];



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

    //Product
  if (isset($_GET['editproducts'])) {
      $editproducts= $_GET['editproducts'];
      $query=mysqli_query($conn,"SELECT * FROM products P, brands B  WHERE P.brand_id = B.brand_id AND product_id='$editproducts'");
      $data=mysqli_fetch_array($query);
      $product_name=$data['product_name'];
      $product_price=$data['product_price'];


    }else{
      // echo "error";
    }

//Supervisor_Update
if (isset($_GET['esupervisorscheme'])) {
      $esupervisorscheme = $_GET['esupervisorscheme'];
      $query=mysqli_query($conn,"SELECT * FROM scheme S,register_db R WHERE S.sup_id = R.user_id AND email='$esupervisorscheme'");
      $data=mysqli_fetch_array($query);
      $scheme_name=$data['scheme_name'];
      $email=$data['email'];
      $sup_id=$data['sup_id'];
      $sup_start_date=$data['sup_start_date'];



    }else{
      // echo "error";
    }

    //View Orders
if (isset($_GET['vorders'])) {
      $vorders = $_GET['vorders'];
      $query=mysqli_query($conn,"SELECT * FROM register_db R,orders O,products P WHERE R.user_id = O.user_id AND O.product_id = P.product_id AND O.order_id = '$vorders'");
      $data=mysqli_fetch_array($query);
      $email=$data['email'];
      $product_name=$data['product_name'];
      $product_quantity=$data['product_quantity'];
      $expected_delivery=$data['expected_delivery'];



    }else{
      // echo "error";
    }
