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
         <h1 class="h3 mb-1 text-gray-800">View Supervisor</h1><br><br>


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
                 <h6 class="m-0 font-weight-bold text-primary">View Supervisor</h6>
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
               <label>Scheme Name</label>
          <input class="card mb-4 py-3 border-bottom-success form-control" type="text" value="<?php echo $scheme_name; ?>">
              <label>Username</label>
            <input class="card mb-4 py-3 border-bottom-success form-control" type="text" value="<?php echo $username; ?>">
            <label>First Name</label>
           <input class="card mb-4 py-3 border-bottom-success form-control" type="text" value="<?php echo $first_name; ?>" >
           <label>Last Name</label>
          <input class="card mb-4 py-3 border-bottom-success form-control" type="text" value="<?php echo $last_name; ?>">
          <label>Email Address</label>
          <input class="card mb-4 py-3 border-bottom-success form-control" type="text" value="<?php echo $email; ?>">
          <label>Supervisor Start Date</label>
          <input class="card mb-4 py-3 border-bottom-success form-control" type="text" value="<?php echo $sup_start_date; ?>"><br>
              <a href="update_supervisors.php" class="btn btn-success btn-sm">Back</a>
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
