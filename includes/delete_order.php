<?php
require 'db1.php';

// Delete Orders
if(isset($_GET['dl'])) {
$dl=$_GET['dl'];
$sql="DELETE FROM orders WHERE order_id='$dl'  ";
$sql=mysqli_query($conn,$sql);
header('location: ../orders_supervisor.php?error=Successful');
exit();
}
else {
header('location: ../orders_supervisor.php?error=error');
exit();
}

// Delete Supervisors
if(isset($_GET['dsuper'])) {
$dsuper=$_GET['dsuper'];
$sql="DELETE FROM scheme WHERE scheme_id='$dsuper'  ";
$sql=mysqli_query($conn,$sql);
header('location: ../update_supervisors.php?error=Successful');
exit();
}
else {
header('location: ../update_supervisors.php?error=error');
}


?>
