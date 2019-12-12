
<?php
require ('includes/ses3.php');
include ('includes/header.php');
include ('nav_bar/navbar.php');
require 'includes/db1.php';
require 'includes/display.php';

?>
<script>
function val ()
{

if(isNaN(frm.phone.value)){
alert("Phone Number Should be in Digits");
frm.phone.focus();
return false;

}

if ((frm.phone.value).length != 10)
{
alert("Phone Number should be at least 10 digits");
frm.phone.focus();
return false;
}
return true;
}
</script>


       <!-- Begin Page Content -->
       <div class="container-fluid"><br><br>

         <!-- Page Heading -->
         <h1 class="h3 mb-1 text-gray-800">Register Farm</h1><br><br>


<form action="includes/func.php" name="frm" method="POST">
         <!-- Content Row -->
         <div class="row">

           <!-- Border Left Utilities -->
           <div class="col-lg-4">
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Name Details</h6>
               </div>
               <?php
                 $user_id = $_SESSION['user_id'];
               ?>
               <div class="card-body">
               <input class="card mb-4 py-3 border-bottom-success form-control" type="" placeholder="First Name" name="fname" value="<?php echo $first_name;?>"><br>
               <input class="card mb-4 py-3 border-bottom-success form-control" type="" placeholder="Last Name"" name="lname" value="<?php echo $last_name;?>"><br>
               <input class="card mb-4 py-3 border-bottom-success form-control" type="" placeholder="Username" name="uname" value="<?php echo $username;?>">
               <input class="card mb-4 py-3 border-bottom-success form-control" type="" placeholder="Username" name="user_id" value="<?php echo $user_id;?>" style="visibility: hidden; height: 0;">
               </div>
             </div>
           </div>


            <!-- Border Left Utilities -->
           <div class="col-lg-4">
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Contact Details</h6>
               </div>
               <div class="card-body">
           <input class="card mb-4 py-3 border-bottom-success form-control" type="text" placeholder="Email Address" name="email" value="<?php echo $email;?>"><br>
           <input class="card mb-4 py-3 border-bottom-success form-control" type="text"  id="phone" placeholder="Enter Phone Number" name="phone"> <br>
           <input class="card mb-4 py-3 border-bottom-success form-control" type="text" placeholder="Alternative Number" name="phone2">
           <input class="card mb-4 py-3 border-bottom-success form-control" type="" placeholder="Username" name="uname" value="<?php echo $username;?>" style="visibility: hidden; height: 0;">
               </div>
             </div>
           </div>

            <!-- Border Left Utilities -->
           <div class="col-lg-4">
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Farm Information</h6>
               </div>
               <div class="card-body">
     <select placeholder="Select scheme..." name="scheme_id" class="border-bottom-success border-right-success">
     <option value="" >Select scheme...</option>
     <?php
     $sql = "SELECT * FROM scheme";
     $result = mysqli_query($conn,$sql);
     while($data = mysqli_fetch_array($result)) {
     ?>
     <option value="<?php echo $data['scheme_id']; ?>"><?php echo $data['scheme_name']; ?></option>
     <?php
     }

     ?>
    </select><br><br>


            <input class="card mb-4 py-3 border-bottom-success form-control" type="" placeholder="Farm Number"" name="fno"><br>
           <input class="card mb-4 py-3 border-bottom-success form-control" type="" placeholder="Farm Size" name="fsize">
           <input class="card mb-4 py-3 border-bottom-success form-control" type="" placeholder="Username" value="<?php echo $username;?>" style="visibility: hidden; height: 0;">

               </div>
             </div>
           </div>



         </div>
          <center>
             <button class="btn btn-success" onclick="return val();" name="register_farm">Pick Location &nbsp;<i class="fa fa-arrow-right"></i> </button>
           </center>
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
