

<?php $__env->startSection('title', 'login password'); ?>

<?php $__env->startSection('content'); ?>


 <!-- start page content -->
      <div class="page">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="user-sidebar">
                     <?php echo $__env->make('Client_layout.dashboardheader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                     
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="user-content">
                     <h3 class="text-center">
                        Update Password                    
                     </h3>
                     <form action="" method="post">
                        <input type="hidden" name="_csrf" value="305e2e05d29f55b50a14ad09db8b623c" />                        
                        <div class="row">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label for="">New Password *</label>
                                 <input type="password" class="form-control" name="cust_password">
                              </div>
                              <div class="form-group">
                                 <label for="">Retype New Password *</label>
                                 <input type="password" class="form-control" name="cust_re_password">
                              </div>
                              <input type="submit" class="btn btn-primary" value="Update" name="form1">
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  <!-- end page content -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('Client_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views\Client\loginpassword.blade.php ENDPATH**/ ?>