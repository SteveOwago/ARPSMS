<?php


// Including database connection



// Including database connection
include_once ('db1.php');

// Check if submit button is clicked

if (isset($_POST['submit'])) {
	$first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
	$last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

	//Date and Time
	$reg_date = date("Y-m-d");
	$reg_time = date("H:i:s");

	//Image Insertion
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="image/";


	/* new file size in KB */
	$new_size = $file_size/1024;
	/* new file size in KB */

	/* make file name in lower case */
	$new_file_name = strtolower($file);
	/* make file name in lower case */

	$final_file=str_replace(' ','-',$new_file_name);


	if (empty($first_name) || empty($last_name) || empty($username) || empty($password) || empty($pwd) || empty($file))
	{
		header("Location:../register.php?error=Empty");
		exit();
	}
	elseif ($password <> $pwd)
	 {
		header("Location:../register.php?error=Password");
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		header("Location:../register.php?error=emailError");
		exit();
	}

	else

	{

		$sql = "SELECT * FROM register_db WHERE email = '$email'";
		$result = mysqli_query($conn,$sql);
		$rowcount = mysqli_num_rows($result);


		if ($rowcount > 0) {
			header("Location:../register.php?error=Exists");
			exit();
		}
		else
		{
			if(move_uploaded_file($file_loc,$folder.$final_file)){

			$token = 'gwertzuiopasdfghjklyxcvbmnQWERTZUIOPASDFGHJKLYXCVBMN0123456789!$/()*';
			$token =str_shuffle($token);
			$token = substr($token, 0,10);
			$pwdHash = password_hash($password,PASSWORD_DEFAULT);
			$sql = "INSERT INTO register_db(username,first_name,last_name,email,password,reg_date,reg_time,file,type,size,isEmailConfirmed,token) VALUES('$username','$first_name','$last_name','$email','$pwdHash','$reg_date','$reg_time','$final_file','$file_type','$new_size','0','$token');";
			$result = mysqli_query($conn,$sql);

			if ($result == TRUE)
			{

			require '../PHPMailer/class.phpmailer.php';
			require '../PHPMailer/class.smtp.php';
			$mail = new PHPMailer;
			$mail->setFrom('admin@example.com');
			$mail->addAddress($email);
			$mail->Subject = 'Verification Email';
			$mail->Body = "Please click on the link below to verfy your account:<br><br>
				<a href='127.0.0.1/ARPSMS/includes/emailverification.php?email=$email&token=$token'>Click Here</a>
			";
			$mail->IsSMTP('true');
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'ssl://smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Port = 465;

			//Set your existing gmail address as user name
			$mail->Username = 'martinallen722@gmail.com';

			//Set the password of your gmail address here
			$mail->Password = 'allenmartin10224';
			if(!$mail->send()) {
				echo 'Email is not sent.';
				echo 'Email error: ' . $mail->ErrorInfo;
			} else {
				echo 'Email has been sent.';
			}
			 header("Location:../register.php?error=Successful");
			 exit();
			}
			else
			{
				// header("Location:../register.php?error=Unseccessful");
				// exit();
				echo "string".$conn->error;
			}
		}
		}
	}

}




//Login User


if (isset($_POST['login'])) {

	// Checks for characters
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	// Checks for empty fields
	if (empty($email) || empty($password))
		{
		header("Location:../login.php?error=Empty&mail=".$email);
		exit();

	}
	else
		{
	// Checks if the SQL is correct
	$sql = "SELECT * FROM register_db WHERE email = ? OR password = ? ;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
	header("Location:../login.php?error=Sqle");
	exit();

	}else
	{
	mysqli_stmt_bind_param($stmt,"ss",$email,$email);
	mysqli_stmt_execute($stmt);
	$result =mysqli_stmt_get_result($stmt);

	$query = mysqli_query($conn,"SELECT * FROM register_db WHERE email = '$email'");
	$data = mysqli_fetch_array($query);

	$isEmailConfirmed = $data['isEmailConfirmed'];
	if($isEmailConfirmed ==0)
	{
		header("Location:../login.php?error=emailnotverified");
	exit();
	}

	elseif ($row = mysqli_fetch_assoc($result))
	 {
	$chekPass = password_verify($password,$row['password']);
	$role = $row['role'];
	$isEmailConfirmed = $row['1'];
	if ($chekPass == FALSE )
	{
	header("Location:../login.php?error=wrongpassword");
	exit();
	}
	else if ($chekPass == TRUE)

	session_start();
	$_SESSION['email'] = $row['email'];
	$_SESSION['role'] = $role;
	$_SESSION['user_id']= $row['user_id'];
	$_SESSION['last_login_timestamp'] = time();


	if ($role == '1') {
		header("Location:../index.php?Success");
	exit();

	}elseif ($role == '2') {
		header("Location:../supervisor_page.php?Success");
	exit();
	}elseif ($role == '3') {
			header("Location:../farmer_page.php?Success");
					exit();
	}
	elseif($role == '')
	{
		header("Location:../404.php?");
			exit();
	}
else
{
	header("Location:../login.php?error=fatalerror");
	exit();
	}

}
else
{
	header("Location:../login.php?error=nosuchuser");
	exit();
	}
}
}

}



//Register Farm



if (isset($_POST['register_farm'])) {


$fname = trim($_POST['fname']);
$fname = mysqli_real_escape_string($conn, $fname);

$lname = trim($_POST['lname']);
$lname = mysqli_real_escape_string($conn, $lname);

$uname = trim($_POST['uname']);
$uname = mysqli_real_escape_string($conn, $uname);

$email = trim($_POST['email']);
$email = mysqli_real_escape_string($conn, $email);

$phone = trim($_POST['phone']);
$phone = mysqli_real_escape_string($conn, $phone);

$address = trim($_POST['address']);
$address = mysqli_real_escape_string($conn, $address);

$scheme_id = trim($_POST['scheme_id']);
$scheme_id = mysqli_real_escape_string($conn, $scheme_id);

$fno = trim($_POST['fno']);
$fno = mysqli_real_escape_string($conn, $fno);

$fsize= trim($_POST['fsize']);
$fsize = mysqli_real_escape_string($conn, $fsize);

$user_id = trim($_POST['user_id']);
$user_id = mysqli_real_escape_string($conn, $user_id);


if (empty($address) || empty($scheme_id) || empty($fno) || empty($fsize) || empty($user_id) )

	 	{
		 header("Location:../register_farm.php?error=EmptyFields");
		 exit();

		}else
					{
						$sql = "SELECT * FROM register_db R, farms F WHERE R.user_id = F.user_id AND email = '$email'";
						$result = mysqli_query($conn,$sql);
						$check = mysqli_num_rows($result);

						if ($check > 0) {
															 echo "<script type='text/javascript' class='alert alert-success'>alert('Unsuccessful! Farm already exist,please try again!')</script>";
																		echo '<meta http-equiv="refresh" content="0; url=../farmer_page.php">';
														}else	{
																		$sql = "INSERT INTO farms (phone,address,scheme_id,fnumber,farm_size,user_id) VALUES('$phone','$address','$scheme_id','$fno','$fsize','$user_id');";
																		$result1 = mysqli_query($conn,$sql);

																		if ($result1 == TRUE) {

																						echo "<script type='text/javascript' class='alert alert-success'>alert('Submitted successfully! Thanks for registering with us!')</script>";
																						echo '<meta http-equiv="refresh" content="0; url=../farmer_page.php">';
																		}
																		else
																		{
																			 echo "Please Try again Later! or Contact the administrator!" .$conn->error;
																		}
																	}
					}
}

?>

// Suspend Farmers
<?php
	if (!(isset($_GET['suspend']))){
		$idfarmer = $_GET['id_farmer'];
		$sqlsuspendfarmer = "UPDATE register_db SET isSuspended = 1 WHERE user_id = $idfarmer";
		$resultsuspendfarmer = mysqli_query($conn,$sqlsuspendfarmer);
		if ($resultsuspendfarmer) {
				header("Location:../my_farmers.php");
			}else {
			header("Location:../my_farmers.php");
		}

	}else {
		echo "Cool Bro Try Later!";
	}



 ?>

//Retrieve Suspension
<?php
	if (!(isset($_GET['RetrieveSus']))){
		$idfarmer1 = $_GET['id_farmer1'];
		$sqlsuspendfarmer1 = "UPDATE register_db SET isSuspended = 0 WHERE user_id = $idfarmer1";
		$resultsuspendfarmer1 = mysqli_query($conn,$sqlsuspendfarmer1);
		if ($resultsuspendfarmer1) {
				header("Location:../suspended_farmers.php");
			}else {
			header("Location:../suspended_farmers.php");
		}

	}else {
		echo "Cool Bro Try Later!";
	}



 ?>




<?php

//Add items

if (isset($_POST['add_item'])) {
$product_category = mysqli_real_escape_string($conn,$_POST['product_category']);
$product_name = mysqli_real_escape_string($conn,$_POST['product_name']);
$product_price = mysqli_real_escape_string($conn,$_POST['product_price']);

if (empty($product_category) || empty($product_name) || empty($product_price)) {
header("Location:../add_item.php?error=Empty");
exit();
}
else
{
$sql = "INSERT INTO products(brand_id,product_name,product_price) VALUES('$product_category','$product_name','$product_price')";
$result = mysqli_query($conn,$sql);

if ($result)
 {
	header("Location:../add_item.php?error=Successful");
	exit();
}
else
{
	echo "string".$conn->error;
}
}
}



//Change Password
if (isset($_POST['submit_reset'])) {

$email = mysqli_real_escape_string($conn,$_POST['email']);

$sql = "SELECT * FROM register_db WHERE email='$email'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
$data = mysqli_fetch_array($result);
$emailData =$data['email'];
$user_id = $data['user_id'];

$url = 'http://'.$_SERVER['SERVER_NAME'].'/ARPSMS/password_reset.php?user_id='.$user_id.'&email='.$emailData;
$output = 'Hi. Please click this link to change your password.<br>'.$url;

if ($email == $emailData) {


							require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
			require '/usr/share/php/libphp-phpmailer/class.smtp.php';
			$mail = new PHPMailer;
			$mail->setFrom('admin@example.com');
			$mail->addAddress($email);
			$mail->Subject = 'Password Reset';
			$mail->Body = $output;
			$mail->IsSMTP('true');
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'ssl://smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Port = 465;

			//Set your existing gmail address as user name
			$mail->Username = 'martinallen722@gmail.com';

			//Set the password of your gmail address here
			$mail->Password = 'allenmartin10224';
			if(!$mail->send()) {
				 header("Location:../reset-password.php?error=notsent");
			exit();
			} else {
				 header("Location:../reset-password.php?error=sent");
			exit();
			}
}
else
{
header("Location:../reset-password.php?fatalerror");
exit();
}
}

//Forgot Password -Send mail
if (isset($_POST['submit_forgot'])) {

$email = mysqli_real_escape_string($conn,$_POST['email']);

$sql = "SELECT * FROM register_db WHERE email='$email'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
$data = mysqli_fetch_array($result);
$emailData =$data['email'];
$user_id = $data['user_id'];

$url = 'http://'.$_SERVER['SERVER_NAME'].'/ARPSMS/forgot_password.php?user_id='.$user_id.'&email='.$emailData;
$output = 'Hi. Please click this link to reset your password.<br>'.$url;

if ($email == $emailData) {


							require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
			require '/usr/share/php/libphp-phpmailer/class.smtp.php';
			$mail = new PHPMailer;
			$mail->setFrom('admin@example.com');
			$mail->addAddress($email);
			$mail->Subject = 'Password Recovery';
			$mail->Body = $output;
			$mail->IsSMTP('true');
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'ssl://smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Port = 465;

			//Set your existing gmail address as user name
			$mail->Username = 'martinallen722@gmail.com';

			//Set the password of your gmail address here
			$mail->Password = 'allenmartin10224';
			if(!$mail->send()) {
				header("Location:../reset-password.php?error=notsent");
			exit();
			} else {
				 header("Location:../reset-password.php?error=sent");
			exit();
			}
}
else
{
header("Location:../reset-password.php?fatalerror");
exit();
}
}

































?>


// Check if submit button is clicked

if (isset($_POST['submit'])) {
	$first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
	$last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

	//Date and Time
	$reg_date = date("Y-m-d");
	$reg_time = date("H:i:s");

	//Image Insertion
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="image/";


	/* new file size in KB */
	$new_size = $file_size/1024;
	/* new file size in KB */

	/* make file name in lower case */
	$new_file_name = strtolower($file);
	/* make file name in lower case */

	$final_file=str_replace(' ','-',$new_file_name);


	if (empty($first_name) || empty($last_name) || empty($username) || empty($password) || empty($pwd) || empty($file))
	{
		header("Location:../register.php?error=Empty");
		exit();
	}
	elseif ($password <> $pwd)
	 {
		header("Location:../register.php?error=Password");
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		header("Location:../register.php?error=emailError");
		exit();
	}

	else

	{

		$sql = "SELECT * FROM register_db WHERE email = '$email'";
		$result = mysqli_query($conn,$sql);
		$rowcount = mysqli_num_rows($result);


		if ($rowcount > 0) {
			header("Location:../register.php?error=Exists");
			exit();
		}
		else
		{
			if(move_uploaded_file($file_loc,$folder.$final_file)){

			$token = 'gwertzuiopasdfghjklyxcvbmnQWERTZUIOPASDFGHJKLYXCVBMN0123456789!$/()*';
			$token =str_shuffle($token);
			$token = substr($token, 0,10);
			$pwdHash = password_hash($password,PASSWORD_DEFAULT);
			$sql = "INSERT INTO register_db(username,first_name,last_name,email,password,reg_date,reg_time,file,type,size,isEmailConfirmed,token) VALUES('$username','$first_name','$last_name','$email','$pwdHash','$reg_date','$reg_time','$final_file','$file_type','$new_size','0','$token');";
			$result = mysqli_query($conn,$sql);

			if ($result == TRUE)
			{

			require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
			require '/usr/share/php/libphp-phpmailer/class.smtp.php';
			$mail = new PHPMailer;
			$mail->setFrom('admin@example.com');
			$mail->addAddress($email);
			$mail->Subject = 'Verification Email';
			$mail->Body = "Please click on the link below to verfy your account:<br><br>
				<a href='127.0.0.1/ARPSMS/includes/emailverification.php?email=$email&token=$token'>Click Here</a>
			";
			$mail->IsSMTP('true');
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'ssl://smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Port = 465;

			//Set your existing gmail address as user name
			$mail->Username = 'martinallen722@gmail.com';

			//Set the password of your gmail address here
			$mail->Password = 'allenmartin10224';
			if(!$mail->send()) {
				echo 'Email is not sent.';
				echo 'Email error: ' . $mail->ErrorInfo;
			} else {
				echo 'Email has been sent.';
			}
			 header("Location:../register.php?error=Successful");
			 exit();
			}
			else
			{
				header("Location:../register.php?error=Unseccessful");
				exit();
			}
		}
		}
	}

}




//Login User


if (isset($_POST['login'])) {

	// Checks for characters
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	// Checks for empty fields
	if (empty($email) || empty($password))
		{
		header("Location:../login.php?error=Empty&mail=".$email);
		exit();

	}
	else
		{
	// Checks if the SQL is correct
	$sql = "SELECT * FROM register_db WHERE email = ? OR password = ? ;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
	header("Location:../login.php?error=Sqle");
	exit();

	}else
	{
	mysqli_stmt_bind_param($stmt,"ss",$email,$email);
	mysqli_stmt_execute($stmt);
	$result =mysqli_stmt_get_result($stmt);

	$query = mysqli_query($conn,"SELECT * FROM register_db WHERE email = '$email'");
	$data = mysqli_fetch_array($query);

	$isEmailConfirmed = $data['isEmailConfirmed'];
	if($isEmailConfirmed ==0)
	{
		header("Location:../login.php?error=emailnotverified");
	exit();
	}

	elseif ($row = mysqli_fetch_assoc($result))
	 {
	$chekPass = password_verify($password,$row['password']);
	$role = $row['role'];
	$isEmailConfirmed = $row['1'];
	if ($chekPass == FALSE )
	{
	header("Location:../login.php?error=wrongpassword");
	exit();
	}
	else if ($chekPass == TRUE)

	session_start();
	$_SESSION['email'] = $row['email'];
	$_SESSION['role'] = $role;
	$_SESSION['user_id']= $row['user_id'];
	$_SESSION['last_login_timestamp'] = time();


	if ($role == '1') {
		header("Location:../index.php?Success");
	exit();

	}elseif ($role == '2') {
		header("Location:../supervisor_page.php?Success");
	exit();
	}elseif ($role == '3') {
			header("Location:../farmer_page.php?Success");
					exit();
	}
	elseif($role == '')
	{
		header("Location:../404.php?");
			exit();
	}
else
{
	header("Location:../login.php?error=fatalerror");
	exit();
	}

}
else
{
	header("Location:../login.php?error=nosuchuser");
	exit();
	}
}
}

}



//Register Farm



if (isset($_POST['register_farm'])) {


$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$uname = trim($_POST['uname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$address = trim($_POST['address']);
$scheme_id = trim($_POST['scheme_id']);
$fno = trim($_POST['fno']);
$fsize= trim($_POST['fsize']);
$user_id = trim($_POST['user_id']);

if (empty($phone) || empty($address) || empty($scheme_id) || empty($fno) || empty($fsize) || empty($user_id))

	 {
		 header("Location:../register_farm.php?error=EmptyFields");
		 exit();
	}
	else
	{
		$sql = "SELECT * FROM register_db JOIN farms ON register_db.user_id = farms.user_id WHERE email = '$email' && fnumber='$fno'";
		$result = mysqli_query($conn,$sql);
		$check = mysqli_num_rows($result);

		if ($check > 0) {
			 echo "<script type='text/javascript' class='alert alert-success'>alert('Unsuccessful! Farm already exist,please try again!')</script>";
						echo '<meta http-equiv="refresh" content="0; url=../index.php">';
		}

	else
	{
		$sql = "INSERT INTO farms (phone,address,scheme_id,fnumber,farm_size,user_id) VALUES('$phone','$address','$scheme_id','$fno','$fsize','$user_id');";
		$result = mysqli_query($conn,$sql);

		if ($result == TRUE) {

						echo "<script type='text/javascript' class='alert alert-success'>alert('Submitted successfully! Thanks for registering with us!')</script>";
						echo '<meta http-equiv="refresh" content="0; url=../farmer_page.php">';
		}
		else
		{
			 echo "string" .$conn->error;
		}
	}
}
}

?>
<?php

//Add items

if (isset($_POST['add_item'])) {
$product_category = mysqli_real_escape_string($conn,$_POST['product_category']);
$product_name = mysqli_real_escape_string($conn,$_POST['product_name']);
$product_price = mysqli_real_escape_string($conn,$_POST['product_price']);

if (empty($product_category) || empty($product_name) || empty($product_price)) {
header("Location:../add_item.php?error=Empty");
exit();
}
else
{
$sql = "INSERT INTO products(brand_id,product_name,product_price) VALUES('$product_category','$product_name','$product_price')";
$result = mysqli_query($conn,$sql);

if ($result)
 {
	header("Location:../add_item.php?error=Successful");
	exit();
}
else
{
	echo "string".$conn->error;
}
}
}


//Change Password
if (isset($_POST['submit_reset'])) {

$email = mysqli_real_escape_string($conn,$_POST['email']);

$sql = "SELECT * FROM register_db WHERE email='$email'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
$data = mysqli_fetch_array($result);
$emailData =$data['email'];
$user_id = $data['user_id'];

$url = 'http://'.$_SERVER['SERVER_NAME'].'/ARPSMS/password_reset.php?user_id='.$user_id.'&email='.$emailData;
$output = 'Hi. Please click this link to change your password.<br>'.$url;

if ($email == $emailData) {


							require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
			require '/usr/share/php/libphp-phpmailer/class.smtp.php';
			$mail = new PHPMailer;
			$mail->setFrom('admin@example.com');
			$mail->addAddress($email);
			$mail->Subject = 'Password Reset';
			$mail->Body = $output;
			$mail->IsSMTP('true');
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'ssl://smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Port = 465;

			//Set your existing gmail address as user name
			$mail->Username = 'martinallen722@gmail.com';

			//Set the password of your gmail address here
			$mail->Password = 'allenmartin10224';
			if(!$mail->send()) {
				echo 'Email is not sent.';
				echo 'Email error: ' . $mail->ErrorInfo;
			} else {
				 header("Location:../reset-password.php?error=sent");
			exit();
			}
}
else
{
header("Location:../reset-password.php?fatalerror");
exit();
}
}

//Forgot Password -Send mail
if (isset($_POST['submit_forgot'])) {

$email = mysqli_real_escape_string($conn,$_POST['email']);

$sql = "SELECT * FROM register_db WHERE email='$email'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
$data = mysqli_fetch_array($result);
$emailData =$data['email'];
$user_id = $data['user_id'];

$url = 'http://'.$_SERVER['SERVER_NAME'].'/ARPSMS/forgot_password.php?user_id='.$user_id.'&email='.$emailData;
$output = 'Hi. Please click this link to reset your password.<br>'.$url;

if ($email == $emailData) {


							require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
			require '/usr/share/php/libphp-phpmailer/class.smtp.php';
			$mail = new PHPMailer;
			$mail->setFrom('admin@example.com');
			$mail->addAddress($email);
			$mail->Subject = 'Password Recovery';
			$mail->Body = $output;
			$mail->IsSMTP('true');
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'ssl://smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Port = 465;

			//Set your existing gmail address as user name
			$mail->Username = 'martinallen722@gmail.com';

			//Set the password of your gmail address here
			$mail->Password = 'allenmartin10224';
			if(!$mail->send()) {
				echo 'Email is not sent.';
				echo 'Email error: ' . $mail->ErrorInfo;
			} else {
				 header("Location:../reset-password.php?error=sent");
			exit();
			}
}
else
{
header("Location:../reset-password.php?fatalerror");
exit();
}
}

































?>
