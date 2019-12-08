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
         <h1 class="h3 mb-1 text-gray-800">Add Scheme</h1><br><br>


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
                 <h6 class="m-0 font-weight-bold text-primary">Add Scheme</h6>
               </div>
               <!-- Display Error Message -->
               <?php
                if(isset($_GET['error']))
                {
                if($_GET['error'] =="successful"){
                echo '<div class="alert alert-success" role="alert">Item Inserted Successfully!</div>';
                }
                elseif ($_GET['error'] == "empty") {
                echo '<div class="alert alert-danger" role="alert">All Fields Must Be Filled</div>';
                }
                elseif ($_GET['error'] == "exists") {
                echo '<div class="alert alert-danger" role="alert">Farm Already Exists</div>';
                }
                }
                ?>
               <div class="card-body">

            <label>Scheme Name</label>
           <input class="card mb-4 py-3 border-bottom-success form-control" type="text" name="scheme_name"><br>
          <label>Product Category</label>
              <select border-bottom-success placeholder="Product Category..." name="sup_id">
                     <option value="" >Product Category....</option>
                     <?php
                     $sql = "SELECT * FROM register_db WHERE role = 3 ORDER BY first_name ASC";
                     $result = mysqli_query($conn,$sql);
                     while($data = mysqli_fetch_array($result)) {
                     ?>
                     <option value="<?php echo $data['user_id']; ?>"><?php echo $data['first_name']; ?></option>
                     <?php
                     }

                     ?>
                 </select><br><br>
              <button class="btn btn-success btn-sm" name="add_scheme" type="add_item">Submit</button>
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
