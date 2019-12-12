<?php
 require 'db1.php';

 //Update Schemes
if (isset($_POST['update_scheme'])) {

$scheme_id = trim($_POST['scheme_id']);
$scheme_name = trim($_POST['scheme_name']);
$sup_id = trim($_POST['sup_id']);
$sup_start_date = date("Y-m-d");

$sql = "UPDATE scheme SET sup_id = '$sup_id',sup_start_date = '$sup_start_date' WHERE scheme_id
= '$scheme_id'";
$result = mysqli_query($conn,$sql);


if ($result) {
  header("Location:../view_scheme.php?error=Successful");
  exit();
}
}

//Activate Sup

if (isset($_POST['activate_sup'])) {

$role = trim($_POST['role']);
$email = trim($_POST['email']);


$sql = "UPDATE register_db SET role = '$role' WHERE email
= '$email'";
$result = mysqli_query($conn,$sql);


if ($result) {
  header("Location:../view_scheme.php?error=Successful");
  exit();
}
}

//Update

if (isset($_POST['update_pro'])) {

$product_name = trim($_POST['product_name']);
$product_price = trim($_POST['product_price']);



$sql = "UPDATE products SET product_price = '$product_price', product_name = '$product_name' WHERE product_name
= '$product_name'";
$result = mysqli_query($conn,$sql);


if ($result) {
  header("Location:../view_products.php?error=Successful");
  exit();
}

else
{
	 header("Location:../view_products.php?error=error");
  exit();
}
}


?>
