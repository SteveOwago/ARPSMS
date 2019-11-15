<?php
require ('includes/ses3.php');
include ('includes/header.php');
include ('nav_bar/navbar.php');
require 'includes/db1.php';
require 'includes/display.php';

if($_SESSION['email'])
  {
$result = mysqli_query($conn, "SELECT * FROM farms F, register_db R WHERE F.farm_id = R.user_id");
while($row = mysqli_fetch_array($result)){
$phone = $row['phone'];
$address = $row['address'];


}
    ?>
<?php
}
?>
 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    var commentsCount= 2;
    $("button").click(function(){
      commentsCount = commentsCount +2;
      $("#comments").load("load-comments.php",{
        commentNewCount: commentsCount
      });
    })
  });

  </script>



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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Upcoming Activities</h1>
            <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>



           <div class="row">
             <div class="col-xl-2">
             </div>

            <!-- Area Chart -->
            <div class="col-xl-8">
              <div class="card shadow mb-4">

                <!-- Card Body -->
                <div class="card-body">

                    <div class="row" >
                    <div id="comments">
                    <?php
                    $sql = "SELECT * FROM activities LIMIT 2";
                    $result = mysqli_query($conn,$sql);

                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<p>";
                        echo '<i>'.$row['author'].'</i>';
                         echo "<br>";
                         echo $row['adate'];
                         echo "<br>";
                          echo $row['atime'];
                         echo "<br>";
                          echo $row['venue'];
                         echo "<br>";
                          echo $row['activity'];
                          echo "<br>";

                        echo "</p>";
                      }
                    }
                    else
                    {
                      echo "There are no comments";
                    }

                    ?>


                    </div>
                    </div>
                     <button class="btn-info btn-sm">Show More Activities</button>


                    </div>

                </div>
              </div>
            </div>




        </div>
        <!-- /.container-fluid -->

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
