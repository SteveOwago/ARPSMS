<?php
require ('includes/ses.php');
include ('includes/header.php');
include ('nav_bar/navbar_admin.php');
require 'includes/db1.php';
require 'includes/display.php';




?>



       <!-- Begin Page Content -->
       <div class="container-fluid"><br><br>

         <!-- Page Heading -->
         <h1 class="h3 mb-1 text-gray-800">Update Products</h1><br><br>


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
                 <h6 class="m-0 font-weight-bold text-primary">Update Products</h6>
               </div>
               <div class="card-body">
              <label>Item Name</label>
           <input class="card mb-4 py-3 border-bottom-success form-control" name="product_name" type="text" value="<?php echo $product_name;?>"><br>
            <label>Item Price</label>
           <input class="card mb-4 py-3 border-bottom-success form-control" name= "product_price" type="text" value="<?php echo $product_price;?>"><br>


              <button class="btn btn-success btn-sm" name="update_pro" type="update_product">Submit</button>
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
