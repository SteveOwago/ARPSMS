
<?php
 include_once ('includes/ses2.php');
  include_once ('includes/db1.php');


?>
<!DOCTYPE php>
<php lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ARPSMS</title>

  <!-- Custom fonts for this template-->
  <link rel="shortcut icon" href="http://localhost/ARPSMS/includes/image/logo.ico". " type="image/x-icon">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style>
  .content-table thead tr{
   background-color: #009879;
   color: #ffffff;
   text-align: left;
   font-weight: bold;
  }
  .content-table th,.content-table td{
    padding: 12px 15px;
  }
  .content-table tbody tr:nth-of-type(even){
    background-color: #f3f3f3;
  }
  .content-table{
    border-collapse: collapse;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
  }
  </style>

</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="supervisor_page.php">
           <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-crop"></i>
           </div>
           <div class="sidebar-brand-text mx-3">ARPSMS</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item active">
           <a class="nav-link" href="supervisor_page.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
           Interface
         </div>

         <!-- Nav Item - Charts -->
         <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>User Management</span>
           </a>
           <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">User Management:</h6>
               <a class="collapse-item" href="my_farmers.php">My Farmers</a>
               <a class="collapse-item" href="suspended_farmers.php">Suspend Farmers</a>
               <a class="collapse-item" href="delete_farmers.php">Delete Farmers</a>
             </div>
           </div>
         </li>

         <!-- Nav Item - Tables -->

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Notifications</span>
           </a>
           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">Notifications:</h6>
               <a class="collapse-item" href="#">Add Notifications</a>
               <a class="collapse-item" href="farm.php">Delete Notifications</a>
             </div>
           </div>
         </li>

         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-wrench"></i>
             <span>My Orders</span>
           </a>
           <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">View Orders:</h6>
               <a class="collapse-item" href="orders_supervisor.php">All Orders</a>
               <a class="collapse-item" href="supervisor_delivered.php">Delivered Orders</a>
               <!-- <a class="collapse-item" href="utilities-other.">Scarer</a> -->
             </div>
           </div>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
           Addons
         </div>

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Messages</span>
           </a>
           <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
               <h6 class="collapse-header">Items:</h6>
               <a class="collapse-item" href="add_items.php">Add Items</a>
               <a class="collapse-item" href="delete_items.php">Delete Items</a>

             </div>
           </div>
         </li>


         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

       </ul>
       <!-- End of Sidebar -->
       
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
            <?php
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


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>

            <div class="card-body">
              <?php
              if(isset($_GET['error']))
              {
              if($_GET['error'] =="Successful"){
              echo '<div class="alert alert-success" role="alert">Supervisor Deleted Successfully!</div>';
              }
              elseif ($_GET['error'] == "error") {
              echo '<div class="alert alert-danger" role="alert">An Error Occured! Please Try Again!</div>';
              }
              }
              ?>
              <div class="table-responsive">
                 <table class="table table-bordered content-table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Email Address</th>
                      <th>Scheme</th>
                      <th>Farm Number</th>
                      <th>Date of Registration</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Username</th>
                      <th>Email Address</th>
                      <th>Scheme</th>
                      <th>Farm Number</th>
                      <th>Date of Registration</th>

                      <th class="text-center">Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php
                  include_once ('includes/fetch.php');
                   while($data = mysqli_fetch_array($resultfarmers)) {  ?>
                    <tr>
                      <td> <?php echo $data['username']; ?></td>
                      <td> <?php echo $data['email']; ?></td>
                      <td><?php echo $data['farm_name']; ?></td>
                      <td> <?php echo $data['fnumber']; ?></td>
                      <td> <?php echo $data['reg_date']; ?></td>

                       <td class="text-center" ><a href="edit_farmers.php?efarmers=<?php echo $data['scheme_id']; ?>"><button type="button" class="btn btn-info btn-sm">Edit</button></a>
                         <a href="view_farmers.php?vfarmers=<?php echo $data['scheme_id']; ?>"><button type="button" class="btn btn-success btn-sm">View</button></a>
                        <a href="includes/delete_farmer.php?dfarmers=<?php echo $data['farm_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></td>

                    </tr>
                    <?php
                                   }

                            ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
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
          <a class="btn btn-primary" href="includes/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</php>
