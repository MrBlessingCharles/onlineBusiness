 
<?php $__env->startSection('title', 'all services'); ?>

<?php $__env->startSection('content'); ?>
  <!-- end Side Bar to Manage Shop Activities -->

		<!-- start content -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="content-header-left">
                  <h1>View Services</h1>
               </div>
               <div class="content-header-right">
                  <a href="<?php echo e(url('/admin/addservice')); ?>" class="btn btn-primary btn-sm">Add Service</a>
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
                                    <th width="30">#</th>
                                    <th>Photo</th>
                                    <th width="100">Title</th>
                                    <th>Content</th>
                                    <th width="80">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                    <td><?php echo e($increment++); ?></td>
                                    <td style="width:130px;"><img src="<?php echo e(asset('/storage/public/serviceimage/'.$service->photo)); ?>" alt="Easy Returns" style="width:120px;"></td>
                                    <td><?php echo e($service->title); ?></td>
                                    <td><?php echo e($service->content); ?></td>
                                    <td style="display: flex;">
                                    <a href="<?php echo e(url('admin/editservice', [$service->id])); ?>" class="btn btn-primary btn-xs">Edit</a>
                                    <!-- <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=1" data-toggle="modal" data-target="#confirm-delete">Delete</a> -->
                                    <form action="<?php echo e(url('admin/deleteservice', [$service->id])); ?>" method="post">
                                       <?php echo csrf_field(); ?>
                                       <?php echo method_field('DELETE'); ?>
   
                                       <button type="submit" class="btn btn-danger btn-xs" style="margin-left:5px;">Delete</button>
                                    </form> 

                                 </td>
                                 </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
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
                        <p>Are you sure want to delete this item?</p>
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
<?php echo $__env->make('admin_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views\admin\services.blade.php ENDPATH**/ ?>