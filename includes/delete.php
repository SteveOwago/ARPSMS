<?php
require 'db1.php';

// Delete Orders
if(isset($_GET['dl'])) {
$dl=$_GET['dl'];
$sql="DELETE FROM orders WHERE order_id='$dl'  ";
$sql=mysqli_query($conn,$sql);
header('location: ../view_farm_orders.php?error=Successful');
exit();
}
else {
echo "".$conn->error;
}

// Delete Supervisors
if(isset($_GET['dsuper'])) {
$dsuper=$_GET['dsuper'];
$sql="DELETE FROM scheme WHERE scheme_id='$dsuper'";
$sql=mysqli_query($conn,$sql);
header('location: ../update_supervisors.php?error=Successful');
exit();
}
else {
 	echo "".$conn->error;
 }

 // Delete Farmer
 if(isset($_GET['dfarmers'])) {
 $dfarmers=$_GET['dfarmers'];
 $sql="DELETE FROM register_db WHERE user_id ='$dfarmers'";
 $sql=mysqli_query($conn,$sql);
 header('location: ../delete_farmers.php?Successful');
 exit();
 }
 else {
  	echo "".$conn->error;
  }

//Delete Products

 // Delete Supervisors
if(isset($_GET['dlproduct'])) {
$dlproduct=$_GET['dlproduct'];
$sql="DELETE FROM products WHERE product_id='$dlproduct'";
$sql=mysqli_query($conn,$sql);
header('location: ../view_products.php?error=Successful');
exit();
}
else {
 	echo "".$conn->error;
 }


?>
