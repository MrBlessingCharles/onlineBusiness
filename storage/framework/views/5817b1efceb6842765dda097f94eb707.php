 
<?php $__env->startSection('title', 'edit end level category'); ?>

<?php $__env->startSection('content'); ?>
 
 <!-- start content -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="content-header-left">
                  <h1>Edit End Level Category</h1>
               </div>
               <div class="content-header-right">
                  <a href="<?php echo e(url('/admin/endlevelcategory')); ?>" class="btn btn-primary btn-sm">View All</a>
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
                     <form class="form-horizontal" action="<?php echo e(url('admin/updateendlevelcategory', [$endlevelcategory->id])); ?>" method="post">
                       <?php echo csrf_field(); ?>
                       <?php echo method_field('PUT'); ?>
                        <div class="box box-info">
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Top Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="tcat_name" class="form-control select2 top-cat">
                                    

                                       <option value="<?php echo e($endlevelcategory->tcat_name); ?>"><?php echo e($endlevelcategory->tcat_name); ?></option>
                                       <?php $__currentLoopData = $toplevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toplevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($toplevelcategory->tcat_name); ?>"><?php echo e($toplevelcategory->tcat_name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Mid Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="mcat_name" class="form-control select2 mid-cat">
                                    

                                       <option value="<?php echo e($endlevelcategory->mcat_name); ?>"><?php echo e($endlevelcategory->mcat_name); ?></option>
                                       <?php $__currentLoopData = $middlelevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $middlelevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($middlelevelcategory->mcat_name); ?>"><?php echo e($middlelevelcategory->mcat_name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">End Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" name="ecat_name" value="<?php echo e($endlevelcategory->ecat_name); ?>">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label"></label>
                                 <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
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
<?php echo $__env->make('admin_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views\admin\editendlevelcategory.blade.php ENDPATH**/ ?>