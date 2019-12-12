<?php
require ('db1.php');

if (isset($_POST['submit_order'])) {

	$product_name = mysqli_real_escape_string($conn,$_POST['product_name']);
	$product_quantity = mysqli_real_escape_string($conn,$_POST['product_quantity']);
	$order_date = date("Y-m-d");
	$expected_delivery = mysqli_real_escape_string($conn,$_POST['expected_delivery']);
	$product_bid = mysqli_real_escape_string($conn,$_POST['product_bid']);
	$status = 0;
	// $order_id = 1;

	if (empty($product_name) || empty($product_quantity) || empty($order_date) || empty($expected_delivery)) 
	{
		header("Location../orders.php?error=Allfield");
		exit();
	}
	else
	{
	$sql ="INSERT INTO orders (product_name,product_quantity,product_id,order_date,expected_delivery,status) VALUES('$product_name','$product_quantity','$product_bid','$order_date','$expected_delivery','$status');";
	$res =  mysqli_query($conn,$sql);

	if ($res) 
	 {
		header("Location:../payment.php");
		exit();
	 }
	else
	{
		header("Location:../orders.php?error=unsuccessful");
		exit();
	}

	}


	
	
}




?>