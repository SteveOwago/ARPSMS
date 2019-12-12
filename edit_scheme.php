<?php
include ('includes/header.php');
include ('nav_bar/navbar_admin.php');
require 'includes/db1.php';
require 'includes/display.php';

?>



       <!-- Begin Page Content -->
       <div class="container-fluid"><br><br>

         <!-- Page Heading -->
         <h1 class="h3 mb-1 text-gray-800">Register Farm</h1><br><br>


<form action="includes/update.php" method="POST">
         <!-- Content Row -->
         <div class="row">

           <!-- Border Left Utilities -->
           <div class="col-lg-3">

           </div>


            <!-- Border Left Utilities -->
           <div class="col-lg-5">
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Update Scheme</h6>
               </div>
               <div class="card-body">
              <label>Scheme Number</label>
           <input class="card mb-4 py-3 border-bottom-success form-control" type="text"  name="scheme_id" value="<?php echo $scheme_id;?>"><br>
            <label>Scheme Name</label>
           <input class="card mb-4 py-3 border-bottom-success form-control" type="text"  value="<?php echo $scheme_name;?>" name="scheme_name"> <br>
           <label>Select Supervisor</label>
           <select border-bottom-success placeholder="Select supervisor..." name="sup_id">
                  <option value="" >Select supervisor...</option>
                  <?php
                  $sql = "SELECT * FROM register_db ORDER BY user_id ASC";
                  $result = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?php echo $data['user_id']; ?>"><?php echo $data['username']; ?></option>
                  <?php
                  }

                  ?>
              </select><br><br>

              <button class="btn btn-success btn-sm" name="update_scheme" type="update_scheme">Submit</button>
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
