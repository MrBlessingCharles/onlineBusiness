

<?php $__env->startSection('title', 'dashboard'); ?>

<?php $__env->startSection('content'); ?>
 <!-- ********************** start content ********************** -->
	  <!-- start page content -->
      <div class="page">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="user-sidebar">
                     <ul>
                        <a href="dashboard.php"><button class="btn btn-danger">Dashboard</button></a>
                        <a href="customer-profile-update.php"><button class="btn btn-danger">Update Profile</button></a>
                        <a href="customer-billing-shipping-update.php"><button class="btn btn-danger">Update Billing and Shipping Info</button></a>
                        <a href="customer-password-update.php"><button class="btn btn-danger">Update Password</button></a>
                        <a href="customer-order.php"><button class="btn btn-danger">Orders</button></a>
                        <a href="logout.php"><button class="btn btn-danger">Logout</button></a>
                     </ul>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="user-content">
                     <h3 class="text-center">
                        Welcome to the Dashboard                    
                     </h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  <!-- end page content -->
	  <!-- ********************** end content ********************** -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Client_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views\Client\dashboard.blade.php ENDPATH**/ ?>