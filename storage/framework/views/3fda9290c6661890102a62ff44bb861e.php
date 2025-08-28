
<?php $__env->startSection('title', 'shipping coast'); ?>

<?php $__env->startSection('content'); ?>
 <!-- start content -->
      <div class="content-wrapper">
      <section class="content-header">
         <div class="content-header-left">
            <h1>Add Shipping Cost</h1>
         </div>
      </section>
       <?php if(session('status')): ?>
               <section class="content" style="min-height:auto;margin-bottom: -30px;">
                     <div class="row">
                     <div class="col-md-12">
                        <div class="callout callout-success">
                           <p><?php echo e(Session::get("status")); ?></p>
                        </div>
                     </div>
                     </div>
               </section>
      <?php endif; ?>
      <section class="content">
         <div class="row">
            <div class="col-md-12">
               <form class="form-horizontal" action="<?php echo e(url('admin/saveshippingcoast')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <div class="box box-info">
                     <div class="box-body">
                        <div class="form-group">
                           <label for="" class="col-sm-2 control-label">Select Country <span>*</span></label>
                           <div class="col-sm-4">
                              <select name="country_id" class="form-control select2">
                                 <option >Select a country</option>
                                 <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->country_name); ?></option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <!-- <option value="">Select a country</option>
                                 <option value="1">Afghanistan</option> -->
                                 <!-- <option value="2">Albania</option>
                                 <option value="3">Algeria</option>
                                 <option value="4">American Samoa</option>
                                 <option value="5">Andorra</option> -->
                                
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="" class="col-sm-2 control-label">Amount <span>*</span></label>
                           <div class="col-sm-4">
                              <input type="numeric" class="form-control" name="amount" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="" class="col-sm-2 control-label"></label>
                           <div class="col-sm-6">
                              <button type="submit" class="btn btn-success pull-left" name="form1">Add</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <section class="content-header">
         <div class="content-header-left">
            <h1>View Shipping Costs</h1>
         </div>
      </section>
      <section class="content">
         <div class="row">
            <div class="col-md-12">
               <div class="box box-info">
                  <div class="box-body table-responsive">
                     <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Country Name</th>
                              <th>Country Amount</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $shippingcoasts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shippingcoast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td><?php echo e($increment++); ?></td>
                              <td><?php echo e($shippingcoast->country ? $shippingcoast->country->country_name : ''); ?></td>
                              <td><?php echo e($shippingcoast->amount); ?></td>
                               <td style="display: flex;">
                                    <a href="<?php echo e(url('admin/editshippingcoast', [$shippingcoast->id])); ?>" class="btn btn-primary btn-xs">Edit</a>
                                    <!-- <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=1" data-toggle="modal" data-target="#confirm-delete">Delete</a> -->
                                    <form action="<?php echo e(url('admin/deleteshippingcoast', [$shippingcoast->id])); ?>" method="post">
                                       <?php echo csrf_field(); ?>
                                       <?php echo method_field('DELETE'); ?>
   
                                       <button type="submit" class="btn btn-danger btn-xs" style="margin-left:5px;">Delete</button>
                                    </form> 

                                 </td>
                              <!-- <td>
                                 <a href="shipping-cost-edit.php?id=3" class="btn btn-primary btn-xs">Edit</a>
                                 <a href="#" class="btn btn-danger btn-xs" data-href="shipping-cost-delete.php?id=3" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                              </td> -->
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <!-- <tr>
                              <td>2</td>
                              <td>Pakistan</td>
                              <td>10</td>
                              <td>
                                 <a href="shipping-cost-edit.php?id=2" class="btn btn-primary btn-xs">Edit</a>
                                 <a href="#" class="btn btn-danger btn-xs" data-href="shipping-cost-delete.php?id=2" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                              </td>
                           </tr>
                           <tr>
                              <td>3</td>
                              <td>United Arab Emirates</td>
                              <td>11</td>
                              <td>
                                 <a href="shipping-cost-edit.php?id=1" class="btn btn-primary btn-xs">Edit</a>
                                 <a href="#" class="btn btn-danger btn-xs" data-href="shipping-cost-delete.php?id=1" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                              </td>
                           </tr>
                           <tr>
                              <td>4</td>
                              <td>United States</td>
                              <td>0</td>
                              <td>
                                 <a href="shipping-cost-edit.php?id=4" class="btn btn-primary btn-xs">Edit</a>
                                 <a href="#" class="btn btn-danger btn-xs" data-href="shipping-cost-delete.php?id=4" data-toggle="modal" data-target="#confirm-delete">Delete</a>
                              </td>
                           </tr> -->
                        </tbody>
                     </table>
                  </div>
               </div>
               <h4 style="background: #dd4b39;color:#fff;padding:10px 20px;">NB: If a country does not exist in the above list, the following "Rest of the World" shipping cost will be applied upon that.</h4>
      </section>
      <section class="content-header">
      <div class="content-header-left">
      <h1>Shipping Cost (Rest of the world)</h1>
      </div>
      </section>
      <section class="content">
      <div class="row">
      <div class="col-md-12">
         <form class="form-horizontal" action="<?php echo e($shippingcoastrest ? url('admin/updaterestamount', [$shippingcoastrest->id]) : url('admin/saverestamount')); ?>" method="post">
         <?php echo csrf_field(); ?>
         <?php if($shippingcoastrest): ?>
            <?php echo method_field('PUT'); ?>
         <?php endif; ?>
            <div class="box box-info">
               <div class="box-body">
                  <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Amount <span>*</span></label>
                     <div class="col-sm-4">
                     <input type="number" class="form-control" name="amount" value="<?php echo e($shippingcoastrest ? $shippingcoastrest->amount : ''); ?>" required>
                     </div>
                     </div>
                     <div class="form-group">
                     <label for="" class="col-sm-2 control-label"></label>
                     <div class="col-sm-6">
                     <button type="submit" class="btn btn-success pull-left" name="form2"><?php echo e($shippingcoastrest ? 'update' :'save'); ?></button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      </div>
      </section>
      <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <div class="modal-body">
      Are you sure want to delete this item?
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <a class="btn btn-danger btn-ok">Delete</a>
      </div>
      </div>
      </div>
      </div>
      </div>
	  <!-- end content -->
	  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views\admin\shippingcoast.blade.php ENDPATH**/ ?>