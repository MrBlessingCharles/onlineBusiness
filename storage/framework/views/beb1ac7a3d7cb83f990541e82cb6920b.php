 
<?php $__env->startSection('title', 'products'); ?>

<?php $__env->startSection('content'); ?>

<!-- start content -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="content-header-left">
                  <h1>View Products</h1>
               </div>
               <div class="content-header-right">
                  <a href="<?php echo e(url('/admin/addproduct')); ?>" class="btn btn-primary btn-sm">Add Product</a>
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
                     <div class="box box-info">
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-hover table-striped">
                              <thead class="thead-dark">

                              foreach($products as $product)
                                 <tr>
                                    <th width="10">#</th>
                                    <th>Photo</th>
                                    <th width="160">Product Name</th>
                                    <th width="60">Old Price</th>
                                    <th width="60">(C) Price</th>
                                    <th width="60">Quantity</th>
                                    <th>Featured?</th>
                                    <th>Active?</th>
                                    <th>Category</th>
                                    <th width="80">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                    <td><?php echo e($increment++); ?> </td>
                                    <td style="width:82px;"><img src="<?php echo e(asset('/storage/public/productimages/'.$product->p_featured_photo)); ?>" alt="Women's Plus-Size Shirt Dress with Gold Hardware" style="width:80px;"></td>
                                    <td><?php echo e($product->p_name); ?> </td>
                                    <td><?php echo e($product->p_old_price); ?></td>
                                    <td><?php echo e($product->p_current_price); ?></td>
                                    <td><?php echo e($product->p_qty); ?></td>
                                    <?php if($product->p_is_featured == 1): ?>

                                    <td>
                                       <span class="badge badge-success" style="background-color:green;">Yes</span>									
                                    </td>
                                    <?php else: ?>
                                    <td>
                                       <span class="badge badge-success" style="background-color:green;">no</span>									
                                    </td>
                                    <?php endif; ?>


                                    <?php if($product->p_is_active == 1): ?>

                                    <td>
                                       <span class="badge badge-success" style="background-color:green;">Yes</span>									
                                    </td>
                                    <?php else: ?>
                                    <td>
                                       <span class="badge badge-success" style="background-color:green;">no</span>									
                                    </td>
                                    <?php endif; ?>

                                    <td><?php echo e($product->tcat_name); ?><br><?php echo e($product->mcat_name); ?><br><?php echo e($product->ecat_name); ?></td>
                                    
                                    <td style="display: flex;">
                                    <a href="<?php echo e(url('admin/editproduct', [$product->id])); ?>" class="btn btn-primary btn-xs">Edit</a>
                                    <!-- <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=1" data-toggle="modal" data-target="#confirm-delete">Delete</a> -->
                                    <form action="<?php echo e(url('admin/deleteproduct', [$product->id])); ?>" method="post">
                                       <?php echo csrf_field(); ?>
                                       <?php echo method_field('DELETE'); ?>
   
                                       <button type="submit" class="btn btn-danger btn-xs" style="margin-left:5px;">Delete</button>
                                    </form> 

                                 </td>
                                 </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <!--  -->
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
                        <p style="color:red;">Be careful! This product will be deleted from the order table, payment table, size table, color table and rating table also.</p>
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
		
<?php echo $__env->make('admin_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views/admin/product.blade.php ENDPATH**/ ?>