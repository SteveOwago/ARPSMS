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
       <a class="nav-link" href="index.php">
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
           <a class="collapse-item" href="#">Add Farmers</a>
           <a class="collapse-item" href="update_farmers.php">Delete Farmers</a>
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
           <a class="collapse-item" href="view_farm_orders.php">All Orders</a>
           <a class="collapse-item" href="#">Delivered Orders</a>
           <a class="collapse-item" href="#">Yet to be Delivered</a>
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


     <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
         <i class="fas fa-fw fa-cog"></i>
         <span>Farm Management</span>
       </a>
       <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Farm Management:</h6>
           <a class="collapse-item" href="add_schemes.php">Add Schemes</a>
           <a class="collapse-item" href="view_scheme.php">Delete Schemes</a>
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
         <a class="btn btn-primary" href="includes/logout.php">Logout</a>
       </div>
     </div>
   </div>
 </div>
