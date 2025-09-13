
<?php $__env->startSection('title', 'add middle level category'); ?>

<?php $__env->startSection('content'); ?>

 <!-- start content -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="content-header-left">
                  <h1>Add Mid Level Category</h1>
               </div>
               <div class="content-header-right">
                  <a href="<?php echo e(url('/admin/middlelevelcategory')); ?>" class="btn btn-primary btn-sm">View All</a>
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
                     <form class="form-horizontal" action="<?php echo e(url('admin/savemiddlelevelcategory', [] )); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="box box-info">
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Top Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="tcat_name" class="form-control select2">
                                       <option value="">Select Top Level Category</option>
                                       <?php $__currentLoopData = $toplevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toplevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($toplevelcategory->tcat_name); ?>"><?php echo e($toplevelcategory->tcat_name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Mid Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" class="form-control" name="mcat_name"  required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label"></label>
                                 <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </section>
         </div>
		 <!-- end content -->

	
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views/admin/addmiddlelevelcategory.blade.php ENDPATH**/ ?>