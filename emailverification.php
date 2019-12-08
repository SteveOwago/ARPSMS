<?php
require ('db1.php');

if (!isset($_GET['email']) || !isset($_GET['token'])) {
	header("Location:../register.php?Empty");
	exit();
}
else
{

	$email = mysqli_real_escape_string($conn,$_GET['email']);
	$token = mysqli_real_escape_string($conn,$_GET['token']);

	$sql = "SELECT user_id FROM register_db WHERE email= '$email' AND token = '$token' AND isEmailConfirmed=0";
	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) > 0) {
		$sql = "UPDATE register_db SET isEmailConfirmed = '1' , token = '' WHERE email='$email'";
		$result = mysqli_query($conn,$sql);
	header("Location:../login.php");
	exit();
	}
	else
	{
	 header("Location:../register.php?Error");
	exit();
	}
}

?>
