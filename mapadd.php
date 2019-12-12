
<?php
  require('includes/db1.php');
   require('includes/ses3.php');
?>

<?php
$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO location_address (name,address,lat,lng,type,user_id)
  VALUES ('$name','$address','$lat','$lng','$type','$user_id')";

if ($conn->query($sql) === TRUE) {

    echo 1;

}else{
  echo 2;

}
?>
