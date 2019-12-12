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


?>
