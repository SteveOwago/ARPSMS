<?php
require 'includes/ses3.php';
include ('includes/header.php');
include ('nav_bar/navbar.php');
require 'includes/db1.php';
require 'includes/display.php';

?>

   <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">



            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php

            if (isset($_SESSION['email'])) {
            $sql = "SELECT * FROM register_db WHERE email='".$_SESSION['email']."'";
            $result = mysqli_query($conn,$sql);

            while ($user = mysqli_fetch_object($result)) {
            ?>
            <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-weight: bold;"><?php echo $user->first_name; ?>   <?php echo $user->last_name;  ?></span>
            <?
            }

          }

            ?>

             <?php


          $image = "SELECT file FROM register_db WHERE  email='".$_SESSION['email']."' ";
          $result = mysqli_query($conn,$image);
          $path=mysqli_fetch_assoc($result) or die("Could not fetch array : " .mysqli_error($conn));

            ?>
                <img class="img-profile rounded-circle" src="<?php echo 'includes/image/'.$path['file'];?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



          <script>
          function val ()
          {


          if ((tractor.qd.value).length > 2)
          {
          alert("Excess Quantity Entry");
          tractor.qd.focus();
          return false;
          }
          return true;
          }
          </script>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Order Farm Inputs</h1>
         <p>Ahero Rice Plantation Scheme Management System enables you to order tractors,seeds,fertilizers and bird-scarer <br> at farmers' own interests</p>
          <?php
              if(isset($_GET['error']))
              {
              if($_GET['error'] =="Unsuccessful"){
              echo '<div class="alert alert-danger" role="alert">An Error Occured. Please Try Again!</div>';
              }
              elseif ($_GET['error'] == "Allfield") {
              echo '<div class="alert alert-danger" role="alert">Please Fill All Fields!</div>';
              }
              }
              ?>

          <!-- Content Row -->
          <div class="row">


            <!-- First Column -->
            <div class="col-lg-6">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Order Fertilizer</h6>
                </div>
                <div class="card-body">
                  <form action="includes/converter.php" name = "tractor" method="POST">
                         <!-- Content Column -->
            <div class="col-lg-12 mb-12"><br>

              <!-- Project Card Example -->



              <div class="row">
                <div class="col-lg-6 "><br>
                 <label>Usename</label>
                      <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>

                <!-- Fetch Fertilizer -->
                 <label>Item</label>
        <select placeholder="Select scheme..." name="product_id">
      <option value="" >Select scheme...</option>
      <?php
      $sql = "SELECT * FROM products WHERE product_id = 1 ORDER BY product_name ASC";
      $result = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($result)) {
      ?>
      <option value="<?php echo $data['product_id']; ?>"><?php echo $data['product_name']; ?></option>
      <?php
      }

      ?>
     </select>
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Phone Number</label>
                     <input type="text" name="user_id"  placeholder="Hello" value="<?php echo $user_id;?>" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Product Quantitiy</label>
                     <input type="text" name="product_quantity" id="qd" placeholder="Enter the Quantitiy" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Scheme</label>
                 <input type="text" name="farm_name" value="<?php echo $scheme_name;?>" placeholder="Hello" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Expected Deleivery</label>
                  <input type="date" name="expected_delivery" placeholder="Expected Deleivery" class="form-control">
                </div>
              </div>

            </div><br>
            <center>
                  <button class="btn btn-success btn-sm" onclick="return val();" name="submit_order">Order Now</button>
                </center>
                  </form>
                </div>
              </div>

            </div>


             <!-- Order Seeds-->
            <div class="col-lg-6">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Order Seed</h6>
                </div>
                <div class="card-body">
                  <form action="includes/converter.php" name = "tractor" method="POST">
                         <!-- Content Column -->
            <div class="col-lg-12 mb-12"><br>

              <!-- Project Card Example -->


              <!-- Color System -->
              <div class="row">
                <div class="col-lg-6 "><br>

                 <label>Usename</label>
                      <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Item</label>
        <select placeholder="Select scheme..." name="product_id">
      <option value="" >Select scheme...</option>
      <?php
      $sql = "SELECT * FROM products WHERE product_id = 2 ORDER BY product_name ASC";
      $result = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($result)) {
      ?>
      <option value="<?php echo $data['product_id']; ?>"><?php echo $data['product_name']; ?></option>
      <?php
      }

      ?>
     </select>
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Phone Number</label>
                     <input type="text" name="user_id"  placeholder="Hello" value="<?php echo $user_id;?>" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Product Quantitiy</label>
                     <input type="text" name="product_quantity" id="qd" placeholder="Enter the Quantitiy" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Scheme</label>
                 <input type="text" name="farm_name" value="<?php echo $scheme_name;?>" placeholder="Hello" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Expected Deleivery</label>
                  <input type="date" name="expected_delivery" placeholder="Expected Deleivery" class="form-control">
                </div>
              </div>

            </div><br>
            <center>
                  <button class="btn btn-success btn-sm" onclick="return val();" name="submit_order">Order Now</button>
                </center>
                  </form>
                </div>
              </div>

            </div>

            <!--Order Tractor-->
             <div class="col-lg-6">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Order Tractor</h6>
                </div>
                <div class="card-body">
                  <form action="includes/converter.php" name = "tractor" method="POST">
                         <!-- Content Column -->
            <div class="col-lg-12 mb-12"><br>

              <!-- Project Card Example -->


              <!-- Color System -->
              <div class="row">
                <div class="col-lg-6 "><br>
                 <label>Usename</label>
                      <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Item</label>
        <select placeholder="Select scheme..." name="product_id">
      <option value="" >Select scheme...</option>
      <?php
      $sql = "SELECT * FROM products WHERE product_id = 3 ORDER BY product_name ASC";
      $result = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($result)) {
      ?>
      <option value="<?php echo $data['product_id']; ?>"><?php echo $data['product_name']; ?></option>
      <?php
      }

      ?>
     </select>
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Phone Number</label>
                     <input type="text" name="user_id"  placeholder="Hello" value="<?php echo $user_id;?>" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Product Quantitiy</label>
                     <input type="text" name="product_quantity" id="qd" placeholder="Enter the Quantitiy" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Scheme</label>
                 <input type="text" name="farm_name" value="<?php echo $scheme_name;?>" placeholder="Hello" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Expected Deleivery</label>
                  <input type="date" name="expected_delivery" placeholder="Expected Deleivery" class="form-control">
                </div>
              </div>

            </div><br>
            <center>
                  <button class="btn btn-success btn-sm" onclick="return val();" name="submit_order">Order Now</button>
                </center>
                  </form>
                </div>
              </div>

            </div>

            <!-- Order Scarer -->

              <div class="col-lg-6">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Order Scarer</h6>
                </div>
                <div class="card-body">
                  <form action="includes/converter.php" name = "tractor" method="POST">
                         <!-- Content Column -->
            <div class="col-lg-12 mb-12"><br>

              <!-- Project Card Example -->


              <!-- Color System -->
              <div class="row">
                <div class="col-lg-6 "><br>
                 <label>Usename</label>
                      <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Item</label>
        <select placeholder="Select scheme..." name="product_id">
      <option value="" >Select scheme...</option>
      <?php
      $sql = "SELECT * FROM products WHERE product_id = 4 ORDER BY product_name ASC";
      $result = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($result)) {
      ?>
      <option value="<?php echo $data['product_id']; ?>"><?php echo $data['product_name']; ?></option>
      <?php
      }

      ?>
     </select>
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Phone Number</label>
                     <input type="text" name="user_id"  placeholder="Hello" value="<?php echo $user_id;?>" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Product Quantitiy</label>
                     <input type="text" name="product_quantity" id="qd" placeholder="Enter the Quantitiy" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Scheme</label>
                 <input type="text" name="farm_name" value="<?php echo $scheme_name;?>" placeholder="Hello" class="form-control">
                </div><br>
                <div class="col-lg-6"><br>
                 <label>Expected Deleivery</label>
                  <input type="date" name="expected_delivery" placeholder="Expected Deleivery" class="form-control">
                </div>
              </div>

            </div><br>
            <center>
                  <button class="btn btn-success btn-sm" onclick="return val();" name="submit_order">Order Now</button>
                </center>
                  </form>
                </div>
              </div>

            </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php

      include ('includes/footer.php');
      ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php
include ('includes/script.php');


  ?>
