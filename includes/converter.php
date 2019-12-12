<?php
session_start();
require ('db1.php');

if (isset($_POST['submit_order'])) {
//  $user_id = "SELECT user_id FROM register_db WHERE  user_id='".$_SESSION['user_id']."' ";

	$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
	$product_id = mysqli_real_escape_string($conn,$_POST['product_id']);
	$product_quantity = mysqli_real_escape_string($conn,$_POST['product_quantity']);
	$order_date = date("Y-m-d");
	$expected_delivery = mysqli_real_escape_string($conn,$_POST['expected_delivery']);
	$status = "";


	if (empty($product_id) || empty($product_quantity) || empty($order_date))
	{
		header("Location:../order_products.php?error=Allfield");
		exit();
	}
	else
	{
	$sql ="INSERT INTO orders (product_id,product_quantity,order_date,expected_delivery,status,user_id) VALUES('$product_id','$product_quantity','$order_date','$expected_delivery','$status','$user_id');";
	$res =  mysqli_query($conn,$sql);

	if ($res)
	 {
		header("Location:../payment.php");
		exit();
	 }
	else
	{
		header("Location:../order_products.php?error=Unsuccessful");
		exit();
	}

	}




}




?>
