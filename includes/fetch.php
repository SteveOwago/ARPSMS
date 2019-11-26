<?php
require 'includes/db1.php';


	// Fetch orders details
 $sqlinfo = "SELECT * FROM orders O JOIN products P , register_db R WHERE R.user_id = O.user_id AND O.product_id=P.product_id";
 $result = mysqli_query($conn, $sqlinfo);

 //Fetch farms for a supervisor.
 $superfarms = "SELECT sup_id,supa_id FROM farms F,scheme S  WHERE F.supa_id = S.sup_id";
 $resultsuperfarms = mysqli_query($conn, $superfarms);

 $sql1 = "SELECT fnumber FROM farms F,register_db R WHERE F.farm_id = R.user_id ";
 $result1 = mysqli_query($conn, $sql1);

// Fetch Supervisors
 $sqlsupervisor = "SELECT * FROM register_db R,scheme S  WHERE R.user_id= S.sup_id";
 $resultsupervisor = mysqli_query($conn,$sqlsupervisor);

 // Fetch Farmers
 $sqlfarmers = "SELECT * FROM register_db R,farms F WHERE R.user_id = F.user_id";
 $resultfarmers = mysqli_query($conn,$sqlfarmers);

// Fetch suspended farmers
$sqlsuspendedfarmers = "SELECT * FROM register_db WHERE role = 3 AND isSuspended = 1 ";
$suspendedfarmers = mysqli_query($conn,$sqlsuspendedfarmers);

 // Fetch Schemes with their supervisors
 $sqlscheme = "SELECT * FROM scheme S, register_db R WHERE user_id = sup_id;";
 $resultscheme = mysqli_query($conn,$sqlscheme);

 // Fetch Schemes without Supervisors
 // Fetch Farmers
 $sqlscheme2 = "SELECT * FROM scheme S,register_db R WHERE S.scheme_id = R.user_id AND S.sup_id IS NULL ";
 $resultscheme2 = mysqli_query($conn,$sqlscheme2);

?>
