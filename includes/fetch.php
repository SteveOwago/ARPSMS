<?php
require 'includes/db1.php';



	// Fetch orders details
 $sqlinfo = "SELECT * FROM orders O JOIN products P , register_db R WHERE R.user_id = O.user_id AND O.product_id=P.product_id";
 $result = mysqli_query($conn, $sqlinfo);
	// // Fetch farm details
 // $sqlinfo = "SELECT * FROM orders JOIN products ON orders.order_id = products.product_id";
 // $result = mysqli_query($conn, $sqlinfo);


 //Fetch farms for a supervisor.
 $superfarms = "SELECT sup_id,supa_id FROM farms F,scheme S  WHERE F.supa_id = S.sup_id";
 $resultsuperfarms = mysqli_query($conn, $superfarms);

 $sql1 = "SELECT fnumber FROM farms F,register_db R WHERE F.farm_id = R.user_id ";
 $result1 = mysqli_query($conn, $sql1);

// Fetch Supervisors
 $sqlsupervisor = "SELECT * FROM register_db R,scheme S  WHERE R.user_id= S.sup_id";
 $resultsupervisor = mysqli_query($conn,$sqlsupervisor);

 // Fetch Farmers
 $sqlfarmers = "SELECT * FROM register_db R,farms F,scheme S WHERE R.user_id = F.farm_id AND F.scheme_id = S.scheme_id";
 $resultfarmers = mysqli_query($conn,$sqlfarmers);

// Fetch suspended farmers
$sqlsuspendedfarmers = "SELECT * FROM register_db WHERE role = 3 AND isSuspended = 1 ";
$suspendedfarmers = mysqli_query($conn,$sqlsuspendedfarmers);

 // Fetch Schemes with their supervisors
 $sqlscheme = "SELECT * FROM scheme S, register_db R WHERE user_id = sup_id;";
 $resultscheme = mysqli_query($conn,$sqlscheme);

 // Fetch Schemes without Supervisors
 // Fetch Farmers
 $sqlscheme2 = "SELECT * FROM scheme S WHERE sup_id IS NULL; ";
 $resultscheme2 = mysqli_query($conn,$sqlscheme2);

 //Orders
 $sqlorders = "SELECT * FROM register_db R,orders O,products P WHERE R.user_id = O.user_id AND O.product_id = P.product_id";
 $resultorders = mysqli_query($conn,$sqlorders);

 //All Orders
 $sqlorders = "SELECT * FROM register_db R,orders O,products P WHERE R.user_id = O.user_id AND O.product_id = P.product_id";
 $resultorders_delivered = mysqli_query($conn,$sqlorders);

 //Not delivered
 $sqlorders = "SELECT * FROM register_db R,orders O,products P WHERE R.user_id = O.user_id AND O.product_id = P.product_id AND O.status = 0";
 $resultorders_notdelivered = mysqli_query($conn,$sqlorders);

 //Delivered

  $sqlorders = "SELECT * FROM register_db R,orders O,products P WHERE R.user_id = O.user_id AND O.product_id = P.product_id AND O.status = 1";
 $resultorders_delivered = mysqli_query($conn,$sqlorders);

 //Products
   $sqlproducts = "SELECT * FROM products P, brands B WHERE P.brand_id = B.brand_id";
 $resultproducts = mysqli_query($conn,$sqlproducts);

?>
