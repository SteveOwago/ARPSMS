<?php
require 'includes/ses.php';
include ('includes/header.php');
include ('nav_bar/navbar_admin.php');
require 'includes/db1.php';
require 'includes/display.php';

?>



       <!-- Begin Page Content -->
       <div class="container-fluid"><br><br>

         <!-- Page Heading -->
         <h1 class="h3 mb-1 text-gray-800">View Comments</h1><br><br>


         <form action="includes/func.php" method="POST">
         <!-- Content Row -->
         <div class="row">

           <!-- Border Left Utilities -->
           <div class="col-lg-3">

           </div>


            <!-- Border Left Utilities -->
           <div class="col-lg-5">
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Farmers General Comments</h6>
               </div>
               <!-- Display Error Message -->
               <?php
                if(isset($_GET['error']))
                {
                if($_GET['error'] =="Successful"){
                echo '<div class="alert alert-success" role="alert">Item Inserted Successfully!</div>';
                }
                elseif ($_GET['error'] == "Empty") {
                echo '<div class="alert alert-danger" role="alert">All Fields Must Be Filled</div>';
                }
                }
                ?>
               <div class="card-body">


                 <?php

                     include("includes/functions.php");

                     $id = $_GET['id'];

                     $query ="UPDATE `notifications` SET `status` = 'read' WHERE `id` = $id;";
                     performQuery($query);

                     $query = "SELECT * from `notifications` where `id` = '$id';";
                     if(count(fetchAll($query))>0){
                         foreach(fetchAll($query) as $i){
                             if($i['type']=='like'){
                                 echo ucfirst($i['name'])." liked your post. <br/>".$i['date'];
                             }else{
                                 echo "Someone commented on your post.<br/>".$i['message'];
                             }
                         }
                     }

                 ?><br/><br>
                 <a class="btn btn-info btn-sm" href="index.php"><i class="fa fa-home" ></i></a>
               </div>
             </div>
           </div>

            <!-- Border Left Utilities -->
           <div class="col-lg-4">

           </div>



         </div>

     </form>

       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- End of Main Content -->

     <!-- Footer -->
     <?php include_once ('includes/footer.php');?>
     <!-- End of Footer -->
</body>
<?php include ('includes/script.php');
?>
</html>
<!-- <script src="js/Vendor/jquery.min.js"></script> -->
<script src="js/inputmask.js"></script>

  <script src="js/jquery.inputmask.js"></script>

<script>

$(document).ready(function(){
//input masking
    $('#phone').inputmask("99999999");
});
</script>
