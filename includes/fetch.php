<?php
require 'includes/db1.php';


	// Fetch farm details
 $sqlinfo = "SELECT * FROM orders JOIN products ON orders.order_id = products.product_id";
 $result = mysqli_query($conn, $sqlinfo);

 $sql1 = "SELECT fnumber FROM farms F,register_db R WHERE F.farm_id = R.user_id ";
 $result1 = mysqli_query($conn, $sql1);

// Fetch Supervisors
 $sqlsupervisor = "SELECT * FROM register_db R,scheme S  WHERE R.user_id= S.sup_id";
 $resultsupervisor = mysqli_query($conn,$sqlsupervisor);

 // Fetch Farmers
 $sqlfarmers = "SELECT * FROM register_db R,farms F WHERE R.user_id = F.farm_id";
 $resultfarmers = mysqli_query($conn,$sqlfarmers);

 // Fetch Schemes with their supervisors
 $sqlscheme = "SELECT * FROM scheme S, register_db R WHERE user_id = sup_id;";
 $resultscheme = mysqli_query($conn,$sqlscheme);

 // Fetch Schemes without Supervisors
 // Fetch Farmers
 $sqlscheme2 = "SELECT * FROM scheme S,register_db R WHERE S.scheme_id = R.user_id AND S.sup_id IS NULL ";
 $resultscheme2 = mysqli_query($conn,$sqlscheme2);

?>
